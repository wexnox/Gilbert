<template>
    <div id="register" class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="max-w-md w-full space-y-8 p-10 bg-white rounded-xl shadow-lg z-10">
            <div class="text-center">
                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                    Register
                </h2>
            </div>
            <form class="mt-8 space-y-6" @submit.prevent="onSubmit">
                <div>
                    <label for="name" class="sr-only">Name</label>
                    <input id="name" v-model="name" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Name">
                </div>

                <div>
                    <label for="email" class="sr-only">Email</label>
                    <input id="email" v-model="email" type="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email">
                </div>

                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" v-model="password" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password">
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Register
                    </button>
                </div>
            </form>
        </div>
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
