<template>
    <Head>
        <title>Login</title>
    </Head>

    <main class="grid place-items-center min-h-screen">
        <section class="bg-white p-8 rounded-xl max-w-md mx-auto border">
            <h1 class="text-3xl mb-6">Login</h1>

            <form @submit.prevent="submit">
                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Email
                    </label>

                    <input v-model="form.email" type="email" name="email" id="email" class="border p-2 w-full rounded" required>

                    <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs mt-1"></div>
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Password
                    </label>

                    <input v-model="form.password" type="password" name="password" id="password" class="border p-2 w-full rounded" required>

                    <div v-if="form.errors.password" v-text="form.errors.password" class="text-red-500 text-xs mt-1"></div>
                </div>

                <div class="mb-6">
                    <button type="submit" class="bg-gray-600 text-white rounded py-2 px-4 hover:bg-gray-900" :disabled="form.processing">
                        Login
                    </button>
                </div>
            </form>
        </section>
    </main>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3';

let form = useForm({
    email: '',
    password: ''
});

let submit = () => {
    form.post('/login');
};
</script>

<script>
export default {
    layout: null
};
</script>
