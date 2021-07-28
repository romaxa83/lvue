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
            <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" aria-current="page">Profile</a>
          </div>
        </li>
      </ol>
    </nav>

      <div class="max-w-screen-xl mx-auto pb-6 px-4 sm:px-6 lg:pb-16 lg:px-8">
        <div class="bg-white rounded-lg shadow overflow-hidden">
          <div class="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x">

            <form
                @submit.prevent="submit"
                class="divide-y divide-gray-200 lg:col-span-9">
              <!-- Profile section -->
              <div class="py-6 px-4 sm:p-6 lg:pb-8">
                <div>
                  <h2 class="text-lg leading-6 font-medium text-gray-900">Profile</h2>
                  <p class="mt-1 text-sm text-gray-500">
                    This information will be displayed publicly so be careful what you share.
                  </p>
                </div>

                <div class="mt-6 flex flex-col lg:flex-row">
                  <div class="flex-grow space-y-6">
                    <div class="col-span-12 sm:col-span-6">
                      <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                      <input type="text"
                             v-model="name"
                             name="name"
                             id="name"
                             class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm">
                    </div>

                    <div class="col-span-12 sm:col-span-6">
                      <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                      <input type="text"
                             v-model="email"
                             name="email"
                             id="email"
                             class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm">
                    </div>

                  </div>

                  <div class="mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-grow-0 lg:flex-shrink-0">
                    <p class="text-sm font-medium text-gray-700" aria-hidden="true">
                      Photo
                    </p>
                    <div class="mt-1 lg:hidden">
                      <div class="flex items-center">
                        <div class="flex-shrink-0 inline-block rounded-full overflow-hidden h-12 w-12" aria-hidden="true">
                          <img class="rounded-full h-full w-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixqx=7qwKjEp7Xv&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=320&h=320&q=80" alt="">
                        </div>
                        <div class="ml-5 rounded-md shadow-sm">
                          <div class="group relative border border-gray-300 rounded-md py-2 px-3 flex items-center justify-center hover:bg-gray-50 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-light-blue-500">
                            <label for="user_photo" class="relative text-sm leading-4 font-medium text-gray-700 pointer-events-none">
                              <span>Change</span>
                              <span class="sr-only"> user photo</span>
                            </label>
                            <input id="user_photo" name="user_photo" type="file" class="absolute w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="hidden relative rounded-full overflow-hidden lg:block">
                      <img class="relative rounded-full w-40 h-40" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixqx=7qwKjEp7Xv&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=320&h=320&q=80" alt="">
                      <label for="user-photo" class="absolute inset-0 w-full h-full bg-black bg-opacity-75 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100 focus-within:opacity-100">
                        <span>Change</span>
                        <span class="sr-only"> user photo</span>
                        <input type="file" id="user-photo" name="user-photo" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                      </label>
                    </div>
                  </div>
                </div>

                <div class="mt-6 grid grid-cols-12 gap-6">

                  <div class="col-span-12 sm:col-span-6">
                    <label for="old_password" class="block text-sm font-medium text-gray-700">Old Password</label>
                    <input type="password"
                           name="oldPassword"
                           v-model="oldPassword"
                           id="old_password"
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm">
                  </div>

                  <div class="col-span-12 sm:col-span-6">
                    <label for="new_password" class="block text-sm font-medium text-gray-700">New Password</label>
                    <input type="password"
                           name="newPassword"
                           v-model="newPassword"
                           id="new_password"
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm">
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

              </div>

            </form>
          </div>
        </div>
      </div>

  </div>

</template>

<script>
import {onMounted, ref} from "vue";
import axios from "axios";
import {User} from "@/classes/user";

export default {
  name: "Profile",
  setup() {
    const name = ref('');
    const email = ref('');
    const newPassword = ref('');
    const oldPassword = ref('');

    onMounted(async () => {
      const res = await axios.get(`/user`);

      const user = res.data.data;

      name.value = user.name;
      email.value = user.email;
      newPassword.value = '';
      oldPassword.value = '';
    });

    const submit = async () => {
      await axios.post(`/profile/edit`, {
        name: name.value,
        email: email.value,
        newPassword: newPassword.value,
        oldPassword: oldPassword.value,
      });

    }

    return {
      name,
      email,
      newPassword,
      oldPassword,
      submit
    }
  }
}
</script>