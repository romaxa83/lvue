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
          <Nav />
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
  import {onMounted} from 'vue';
  import axios from 'axios';
  import {useRouter} from 'vue-router'
  import Nav from '@/components/Nav.vue'

  export default {
    name: "Secure",

    components: {
      Nav
    },

    setup () {
      const router = useRouter();

      onMounted(async () => {
        try {
          const res = await axios.get('/user');
          console.log(res);
        } catch (e){

          await router.push('/login')
        }
      });

      const logout = () => {
        localStorage.clear()
        router.push('/login')
      }

      return {
        logout
      }
    }
  }
</script>