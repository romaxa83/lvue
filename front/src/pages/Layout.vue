<template>

  <div class="relative bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto">
      <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">

        <div>
          <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
        <!-- Navigation -->
            <Nav/>

          </div>
        </div>

        <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
          <div class="sm:text-center lg:text-left">
            <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
              <span class="block xl:inline">{{ title }}</span>
<!--              <span class="block text-indigo-600 xl:inline">online business</span>-->
            </h1>
            <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
              Share links and earn 10% the product price!
            </p>
            <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
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
          </div>
        </main>

      </div>
    </div>

  </div>

  <router-view></router-view>

</template>

<script>
import Nav from "../components/Nav";
import {User} from "@/classes/user";
import axios from "axios";

export default {
  name: "Layout",
  components: {Nav},
  data() {
    return {
      user: null
    }
  },
  async mounted(){
    const {data} = await axios.get('/user');

    this.user = new User(data.data);
    this.$store.dispatch('setUser', this.user);
  },
  computed: {
    title() {
      console.log('title')
      console.log(this.$store.state.user)
      // if(this.user){
      //   return `$${$this.user.revenue}`;
      // }
      return 'Welcome';
    }
  }
}
</script>