<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import InputText from "../Components/InputText.vue";

const form = useForm({
    email: null,
    password: null,
    remember: null,
});

const submitForm = () => {
    form.post(route("login"), {
        onError: () => {
            form.reset("password");
        },
    });
    console.log(form);
};
</script>

<template>
    <Head title="Login" />

    <div class="my-10 flex items-center justify-center">
        <div class="w-full max-w-md bg-gray-100 p-8 rounded-xl shadow-lg">
            <h1 class="text-3xl font-bold text-center text-blue-500 mb-6">
                Login to Your Account
            </h1>

            <form @submit.prevent="submitForm" class="space-y-5">
                <InputText
                    name="Email"
                    type="email"
                    v-model="form.email"
                    :message="form.errors.email"
                />

                <InputText
                    name="Password"
                    type="password"
                    v-model="form.password"
                    :message="form.errors.password"
                />

                <div class="flex justify-between items-center">
                    <div>
                        <label class="inline-flex items-center">
                            <input
                                type="checkbox"
                                class="form-checkbox h-4 w-4 text-blue-600"
                                v-model="form.remember"
                            />
                            <span class="ml-2 text-gray-700">Remember Me</span>
                        </label>
                    </div>

                    <div class="text-sm text-gray-600">
                        <p>
                            Need an account?
                            <a
                                :href="route('register')"
                                class="text-blue-500 hover:underline"
                                >Register</a
                            >
                        </p>
                    </div>
                </div>

                <button
                    type="submit"
                    class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition duration-200 font-semibold"
                >
                    Login
                </button>
            </form>
        </div>
    </div>
</template>
