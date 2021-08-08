<template>

  <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start">

    <div class="hidden md:block md:ml-10 md:pr-4 md:space-x-8">
      <router-link
          to="#"
          class="font-medium text-gray-500 hover:text-gray-900">
        Influencer
      </router-link>

      <router-link
          to="/login"
          v-if="!user"
          class="font-medium text-gray-500 hover:text-gray-900">
        login
      </router-link>
      <router-link
          to="/profile"
          v-if="user"
          class="font-medium text-gray-500 hover:text-gray-900">
        {{user?.name}}
      </router-link>

      <a href="javascript:void(0)"
         v-if="user"
         @click="logout"
         class="ml-8 inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
        Logout
      </a>

    </div>
  </nav>
</template>

<script>
import axios from "axios";

export default {
  name: "Nav",
  methods: {
    async logout () {
      await axios.post('logout',{})

      localStorage.clear();

      await this.$router.push('/login')
    }
  },
  computed: {
    user() {
      return this.$store.state.user
    },
  }
}
</script>