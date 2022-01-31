<template>

  <div>
    <section class="py-5">
      <div class="container py-5">
        <div class="cart-outer">
          <div class="cart-inner">
            <div class="bg-light rounded-pill px-4 py-3">
              <div class="row fw-normal text-uppercase">
                <div class="col-5">Product</div>
                <div class="col-2">Price</div>
                <div class="col-2">Quantity</div>
                <div class="col-2">Total</div>
                <div class="col-1 text-center">Remove</div>
              </div>
            </div>
            <div class="p-4 border-bottom" v-for="(cartItem, index) in getProductsInCart" :key="index">
              <cart-item :cartItem="cartItem"></cart-item>>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="d-flex justify-content-end flex-column flex-lg-row"><a class="btn btn-outline-secondary px-sm-5 my-1 ms-2" href="category"> <i class="fas fa-angle-left me-2"></i>Continue Shopping</a><a class="btn btn-primary px-sm-5 my-1 ms-2" @click="clearCart()">Clear Cart<i class="fas fa-angle-right ms-2"></i></a></div>
      </div>
    </section>
    <section class="pb-5"> <!-- Order Details Section-->
      <div class="container pb-5">
        <div class="row gy-4">
          <div class="col-lg-6">
            <div class="bg-light rounded-pill px-4 py-3">
              <h6 class="mb-0 text-uppercase">Coupon Code</h6>
            </div>
            <div class="p-4">
              <p>If you have a coupon code, please enter it in the box below</p>
              <form action="#">
                <div class="input-group mb-3">
                  <input class="form-control" type="text" name="coupon">
                  <button class="btn btn-dark" type="button">Apply coupon</button>
                </div>
              </form>
            </div>
            <div class="bg-light rounded-pill px-4 py-3">
              <h6 class="mb-0 text-uppercase">Instructions for seller</h6>
            </div>
            <div class="p-4">
              <p>If you have some information for the seller you can leave them in the box below</p>
              <form action="#">
                <textarea class="rounded form-control" name="instructions"></textarea>
              </form>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="bg-light rounded-pill px-4 py-3">
              <h6 class="mb-0 text-uppercase">Order Summary</h6>
            </div>

            <div class="p-4">
              <p class="text-muted">Shipping and additional costs are calculated based on values you have entered.</p>
              <ul class="list-unstyled">
                <li class="d-flex justify-content-between py-3 border-bottom"><span>Order Subtotal </span><strong class="fw-normal">${{ parseFloat(totalPrice()).toFixed(2) }}</strong></li>
                <li class="d-flex justify-content-between py-3 border-bottom"><span>Shipping and handling</span><strong class="fw-normal">${{parseFloat(shipping).toFixed(2)}}</strong></li>
                <li class="d-flex justify-content-between py-3 border-bottom"><span>Tax</span><strong class="fw-normal">${{parseFloat(tax).toFixed(2)}}</strong></li>
                <li class="d-flex justify-content-between py-3 border-bottom"><span>Total</span><strong class="text-primary h5 mb-0">${{ calculateTotal() }}</strong></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-12 text-center py-4"><a class="btn btn-primary btn-lg px-5" href="checkout">Proceed to checkout<i class="fas fa-long-arrow-alt-right ms-2"></i></a></div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import CartItem from './CartItem';
import {mapGetters, mapActions} from 'vuex';
import {CartAction} from "@/store/types.actions";

export default {
  name: "CartList",
  data: function () {
    return {
      tax: 0.00,
      shipping: 10.00
    }
  },
  components: {
    CartItem,
  },

  computed: {
      ...mapGetters('cart', [
        'getProductsInCart',
      ]),
    },


  methods: {
      ...mapActions('cart',
          {
            clearCartAction: CartAction.CLEAR_CART,
          }),
      hasProduct() {
        return this.getProductsInCart.length > 0;
      },
      totalPrice() {
        const price = this.getProductsInCart.reduce((accumulator, cartItem) =>
            accumulator + cartItem.quantity * cartItem.price, 0);
        if (price)
          return price.toFixed(2);
        else {
          // this may occur when you delete all cart items
          debugger;
          return 0
        }
      },

      clearCart() {
        this.clearCartAction();
      },

      calculateTotal() {
        const price = this.totalPrice();
        if (price > 0) {
          const total = parseFloat(this.tax) + parseFloat(this.shipping) + parseFloat(price);
          return parseFloat(total).toFixed(2);
        }
        else {
          return 0
        }
      },
    },
  };

</script>

<style scoped>

</style>