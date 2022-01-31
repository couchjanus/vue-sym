// assets/js/store/modules/brand.js
// import axios from 'axios';
import http from "@/services/http";

const state = {
    all: []
};

const getters = {};

// Объявление мутации
const mutations = {
    SET_BRANDS (state, brands) {
        state.all = brands;
    }
};

const actions = {
    getBrands (context) {
        http
            .getAll('/brands')
            .then(response => {
                // Вызов мутации в компоненте
                context.commit('SET_BRANDS', response.data);
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