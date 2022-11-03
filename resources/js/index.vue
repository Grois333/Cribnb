<template>
  <div>
    <!-- <router-link to="/">Home</router-link>
    <router-link to="/second">Second</router-link> -->
    <!-- <router-view></router-view> -->
    <nav class="navbar navbar-expand-lg bg-white border-bottom navbar-light">
      
      <router-link class="navbar-brand mr-auto logo" :to="{name: 'home'}">CriBnb</router-link>
      <!-- <router-link class="btn nav-button" :to="{name: 'second'}">Second</router-link> -->

      <ul class="navbar-nav">
        <li class="nav-item">
          <router-link class="nav-link" :to="{name: 'basket'}">
            Basket
            <span v-if="itemsInBasket" class="badge badge-secondary">{{ itemsInBasket }}</span>
          </router-link>
        </li>

        <li class="nav-item" v-if="!isLoggedIn">
          <router-link :to="{name: 'register'}" class="nav-link">Register</router-link>
        </li>

        <li class="nav-item" v-if="!isLoggedIn">
          <router-link :to="{name: 'login'}" class="nav-link">Sign-in</router-link>
        </li>

        <li class="nav-item" v-if="isLoggedIn">
          <a class="nav-link" href="#" @click.prevent="logout">Logout</a>
        </li>
      </ul>

      <!-- <router-link class="nav-link" :to="{name: 'basket'}">
        Basket
        <span v-if="itemsInBasket" class="badge badge-secondary">{{ itemsInBasket }}</span>
      </router-link> -->

      <!-- <ul class="navbar-nav">
        <li class="nav-item">
          <router-link class="nav-link" :to="{name: 'basket'}">
            Basket
            <span v-if="itemsInBasket" class="badge badge-secondary">{{ itemsInBasket }}</span>
          </router-link>
        </li>

        <li class="nav-item" v-if="!isLoggedIn">
          <router-link :to="{name: 'register'}" class="nav-link">Register</router-link>
        </li>

        <li class="nav-item" v-if="!isLoggedIn">
          <router-link :to="{name: 'login'}" class="nav-link">Sign-in</router-link>
        </li>

        <li class="nav-item" v-if="isLoggedIn">
          <a class="nav-link" href="#" @click.prevent="logout">Logout</a>
        </li>
      </ul> -->
    </nav>

    <div class="container mt-4 mb-4 pr-4 pl-4">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import { mapState, mapGetters } from "vuex";
export default {
  data() {
    return {
      lastSearch: this.$store.state.lastSearch
    };
  },
  computed: {
    ...mapState({
      lastSearchComputed: "lastSearch",
      isLoggedIn: "isLoggedIn"
    }),
    ...mapGetters({
      itemsInBasket: "itemsInBasket"
    }),
    // somethingElse() {
    //   return 1 + 2;
    // }
  },
  methods: {
    async logout() {
      console.log(123)
      try {
        axios.post("/logout");
        this.$store.dispatch("logout");
      } catch (error) {
        this.$store.dispatch("logout");
      }
    }
  }
};
</script>

<style scoped>
.logo {
  margin-left: 16px;
}

.badge-secondary {
    color: #fff;
    background-color: #6c757d;
}

.navbar{
  display: flex;
  justify-content: space-between;
}

</style>