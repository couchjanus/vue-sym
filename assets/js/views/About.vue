<template>
  <div>
    <header-section title="About page" lead="About page About page About page About page About page" :breadcrumbs="[{url:'about', text:'About Us'}]"></header-section>
  </div>
</template>

<script>
import {HeaderSection} from '@/components/layouts';

export default {
  name: "About",
  components: {
    HeaderSection,
  }
}
</script>

<style scoped>


</style>