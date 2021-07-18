<template>

  <div>
    <!-- Breadcrumbs -->
    <nav class="bg-white border-b border-gray-200 flex" aria-label="Breadcrumb">
      <ol class="max-w-screen-xl w-full mx-auto px-4 flex space-x-4 sm:px-6 lg:px-8">
        <li class="flex">
          <div class="flex items-center">
            <a href="/" class="text-gray-400 hover:text-gray-500">
              <!-- Heroicon name: solid/home -->
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
            <a href="/users" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Users</a>
          </div>
        </li>
        <li class="flex">
          <div class="flex items-center">
            <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
            </svg>
            <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" aria-current="page">Create user</a>
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
              Create user
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">
              Use a permanent address where you can receive mail.
            </p>
          </div>
          <div class="space-y-6 sm:space-y-5">

            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
              <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                Name
              </label>
              <div class="mt-1 sm:mt-0 sm:col-span-2">
                <input
                    type="text"
                    name="name"
                    id="name"
                    placeholder="Name"
                    autocomplete="given-name"
                    v-model="name"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
              </div>
            </div>

            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
              <label for="email" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                Email
              </label>
              <div class="mt-1 sm:mt-0 sm:col-span-2">
                <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="Email"
                    autocomplete="given-name"
                    v-model="email"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
              </div>
            </div>

            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
              <label for="password" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                Password
              </label>
              <div class="mt-1 sm:mt-0 sm:col-span-2">
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Password"
                    autocomplete="given-name"
                    v-model="password"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
              </div>
            </div>

            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
              <label for="role" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                Role
              </label>
              <div class="mt-1 sm:mt-0 sm:col-span-2">
                <select
                    id="role"
                    name="role"
                    autocomplete="role"
                    v-model="roleId"
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
<!--                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">-->
                  <option value="0">Select Role</option>
                  <option
                      v-for="role in roles"
                      :key="role.id"
                      :value="role.id"
                  >
                    {{ role.name }}
                  </option>
                </select>
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

<script>

  import {ref, onMounted} from 'vue';
  import axios from 'axios';
  import {useRouter} from "vue-router";

  export default {
    name: "UserCreate",
    setup() {
      const name = ref('');
      const email = ref('');
      const password = ref('');
      const roleId = ref(0 );
      const roles = ref([]);
      const router = useRouter();

      onMounted(async () => {
        const res = await axios.get('/roles');

        roles.value = res.data.data;
      })

      const submit = async () => {
        await axios.post(`/users`, {
          name: name.value,
          email: email.value,
          password: password.value,
          roleId: roleId.value,
        });

        await router.push('/users');
      }

      return {
        name,
        email,
        password,
        roleId,
        roles,
        submit
      }
    }
  }
</script>