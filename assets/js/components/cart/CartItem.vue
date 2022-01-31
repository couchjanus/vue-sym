<template>
  <div class="row d-flex align-items-center bord">
    <div class="col-5">
      <div class="d-flex align-items-center">
        <img v-if="cartItem.cover" class="img-fluid" :src="'/images/products/' + cartItem.cover"
             alt="product"
             width="75">
        <div class="ms-3">
          <a href="detail">
            <h5 class="mb-0 text-dark fw-normal">{{cartItem.name}}</h5>
          </a>
        </div>
      </div>
    </div>
    <div class="col-2"><span>${{cartItem.price}}</span></div>
    <div class="col-2">
      <div class="d-flex align-items-center">
        <div class="quantity d-flex align-items-center me-4">
          <div class="dec-btn" @click="decrease(cartItem)">-</div>
          <input class="quantity-no" type="text" :value="cartItem.quantity">
          <div class="inc-btn" @click="increase(cartItem)">+</div>
        </div>
      </div>
    </div>
    <div class="col-2"><span>${{parseFloat(cartItem.price*cartItem.quantity).toFixed(2)}}</span></div>
    <div class="col-1 text-center">
      <button class="delete btn btn-link text-dark p-0" @click="removeFromCart(cartItem)"><i class="fas fa-trash-alt"></i></button>
    </div>
  </div>
</template>

<script>

import {mapGetters, mapActions} from 'vuex';
import {CartAction} from "@/store/types.actions";

export default {
  name: "CartItem",
  props: {
    cartItem: {
      type: Object,
      default() {
        return {}
      }
    }
  },
  methods: {
    ...mapActions('cart',
        {
          updateQuantity: CartAction.UPDATE_CART_ITEM_QUANTITY,
          removeProductFromCart: CartAction.REMOVE_FROM_CART,

        }),
    removeFromCart(cartItem) {
      this.removeProductFromCart(cartItem);
    },
    decrease(cartItem) {
      if (cartItem.quantity > 1) {
        this.updateCartItem(cartItem, -1)
      }
    },
    increase(cartItem) {
      this.updateCartItem(cartItem, 1)
    },

    updateCartItem(cartItem, quantity) {
      quantity = parseInt(quantity);
      this.updateQuantity({cartItem, quantity});
    }
  }
};
</script>

<style scoped>

.quantity .inc-btn,
.quantity .dec-btn {
  width: 30px;
  height: 30px;
  border-radius: 50%;
  line-height: 30px;
  border: 1px solid #999;
  text-align: center;
  cursor: pointer;
  -moz-user-select: none !important;
  -ms-user-select: none !important;
  user-select: none !important;
  -webkit-user-select: none !important
}
.quantity input {
  width: 30px;
  height: 30px;
  border: none;
  text-align: center;
  color: #333;
  font-weight: 400;
  line-height: 30px;
  outline: none
}
@media (max-width: 991.98px) {
  .cart-outer {
    overflow: auto
  }
}
@media (max-width: 991.98px) {
  .cart-inner {
    min-width: 991px
  }
}

</style>