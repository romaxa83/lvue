<template>

  <div class="relative bg-gray-50 pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">

    <div class="relative max-w-7xl mx-auto">
      <div class="text-center">
        <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl">
          Stats
        </h2>
      </div>

      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Link
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Users
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Revenue
            </th>
          </tr>
          </thead>
          <tbody>
          <tr
              v-for="order in orders"
              :key="order"
              class="bg-white"
          >
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
              {{ link(order.code) }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
              {{ order.count }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
              {{ order.revenue }}
            </td>
          </tr>

          </tbody>
        </table>
      </div>

    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Stats",
  data() {
    return {
      orders: []
    }
  },
  async mounted() {
    const {data} = await axios.get('/stats');

    this.orders = data
  },
  methods: {
    link(code) {
      return  `${process.env.VUE_APP_CHECKOUT}/links/${code}`
    }
  }
}
</script>

<style scoped>

</style>