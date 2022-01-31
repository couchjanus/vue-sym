<template>
  <div>
    
    <!-- Brands-->
    <h6 class="text-uppercase mb-4">Show by brand</h6>
    <div class="mb-2 form-check" v-for="brand in brands" :key="brand.id">
      <input class="form-check-input" :id="'brand-' + brand.id" type="checkbox" name="clothes-brand" checked>
      <label class="form-check-label" :for="'brand-' + brand.id">{{ brand.name }} <small class="text-xs text-muted">(18) </small></label>
    </div>
    
  </div>
</template>

<script>
    
    export default {
      
      computed: {
        brands () {
            return this.$store.state.brands.all;
        },
      },
      
    }
</script>