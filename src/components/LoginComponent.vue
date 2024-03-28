<template>
    <div>
        <input type="text" v-model="username" placeholder="Username">
        <input type="password" v-model="password" placeholder="Password">
        <button @click="login()">Login</button>
    </div>
</template>

<script>
import axios from 'axios'; // you mentioned that your project uses Axios, so let's use that for HTTP requests

export default {
    name: 'LoginComponent',
    data() {
        return {
            username: '',
            password: ''
        }
    },
    methods: {
        login() {
            axios.post('/api/login', {
                username: this.username,
                password: this.password
            })
                .then(response => {
                    if (response.data.success) {
                        // login succeeded
                        this.$router.push('/home');
                    } else {
                        // login failed
                    }
                })
                .catch(error => {
                    // handle error
                });
        }
    }
}
</script>

<style scoped>
/* add your styles here */
</style>
