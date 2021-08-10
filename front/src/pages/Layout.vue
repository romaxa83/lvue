<template>

  <div>
    <div>
      <div>
        <div>
          <div class="relative pt-6 px-4 sm:px-6 lg:px-10">
        <!-- Navigation -->
            <Nav/>

          </div>
        </div>

        <Header />

      </div>
    </div>

  </div>

  <router-view></router-view>

</template>

<script>
import Nav from "../components/Nav";
import Header from "@/components/Header";
import {User} from "@/classes/user";
import axios from "axios";

export default {
  name: "Layout",
  components: {Header, Nav},
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
}
</script>