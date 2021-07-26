<template>
  <div class="px-4 px-6 md:px-0">
    <!-- BREADCRUMBS -->
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
            <a href="/orders" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" aria-current="page">Orders</a>
          </div>
        </li>
        <li class="flex">
          <div class="flex items-center">
            <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
            </svg>
            <a href="" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" aria-current="page">Order items</a>
          </div>
        </li>
      </ol>
    </nav>
  </div>
  <div class="pt-10 pb-16">

    <div class="flex">
      <div class="flex-none w-16 h-16">
        <div class="px-4 sm:px-6 md:px-0">
          <h1 class="text-3xl font-extrabold text-gray-900">Order items</h1>
        </div>
      </div>
      <div class="flex-grow h-16">
        <!-- This item will grow -->
      </div>
      <div class="flex-none w-16 h-16">
        <div class="px-4 sm:px-6 md:px-0">
<!--          <router-link-->
<!--              to="/products/create"-->
<!--              class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"-->
<!--          >-->
<!--            Add-->
<!--          </router-link>-->
        </div>
      </div>
    </div>

    <div class="px-4 sm:px-6 md:px-0">
      <div class="py-10">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="flex flex-col">

          <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
              <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                  <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      ID
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Price
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Quantity
                    </th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Action
                    </th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr
                      v-for="item in orderItems"
                      :key="item.id"
                      class="bg-white"
                  >
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                      {{ item.id }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      {{ item.product_title }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      {{ item.price }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      {{ item.quantity }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
<!--                      <a href="javascript:void(0)"-->
<!--                         @click="del(order.id)"-->
<!--                         class="px-4 text-red-600 hover:text-red-900">-->
<!--                        Delete-->
<!--                      </a>-->
                    </td>
                  </tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

</template>

<script lang="ts">
import {onMounted, ref} from 'vue';
import axios from 'axios';
import {useRoute} from 'vue-router';

export default {
  name: "OrderItems",
  setup() {
    const orderItems = ref([]);
    const {params} = useRoute();

    onMounted(async () => {
      const res = await axios.get(`/orders/${params.id}`);

      orderItems.value = res.data.data.items
    })

    return {
      orderItems
    };
  }
}
</script>
