<template>
  <div class="col-xl-3 col-lg-4">
    <div class="border-bottom my-4"></div>
    <brand-list></brand-list>
    <div class="border-bottom my-4"></div>
  </div>
</template>

<script>
import BrandList from '@/components/brand/BrandList.vue'

export default {
  name: "SideBar",
  components: {
        BrandList
  },
  created () {
      this.$store.dispatch('brands/getBrands');
  },
  
}
</script>

<style scoped>

</style>