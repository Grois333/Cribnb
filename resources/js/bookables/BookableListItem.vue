<template>
  <div class="card w-100">
    <div class="card-body">
      <router-link :to="{ name: 'bookable', params: { id } }">
        <h5 class="card-title">{{ title }}</h5>
      </router-link>
      <p class="card-text">{{ description }}</p>
    </div>
  </div>
</template>

<script>
export default {
    //props: ["itemTitle", "itemContent", "price"]
    props: {title: String, description: String, id: Number}
    //props: { title: String, description: String, id: Number }
};
</script>