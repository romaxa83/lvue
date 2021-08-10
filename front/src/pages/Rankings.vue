<template>

  <div class="relative bg-gray-50 pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
    
    <div class="relative max-w-7xl mx-auto">
      <div class="text-center">
        <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl">
          Rankings
        </h2>
      </div>

      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              #
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Name
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Revenue
            </th>
          </tr>
          </thead>
          <tbody>
          <tr
              v-for="(ranking, i) in rankings"
              :key="ranking.id"
              class="bg-white"
          >
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
              {{ i + 1}}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
              {{ ranking.name }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
              {{ ranking.revenue }}
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
  name: "Rankings",
  data() {
    return {
      rankings: []
    }
  },
  async mounted() {
    const {data} = await axios.get('/rankings');

    this.rankings = data
  }
}
</script>

<style scoped>

</style>