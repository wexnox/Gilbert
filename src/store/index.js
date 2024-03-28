import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';

Vue.use(Vuex);

export default new Vuex.Store({
    state: function() {
        return {
            status: '',
            token: localStorage.getItem('token') || '',
            user: {}
        };
    },
    mutations: {
        auth_request(state) {
            state.status = 'loading';
        },
        auth_success(state, payload) { // Use a single payload object
            state.status = 'success';
            state.token = payload.token;
            state.user = payload.user;
        },
        auth_error(state) {
            state.status = 'error';
        },
        logout(state){
            state.status = '';
            state.token = '';
            state.user = {};
        },
    },
    actions: {
        login({ commit }, user) {
            return new Promise((resolve, reject) => {
                commit('auth_request');
                axios({ url: process.env.VUE_APP_API_URL, data: user, method: 'POST' }) // Use environment variable for API URL
                    .then(resp => {
                        const token = resp.data.token;
                        const user = resp.data.user;
                        localStorage.setItem('token', token);
                        axios.defaults.headers.common['Authorization'] = `Bearer ${token}`; // More explicit Authorization header
                        commit('auth_success', { token, user }); // Pass as an object
                        resolve(resp);
                    })
                    .catch(err => {
                        commit('auth_error');
                        localStorage.removeItem('token');
                        reject(err);
                    });
            });
        },
        logout({ commit }) {
            return new Promise((resolve) => {
                commit('logout');
                localStorage.removeItem('token');
                delete axios.defaults.headers.common['Authorization'];
                resolve();
            });
        },
    },
    getters: {
        isAuthenticated: state => !!state.token,
    },
    modules: {}
});
