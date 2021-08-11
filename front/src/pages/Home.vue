<template>
  <div class="relative bg-gray-50 pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
    <div class="absolute inset-0">
      <div class="bg-white h-1/3 sm:h-2/3"></div>
    </div>
    <div class="relative max-w-7xl mx-auto">
      <div class="text-center">
        <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl">
          Product
        </h2>

        <div
            v-if="link"
            class="rounded-md bg-blue-50 p-4">
          <div class="flex">
            <div class="flex-shrink-0">
              <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
              </svg>
            </div>
            <div class="ml-3 flex-1 md:flex md:justify-between">
              <p class="text-sm text-blue-700">
                Link generated: {{link}}
              </p>
            </div>
          </div>
        </div>

        <div
            v-if="error"
            class="rounded-md bg-red-50 p-4">
          <div class="flex">
            <div class="flex-shrink-0">
              <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
              </svg>
            </div>
            <div class="ml-3 flex-1 md:flex md:justify-between">
              <p class="text-sm text-red-700">
                You should be logged in to generate a link
              </p>
            </div>
          </div>
        </div>

        <div class="mt-1 flex rounded-md shadow-sm">
            <input
                type="text"
                name="search"
                id="search"
                placeholder="Search"
                autocomplete="given-title"
                @keyup="search($event.target.value)"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            >
            <button
                v-if="selected.length > 0"
                @click="generate()"
                class="-ml-px relative inline-flex items-center space-x-2 px-4 py-2 border border-gray-300 text-sm font-medium rounded-r-md text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
              <span>Generate link</span>
            </button>
        </div>

      </div>

      <div class="mt-12 max-w-lg mx-auto grid gap-5 lg:grid-cols-3 lg:max-w-none">

        <div
            v-for="product in products"
            :key="product.id"
            @click="select(product.id)"
            :class="{selected: isSelected(product.id)}"
            class="flex flex-col rounded-lg shadow-lg overflow-hidden product-card"
        >
          <div class="flex-shrink-0">
            <img
                class="h-48 w-full object-cover"
                :src="product.image"
                alt="" />
          </div>
          <div class="flex-1 bg-white p-6 flex flex-col justify-between">
            <div class="flex-1">
              <p class="text-sm font-medium text-indigo-600">
                <a href="#" class="hover:underline">
                  {{ product.title}}
                </a>
              </p>
              <a href="#" class="block mt-2">
                <p class="text-xl font-semibold text-gray-900">
                  {{ product.title}}
                </p>
                <p class="mt-3 text-base text-gray-500">
                  {{ product.description}}
                </p>
              </a>
            </div>
            <div class="mt-6 flex items-center">

              <div class="ml-3">
                <p class="text-sm font-medium text-gray-900">
                  ${{ product.price}}
                </p>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Home",

  data() {
    return {
      products: [],
      selected: [],
      link: '',
      error: false
    }
  },
  async mounted() {
    await this.load();
  },
  methods: {
    async load(text = ''){
      const {data} = await axios.get(`/products?s=${text}`);
      this.products = data.data;
    },
    async search(text){
      await this.load(text)
    },
    isSelected(id){
      return this.selected.some(s => s === id);
    },
    select(id){
      if(!this.isSelected(id)){
        this.selected.push(id);
        return;
      }
      this.selected = this.selected.filter(s => s !== id);
    },
    async generate() {

      try {
        const {data} = await axios.post('/links', {
          productIds: this.selected
        });

        this.link = `${process.env.VUE_APP_CHECKOUT}/links/${data.data.code}`;
      } catch (e){
        this.error = true;
      }


    }
  }
}
</script>

<style scoped>
  .product-card{
    cursor: pointer;
  }
  .product-card.selected{
    border: 4px solid #3db9ec;
  }
</style>