<template>
  <div class="cart">
    <header-section title="Shopping cart" lead="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt." :breadcrumbs="[{url:'cart', text:'Shopping cart'},]"></header-section>
    <cart-list></cart-list>
  </div>
</template>
<script>
import { HeaderSection } from '@/components/layouts';
import CartList from '@/components/cart/CartList';
export default {
  name: "Cart",
  components: {
    HeaderSection,
    CartList
  },
}

</script>

<style scoped>

</style>