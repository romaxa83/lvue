<template>

  <div class="relative bg-white">
    <div class="absolute inset-0 shadow z-30 pointer-events-none" aria-hidden="true"></div>
    <div class="relative z-20">
      <div class="max-w-7xl mx-auto flex justify-between items-center px-4 py-5 sm:px-6 sm:py-4 lg:px-8 md:justify-start md:space-x-10">
        <div>
          <a href="#" class="flex">
            <span class="sr-only">Workflow</span>
            <img class="h-8 w-auto sm:h-10" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="">
          </a>
        </div>
        <div class="hidden md:flex-1 md:flex md:items-center md:justify-between">

          <nav class="flex space-x-10">
            <div>
              <button type="button" class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" aria-expanded="false">
                <span>Solutions</span>
                <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </button>
            </div>
            <router-link to="/profile" class="text-base font-medium text-gray-500 hover:text-gray-900">{{user?.email}}</router-link>
            <!--    <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">-->
            <!--      Docs-->
            <!--    </a>-->
            <div>

            </div>
          </nav>

          <div class="flex items-center md:ml-12">
            <a href="/login" class="text-base font-medium text-gray-500 hover:text-gray-900">
              Sign in
            </a>
            <a href="/register" class="ml-8 inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
              Sign up
            </a>
            <a href="javascript:void(0)"
               @click="logout"
               class="ml-8 inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
              Sign out
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {useRouter} from "vue-router";
import {useStore} from "vuex";
import {computed} from "vue";

export default {
  name: "Nav",

  setup () {
    const router = useRouter();
    const store = useStore();

    const user = computed(() => store.state.user);

    const logout = () => {
      localStorage.clear();
      console.log('logout');
      router.push('/');
    }

    return {
      user,
      logout,
    };
  }
}
</script>

<style scoped>

</style>