import _ from 'lodash';
// import axios from 'axios';
import http from "@/services/http";

const state = {
    all: []
};

const getters = {
    minPrice: (state) => {
        return state.all.length
            ? Number(_.minBy(state.all, 'price').price)
            : 0;
    },
    maxPrice: (state) => {
        return state.all.length
            ? Number(_.maxBy(state.all, 'price').price)
            : 0;
    }
};

const mutations = {
    SET_PRODUCTS (state, products) {
        state.all = products;
    }
};

const actions = {
    getProducts (context) {
        http
            .getAll('/products')
            .then(response => {
                context.commit('SET_PRODUCTS', response.data);
                // console.log(response.data)
            })
            .catch(error => {
                console.log(error);
            });
    }
};

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}