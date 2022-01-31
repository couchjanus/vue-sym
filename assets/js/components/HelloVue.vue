<template>
<div>
  <h2>{{ message }}</h2>
</div>
</template>

<script>
export default {
  name: "HelloVue",
  props:{
    message: String
  }
}
</script>

<style scoped>

</style>