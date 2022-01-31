<template>
    <div class="col-xl-9 col-lg-8">
    <div class="row gy-5 mb-5">
      <div class="item col-xl-4 col-md-6" v-for="product in products" v-bind:key="product.name">
      <product-item :product="product"></product-item>
      </div>
    </div>
  </div>
</template>

<script>
import ProductItem from './ProductItem';
export default {
  name: "ProductList",

  components: {
    ProductItem,
  },
  computed: {
    products () {
      return this.$store.state.products.all;
    },
  },
}

</script>

<style scoped>

</style>