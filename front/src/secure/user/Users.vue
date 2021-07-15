<template>

  <div class="pt-10 pb-16">
    <div class="px-4 sm:px-6 md:px-0">
      <h1 class="text-3xl font-extrabold text-gray-900">Users</h1>
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
                      Email
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                      <span class="sr-only">Edit</span>
                    </th>
                  </tr>
                  </thead>
                  <tbody>

                  <!-- Odd row -->
                  <tr
                      v-for="user in users"
                      :key="user.id"
                      class="bg-white"
                  >
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                      {{user.id}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      {{user.name}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      {{user.email}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
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

<script>
  import {onMounted, ref} from 'vue';
  import axios from 'axios';

  export default {
    name: "Users",
    setup() {
      const users = ref([]);

      onMounted( async () => {
        const res = await axios.get('/users')

        console.log(users);

        users.value = res.data.data;
      });

      return {
        users
      };
    }
  }
</script>
