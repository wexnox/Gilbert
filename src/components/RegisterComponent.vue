<template>
    <div id="register">
        <h1>Register</h1>
        <form @submit.prevent="onSubmit">
            <div>
                <label for="name">Name</label>
                <input id="name" v-model="name" type="text" required>
            </div>

            <div>
                <label for="email">Email</label>
                <input id="email" v-model="email" type="email" required>
            </div>

            <div>
                <label for="password">Password</label>
                <input id="password" v-model="password" type="password" required>
            </div>

            <button type="submit">Register</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'RegisterComponent',
    data() {
        return {
            name: '',
            email: '',
            password: ''
        };
    },
    methods: {
        async onSubmit() {
            try {
                const response = await axios.post('/api/register', {
                    name: this.name,
                    email: this.email,
                    password: this.password
                });
                console.log(response);
            } catch(error) {
                console.error(error);
            }
        }
    }
};
</script>
