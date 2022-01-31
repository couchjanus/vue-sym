<template>
  <div class="shop">
    <header-section title="Shop page" lead="Home page  page Home page H pomeage" :breadcrumbs="[{url:'catalog', text:'Catalog'}]"></header-section>

    <main class="py-5">
      <div class="container py-5">
        <div class="row gx-lg-5">
          <side-bar></side-bar>
          <product-list></product-list>

        </div>
      </div>
    </main>

  </div>
</template>

<script>
import {HeaderSection} from '@/components/layouts';
import ProductList from '@/components/catalog/ProductList';
import SideBar from '@/components/layouts/SideBar';
export default {
  name: "Shop",
  components: {
    HeaderSection,
    ProductList,
    SideBar
  },
  created () {
    this.$store.dispatch('products/getProducts');
  },
}
</script>

<style scoped>

</style>