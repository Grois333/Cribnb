<template>
    <div class="w-50 m-auto reg_container">
      <div class="card card-body">
        <form>
          <div class="form-group mt-3">
            <label for="name">Name</label>
            <input
              type="text"
              name="name"
              placeholder="Enter your name"
              class="form-control"
              v-model="user.name"
              :class="[{'is-invalid': errorFor('name')}]"
            />
            <v-errors :errors="errorFor('name')"></v-errors>
          </div>
  
          <div class="form-group mt-3">
            <label for="email">E-mail</label>
            <input
              type="text"
              name="email"
              placeholder="Enter your e-mail"
              class="form-control"
              v-model="user.email"
              :class="[{'is-invalid': errorFor('email')}]"
            />
            <v-errors :errors="errorFor('email')"></v-errors>
          </div>
  
          <div class="form-group mt-3">
            <label for="password">Password</label>
            <input
              type="password"
              name="password"
              placeholder="Enter your password"
              class="form-control"
              v-model="user.password"
              :class="[{'is-invalid': errorFor('password')}]"
            />
            <v-errors :errors="errorFor('password')"></v-errors>
          </div>
  
          <div class="form-group mt-3">
            <label for="password_confirmation">Re-type Password</label>
            <input
              type="password"
              name="password_confirmation"
              placeholder="Confirm your password"
              class="form-control"
              v-model="user.password_confirmation"
              :class="[{'is-invalid': errorFor('password_confirmation')}]"
            />
            <v-errors :errors="errorFor('password_confirmation')"></v-errors>
          </div>
  
          <button
            type="submit"
            class="btn btn-primary btn-lg btn-block mt-3 w-100"
            :disabled="loading"
            @click.prevent="register"
          >Register</button>
  
          <hr />
  
          <div>
            Already have an account?
            <router-link :to="{name: 'login'}" class="font-weight-bold">Log-in</router-link>
          </div>
        </form>
      </div>
    </div>
  </template>
  
  <script>
  import validationErrors from "../shared/mixins/validationErrors";
  import { logIn } from "./../shared/utils/auth";
  
  export default {
    mixins: [validationErrors],
    data() {
      return {
        user: {
          name: null,
          email: null,
          password: null,
          password_confirmation: null
        },
        loading: false
      };
    },
    methods: {
      async register() {
        this.loading = true;
        this.errors = null;
  
        try {
          const response = await axios.post("/register", this.user);
  
          if (201 == response.status) {
            logIn();
            this.$store.dispatch("loadUser");
            this.$router.push({ name: "home" });
          }
        } catch (error) {
          this.errors = error.response && error.response.data.errors;
        }
  
        this.loading = false;
      }
    }
  };
  </script>


<style scoped>

    .card.card-body a{
        text-decoration: none;
    }


    @media only screen and (max-width:767px){
        .reg_container{
            width: 100% !important;
        }
    }

</style>