<template>
  <div class="product">
    <div class="image d-flex align-items-center justify-content-center bg-light">
      <div class="ribbon ribbon-primary text-uppercase">Sale</div>
      <img v-if="product.cover" class="img-fluid" :src="'/images/products/' + product.cover"
           alt="product">
      <div class="hover-overlay d-flex align-items-center justify-content-center">
        <div class="CTA d-flex align-items-center justify-content-center"><a href="#" @click="addProductToCart" title="Add to cart"><i class="fas fa-shopping-cart"></i></a><a class="active" href="#"><i class="fas fa-search"></i> View</a><a href="#" data-bs-toggle="modal" data-bs-target="#productView"><i class="fas fa-expand"></i></a></div>
      </div>


    </div>
    <div class="pt-3"><small class="text-muted">{{product.category}}</small><a class="reset-anchor" href="#">
      <h3 class="h6 mb-0 text-uppercase">{{product.name}}</h3></a><span class="text-muted">${{product.price}}</span></div>
  </div>

</template>

<script>
import {mapActions} from "vuex";
import {CartAction} from "@/store/types.actions";

export default {
  name: "ProductItem",
  props: {
    product: {
      type: Object,
      default() {
        return {}
      }
    }
  },
  methods: {
    ...mapActions('cart',
        {
          addProduct: CartAction.ADD_PRODUCT_TO_CART,
        }),
    addProductToCart() {
      this.addProduct({product: this.product, quantity: 1});
    },
  },
}
</script>

<style scoped>
.product.bg-light .image .hover-overlay {
  background: rgba(248, 249, 250, 0.9)
}

.product .image {
  position: relative
}

.product .image:hover .hover-overlay {
  opacity: 1
}

.product .image:hover a {
  -webkit-transform: none !important;
  transform: none !important;
  opacity: 1 !important
}

.product .ribbon {
  position: absolute;
  top: 10px;
  left: -11px;
  z-index: 999;
  font-size: 0.9em
}
.ribbon-primary {
  background: #9055A2
}

.ribbon-primary::before {
  border-top: 14px solid #55325f
}
.badge-secondary-light {
  color: #6c757d;
  background-color: theme-color-level("secondary", -11)
}
.ribbon-secondary {
  background: #6c757d
}
.ribbon-secondary::before {
  border-top: 14px solid #3d4246
}
.ribbon {
  padding: 5px 15px;
  color: #fff;
  font-weight: 400;
  text-align: center;
  display: inline-block;
  position: relative;
  letter-spacing: 0.2em;
  position: absolute;
  top: 0;
  left: -12px
}

.ribbon::before {
  content: '';
  border-left: 12px solid transparent;
  border-right: 0 solid transparent;
  position: absolute;
  bottom: -14px;
  left: 0
}

.product .hover-overlay {
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  background: rgba(255, 255, 255, 0.92);
  opacity: 0;
  transition: all 0.5s
}

.product .hover-overlay a {
  width: 40px;
  height: 40px;
  text-align: center;
  line-height: 40px;
  border: 1px solid #ddd;
  color: #777;
  text-decoration: none;
  transition: all 0.3s
}
.product .hover-overlay a:hover {
  color: #9055A2;
  border-color: #9055A2
}

.product .hover-overlay a:first-of-type {
  -webkit-transform: translateX(-20px);
  transform: translateX(-20px);
  opacity: 0
}

.product .hover-overlay a:last-of-type {
  -webkit-transform: translateX(20px);
  transform: translateX(20px);
  opacity: 0
}

.product .hover-overlay a.active {
  width: 120px;
  background: #9055A2;
  color: #fff;
  border-color: transparent;
  font-weight: 300;
  font-size: 0.8em;
  margin: 0 5px;
  opacity: 0
}

.product .hover-overlay a.active i {
  margin-right: 5px
}


</style>