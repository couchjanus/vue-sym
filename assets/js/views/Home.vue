<template>
<div>
  <header-section title="Home page" lead="Home page  page Home page H pomeage" :breadcrumbs="[]"></header-section>

  <hello-vue message="Welcome to my Site"></hello-vue>
</div>
</template>

<script>
import HelloVue from "../components/HelloVue";
import {HeaderSection} from '@/components/layouts';

export default {
  name: "Home",
  components:{
    HelloVue,
    HeaderSection
  }
}
</script>

<style scoped>

</style>