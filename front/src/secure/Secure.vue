<template>

  <Nav :user="user" />

  <div class="h-screen bg-white overflow-hidden flex">

    <!-- Static sidebar for desktop -->
    <div class="hidden md:flex md:flex-shrink-0">
      <div class="w-64 flex flex-col">
        <Menu />
      </div>
    </div>

    <!-- Content area -->
    <div class="flex-1 flex flex-col">

      <main class="flex-1 overflow-y-auto focus:outline-none">
        <div class="relative max-w-7xl mx-auto md:px-8 xl:px-0">

          <router-view />

        </div>
      </main>

    </div>
  </div>

</template>

<script>
  import {onMounted, ref} from 'vue';
  import axios from 'axios';
  import {useRouter} from 'vue-router'
  import Nav from '@/components/Nav.vue'
  import Menu from '@/components/Menu.vue'

  export default {
    name: "Secure",

    components: {
      Nav,
      Menu
    },

    setup () {
      const router = useRouter();
      const user = ref(null);

      onMounted(async () => {
        try {
          const res = await axios.get('/user');

          user.value = res.data.data;
          // console.log(res.data.data);
        } catch (e){

          await router.push('/')
        }
      });

      const logout = () => {
        localStorage.clear();
        console.log('logout');
        router.push('/');
      }

      return {
        logout,
        user
      };
    }
  }
</script>