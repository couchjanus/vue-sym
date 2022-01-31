<template>
<div>
  <navbar-component></navbar-component>
  <router-view></router-view>
  <footer-component></footer-component>
</div>
</template>

<script>
import { NavbarComponent, FooterComponent } from '@/components/layouts';

export default {
  name: "Main",
  components: {
    NavbarComponent,
    FooterComponent
  },
  data() {
    return {
      message: "Welcome to external component"
    }
  }
}
</script>

<style scoped>
  .hello{
    color: red;
  }
</style>