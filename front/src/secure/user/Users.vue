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
            <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" aria-current="page">Users</a>
          </div>
        </li>
      </ol>
    </nav>
  </div>
  <div class="pt-10 pb-16">

    <div class="flex ...">
      <div class="flex-none w-16 h-16">
        <div class="px-4 sm:px-6 md:px-0">
          <h1 class="text-3xl font-extrabold text-gray-900">Users</h1>
        </div>
      </div>
      <div class="flex-grow h-16">
        <!-- This item will grow -->
      </div>
      <div class="flex-none w-16 h-16">
        <div class="px-4 sm:px-6 md:px-0">
          <router-link
              to="/users/create"
              class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
          >
            Add
          </router-link>
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
                      <router-link
                          :to="`/users/${user.id}/edit`"
                         class="text-indigo-600 hover:text-indigo-900">
                        Edit
                      </router-link>
                      <a href="javascript:void(0)"
                         @click="del(user.id)"
                         class="px-4 text-red-600 hover:text-red-900">
                        Delete
                      </a>
                    </td>
                  </tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!--PAGINATION-->
        <nav class="border-t border-gray-200 px-4 flex items-center justify-between sm:px-0">
          <div class="-mt-px w-0 flex-1 flex">
            <a href="javascript:void(0)"
               @click="prev"
               class="border-t-2 border-transparent pt-4 pr-1 inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
              <!-- Heroicon name: solid/arrow-narrow-left -->
              <svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
              </svg>
              Previous
            </a>
          </div>
          <div class="hidden md:-mt-px md:flex">
            <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium">
              1
            </a>
            <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
            <a href="#" class="border-indigo-500 text-indigo-600 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium" aria-current="page">
              2
            </a>
            <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium">
              3
            </a>
            <span class="border-transparent text-gray-500 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium">
      ...
    </span>
            <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium">
              8
            </a>
            <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium">
              9
            </a>
            <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium">
              10
            </a>
          </div>
          <div class="-mt-px w-0 flex-1 flex justify-end">
            <a
                href="javascript:void(0)"
                @click="next"
                class="border-t-2 border-transparent pt-4 pl-1 inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
              Next
              <!-- Heroicon name: solid/arrow-narrow-right -->
              <svg class="ml-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </a>
          </div>
        </nav>

      </div>
    </div>
  </div>

</template>

<script lang="ts">
  import {onMounted, ref} from 'vue';
  import axios from 'axios';
  import {Entity} from '@/interfaces/entity';

  export default {
    name: "Users",
    setup() {
      const users = ref([]);
      const page = ref(1);
      const lastPage = ref(0);

      const load = async () => {
        const res = await axios.get(`/users?page=${page.value}`);

        users.value = res.data.data;
        lastPage.value = res.data.meta.last_page;

        // console.log(lastPage);
      };

      const next = async () => {

        if(page.value === lastPage.value) return;
        page.value++;
        await load();
      };

      const prev = async () => {

        if(page.value === 1) return;
        page.value--;
        await load();
      };

      const del = async (id: number) => {

        if(confirm('Are you sure you want to delete this record?')){
          await axios.delete(`/users/${id}`)

          users.value = users.value.filter((u: Entity) => u.id !== id);
        }
      };


      onMounted(load);

      return {
        users,
        next,
        prev,
        del
      };
    }
  }
</script>
