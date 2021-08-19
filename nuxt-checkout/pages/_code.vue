<template>
  <div class="container">
    <main>
      <div class="py-5 text-center">
        <h2>Welcome</h2>
        <p class="lead">{{user.name}} has invited you to buy these item(s)</p>
      </div>

      <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Product</span>
          </h4>
          <ul class="list-group mb-3">

            <template v-for="product in products">
              <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0">{{product.title}}</h6>
                  <small class="text-muted">{{product.description}}</small>
                </div>
                <span class="text-muted">${{product.price}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0">Quantity</h6>
                </div>
<!--                <input-->
<!--                  type="number"-->
<!--                  min="0"-->
<!--                  class="text-muted form-control quantity">-->
                <input
                  v-model="quantities[product.id]"
                  type="number"
                  min="0"
                  class="text-muted form-control quantity">
              </li>
            </template>


            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>${{total}}</strong>
            </li>
          </ul>
        </div>
        <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">Personal info</h4>
          <form class="needs-validation" novalidate @submit.prevent="submit">
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="firstName" class="form-label">First name</label>
                <input
                  v-model="name"
                  type="text"
                  class="form-control"
                  id="firstName"
                  placeholder="First name"
                  required>
              </div>

              <div class="col-sm-6">
                <label for="lastName" class="form-label">Last name</label>
                <input type="text" class="form-control" id="lastName" placeholder="Last name" required>
              </div>

              <div class="col-12">
                <label for="email" class="form-label">Email </label>
                <input
                  v-model="email"
                  type="email"
                  class="form-control"
                  id="email"
                  placeholder="you@example.com"
                  required>
              </div>

              <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <input
                  v-model="address"
                  type="text"
                  class="form-control"
                  id="address"
                  placeholder="1234 Main St"
                  required>
              </div>

              <div class="col-12">
                <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
                <input
                  v-model="address2"
                  type="text"
                  class="form-control"
                  id="address2"
                  placeholder="Apartment or suite">
              </div>

              <div class="col-md-5">
                <label for="country" class="form-label">Country</label>
                <input
                  v-model="country"
                  type="text"
                  class="form-control"
                  id="country"
                  placeholder="Country"
                  required>
              </div>

              <div class="col-md-5">
                <label for="city" class="form-label">City</label>
                <input
                  v-model="city"
                  type="text"
                  class="form-control"
                  id="city"
                  placeholder="City"
                  required>
              </div>

              <div class="col-md-2">
                <label for="zipcode" class="form-label">Zip</label>
                <input
                  v-model="zipcode"
                  type="text"
                  class="form-control"
                  id="zipcode"
                  placeholder="Zip"
                  required>
              </div>
            </div>

            <hr class="my-4">

            <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
          </form>
        </div>
      </div>
    </main>

    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">&copy; 2017–2021 Company Name</p>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Privacy</a></li>
        <li class="list-inline-item"><a href="#">Terms</a></li>
        <li class="list-inline-item"><a href="#">Support</a></li>
      </ul>
    </footer>
  </div>
</template>

<script>
import Vue from 'vue'
import axios from '../plugins/axios.ts';

export default Vue.extend({
  async asyncData(ctx){
    const {data} = await axios.get(`/links/${ctx.params.code}`);

    const user = data.data.user;
    const products = data.data.products;
    const quantities = [];

    products.forEach(
      p => quantities[p.id] = 0
    );

    return {
      user,
      products,
      quantities
    }
  },
  data(){
    return {
      user: null ,
      products: [],
      quantities: [],
      name: '',
      email: '',
      address: '',
      address2: '',
      country: '',
      city: '',
      zipcode: '',
    }
  },
  methods: {
    async submit(){
      const {data} = await axios.post('http://192.168.179.1:8080/api/v1/checkout/orders',{
      // const {data} = await axios.post('/orders',{
        name: this.name,
        email: this.email,
        address: this.address,
        address2: this.address2,
        country: this.country,
        city: this.city,
        zipcode: this.zipcode,
        code: this.$route.params.code,
        items: this.products.map(p => {
          return {
            productId: p.id,
            quantity: this.quantities[p.id],
          }
        })
      });

      console.log(data);
    }
  },
  computed: {
    total() {
      let total = 0;

      this.products.forEach(
        p => {
          total += p.price * this.quantities[p.id]
        }
      );

      return total;
    }
  },
  // mounted() {
  //   console.log(this.$route.params);
  // }
})
</script>

<style scoped>
  .quantity{
    width: 55px;
  }
</style>
