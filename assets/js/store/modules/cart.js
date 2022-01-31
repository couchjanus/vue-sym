// "@/store/modules/cart";
import {CartService} from "@/services/local/cart";
import {CartAction} from "@/store/types.actions";

const state = {
    all: [],
};

const mutations = {
    'SET_CART_ITEMS'(state, cartItems) {
        state.all = cartItems;
    },

    CLEAR_CART: (state) => {
        state.all = [];
    }
};

const actions = {
    // actions can only receive one single developer controller parameter
    // so if we need two (product and quantity) we have to put them in a JS object and take them away with destruct operator {}
    [CartAction.ADD_PRODUCT_TO_CART]: (context, {product, quantity}) => {
        const cartItems = CartService.addItem(product, quantity);
        context.commit(CartAction.SET_CART_ITEMS, cartItems);
    },
    [CartAction.REMOVE_FROM_CART]: ({commit}, product) => {
        const cartItems = CartService.removeItem(product);
        commit(CartAction.SET_CART_ITEMS, cartItems);
    },

    [CartAction.UPDATE_CART_ITEM_QUANTITY](context, {cartItem, quantity}) {
        context.dispatch(CartAction.ADD_PRODUCT_TO_CART, {product: cartItem, quantity: parseInt(quantity)})
    },
    'CLEAR_CART'(context) {
        CartService.emptyCart();
        context.commit(CartAction.CLEAR_CART);
    }
};

const getters = {
    getProductsInCart: state => state.all,

    getTotalPrice: (state) => {
        let res = 0;
        state.all.map(item => {
            res += item.price * item.quantity;
        });
        return res;
    },

    getCartItemsAmount: state => {
        return state.all.reduce((total, item) => {
            total += item.quantity;
            return total
        }, 0);
    },

    // getCartItemQuantity: state => slug => {
    //     const cartItem = state.all.find(ci => ci.slug === slug);
    //     if (cartItem) return cartItem.quantity;
    //     else return 0;
    // }
};

export const cart = {
    namespaced: true,
    state,
    mutations,
    actions,
    getters
};

