<template>

  <div>
    <!-- Breadcrumbs -->
    <nav class="bg-white border-b border-gray-200 flex" aria-label="Breadcrumb">
      <ol class="max-w-screen-xl w-full mx-auto px-4 flex space-x-4 sm:px-6 lg:px-8">
        <li class="flex">
          <div class="flex items-center">
            <a href="/" class="text-gray-400 hover:text-gray-500">
              <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
              </svg>
              <span class="sr-only">Home</span>
            </a>
          </div>
        </li>
        <li class="flex">
          <div class="flex items-center">
            <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
            </svg>
            <a href="/products" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Products</a>
          </div>
        </li>
        <li class="flex">
          <div class="flex items-center">
            <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
            </svg>
            <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" aria-current="page">Edit product</a>
          </div>
        </li>
      </ol>
    </nav>

    <form
        @submit.prevent="submit"
        class="space-y-8 divide-y divide-gray-200"
    >
      <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">

        <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
          <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">
              Edit product
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">
              Edit some product
            </p>
          </div>
          <div class="space-y-6 sm:space-y-5">

            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
              <label for="title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                Title
              </label>
              <div class="mt-1 sm:mt-0 sm:col-span-2">
                <input
                    type="text"
                    name="title"
                    id="title"
                    placeholder="Title"
                    autocomplete="given-title"
                    v-model="title"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
              </div>
            </div>

            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
              <label for="description" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                Description
              </label>
              <div class="mt-1 sm:mt-0 sm:col-span-2">
                <input
                    type="text"
                    name="description"
                    id="description"
                    placeholder="Description"
                    v-model="description"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
              </div>
            </div>

            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
              <label for="price" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                Price
              </label>
              <div class="mt-1 sm:mt-0 sm:col-span-2">
                <input
                    type="number"
                    name="price"
                    id="price"
                    placeholder="Price"
                    v-model="price"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
              </div>
            </div>

            <!--            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">-->
            <!--              <label for="image" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">-->
            <!--                Image-->
            <!--              </label>-->
            <!--              <div class="mt-1 sm:mt-0 sm:col-span-2">-->
            <!--                <input-->
            <!--                    type="text"-->
            <!--                    name="image"-->
            <!--                    id="image"-->
            <!--                    placeholder="Price"-->
            <!--                    v-model="image"-->
            <!--                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">-->
            <!--                <label>-->
            <!--                  Upload <input type="file" hidden  />-->
            <!--                </label>-->
            <!--              </div>-->
            <!--            </div>-->

            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
              <label for="image" class="block text-sm font-medium text-gray-700">
                Image
              </label>
              <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center">
                  <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <div class="flex text-sm text-gray-600">
                    <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                      <span>Upload a file</span>
                      <input
                          :v-model="image"
                          id="image"
                          name="image"
                          type="file"
                          class="sr-only"
                          hidden
                          @change="change($event.target.files)"
                      >
                    </label>
                    <p class="pl-1">or drag and drop</p>
                  </div>
                  <p class="text-xs text-gray-500">
                    PNG, JPG, GIF up to 10MB
                  </p>
                  <h1 class="pt-8 pb-3 font-semibold sm:text-lg text-gray-900">
                    To Upload
                  </h1>

                  <ul id="gallery" class="flex flex-1 flex-wrap -m-1">
                    <li id="empty" class="h-full w-full text-center flex flex-col items-center justify-center items-center">
                      <img class="mx-auto w-32" src="https://user-images.githubusercontent.com/507615/54591670-ac0a0180-4a65-11e9-846c-e55ffce0fe7b.png" alt="no data" />
                      <span class="text-small text-gray-500">No files selected</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>

      <div class="pt-5">
        <div class="flex justify-end">
          <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Cancel
          </button>
          <button
              type="submit"
              class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Save
          </button>
        </div>
      </div>
    </form>

  </div>

</template>

<script lang="ts">
import {onMounted, ref} from "vue";
import {useRouter, useRoute} from "vue-router";
import axios from "axios";
import {Product} from "@/classes/product";

export default {
  name: "ProductEdit",
  setup() {
    const title = ref('');
    const description = ref('');
    const price = ref(0);
    const image = ref('');
    const router = useRouter();
    const {params} = useRoute();

    onMounted(async () => {
      const res = await axios.get(`products/${params.id }`);

      const product: Product = res.data.data;

      title.value = product.title;
      description.value = product.description;
      image.value = product.image;
      price.value = product.price;
    });

    const submit = async () => {
      await axios.post(`/products/${params.id}`, {
        title: title.value,
        description: description.value,
        price: price.value,
        image: image.value,
      });

      await router.push('/products');
    }

    const change = async (files: FileList) => {
      const file = files.item(0);

      const data = new FormData;
      data.append('image', file);

      const res = await axios.post('upload', data);

      image.value = res.data.data
    }

    return {
      title,
      description,
      price,
      image,
      submit,
      change
    }
  }
}
</script>
