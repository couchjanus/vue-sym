<template>
<section class="py-5 bg-light">
  <div class="container py-4">
    <div class="row">
      <div class="col-lg-9 order-2 order-lg-1">
        <h1>{{ title }}</h1>
        <p class="lead text-muted">{{ lead }}</p>
        <ol class="breadcrumb py-4 justify-content-lg-end mb-0">
          <li class="breadcrumb-item"><router-link to="/">Home</router-link>&nbsp;</li>
          <span v-if="breadcrumbs.length != 0">
          <li v-for="breadcrumb in breadcrumbs" v-bind:key="breadcrumb.text"> / {{ breadcrumb.text }}</li>
          </span>
        </ol>
      </div>
    </div>
  </div>
</section>
</template>

<script>

export default {
  name: "HeaderSection",
  props:{
    title: String,
    lead: String,
    breadcrumbs: {
      type: Array,
      require: false
    }
  }
}
</script>

<style scoped>
.breadcrumb {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  padding: 0 0;
  margin-bottom: 1rem;
  list-style: none
}

.breadcrumb-item+.breadcrumb-item {
  padding-left: .5rem
}

.breadcrumb-item+.breadcrumb-item::before {
  float: left;
  padding-right: .5rem;
  color: #6c757d;
  content: var(--bs-breadcrumb-divider, "/")
  /* rtl: var(--bs-breadcrumb-divider, "/") */
}

.breadcrumb-item.active {
  color: #6c757d
}
</style>