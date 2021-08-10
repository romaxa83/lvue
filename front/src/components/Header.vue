<template>
  <div class="bg-white">
    <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
      <div class="text-center">
        <p class="mt-1 text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl">{{title}}</p>
        <p class="max-w-xl mt-5 mx-auto text-xl text-gray-500">Start building for free, then add a site plan to go live. Account plans unlock additional features.</p>
        <div
            v-if="!isAuth()"
            class="mt-5 sm:mt-8 sm:flex sm:justify-center">
          <div class="rounded-md shadow">
            <router-link
                to="/register"
                class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
              Register
            </router-link>
          </div>
          <div class="mt-3 sm:mt-0 sm:ml-3">
            <router-link
                to="/login"
                class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:text-lg md:px-10">
              Login
            </router-link>
          </div>
        </div>
        <div
            v-if="isAuth()"
            class="mt-5 sm:mt-8 sm:flex sm:justify-center">
          <div class="rounded-md shadow">
            <router-link
                to="/stats"
                class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
              Stats
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Header",
  methods: {
    isAuth() {
      return this.user?.id
    }
  },
  computed: {
    user() {
      return this.$store.state.user;
    },
    title() {
      if(this.isAuth()){
        return `$${this.user.revenue}`;
      }
      return 'Welcome';
    }
  }
}
</script>

<style scoped>

</style>