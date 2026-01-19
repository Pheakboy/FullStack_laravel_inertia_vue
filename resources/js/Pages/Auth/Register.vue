<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import InputText from "../Components/InputText.vue";

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
    avatar: null,
});

const avatarPreview = ref(null);
const fileInput = ref(null);

const submitForm = () => {
    form.post(route("register"), {
        onError: () => {
            form.reset("password", "password_confirmation");
        },
    });
    console.log(form);
};

const handleAvatarClick = () => {
    fileInput.value.click();
};

const handleAvatarChange = (e) => {
    const file = e.target.files[0];
    if (file) {
        form.avatar = file;

        // Preview the avatar
        const reader = new FileReader();
        reader.onload = (event) => {
            avatarPreview.value = event.target.result;
        };
        reader.readAsDataURL(file);
    }
};
</script>

<template>
    <Head title="Register" />

    <div class="my-10 flex items-center justify-center">
        <div class="w-full max-w-md bg-gray-100 p-8 rounded-xl shadow-lg">
            <h1 class="text-3xl font-bold text-center text-blue-500 mb-6">
                Register a New Account
            </h1>

            <form @submit.prevent="submitForm" class="space-y-5">
                <div class="flex flex-col items-center">
                    <div
                        @click="handleAvatarClick"
                        :style="{
                            backgroundImage: avatarPreview
                                ? `url(${avatarPreview})`
                                : 'none',
                            backgroundColor: avatarPreview
                                ? 'transparent'
                                : '#E5E7EB',
                        }"
                        class="w-32 h-32 rounded-full border-4 border-blue-500 cursor-pointer hover:opacity-80 transition duration-200 flex items-center justify-center mb-4 bg-cover bg-center"
                    >
                        <span v-if="!avatarPreview" class="text-gray-400">
                            <svg
                                class="w-12 h-12"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </span>
                    </div>
                    <input
                        ref="fileInput"
                        @change="handleAvatarChange"
                        type="file"
                        id="avatar"
                        accept="image/*"
                        class="hidden"
                    />
                    <p v-if="form.errors.avatar" class="text-red-500 text-sm">
                        {{ form.errors.avatar }}
                    </p>
                    <p class="text-xs text-gray-500 mt-2">
                        Click to upload avatar
                    </p>
                </div>

                <InputText
                    name="Name"
                    v-model="form.name"
                    :message="form.errors.name"
                />
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

                <InputText
                    name="Confirm Password"
                    type="password"
                    v-model="form.password_confirmation"
                    :message="form.errors.password_confirmation"
                />

                <div class="text-sm text-gray-600">
                    <p>
                        Already have an account?
                        <a
                            :href="route('login')"
                            class="text-blue-500 hover:underline"
                            >Login</a
                        >
                    </p>
                </div>

                <button
                    type="submit"
                    class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition duration-200 font-semibold"
                >
                    Register
                </button>
            </form>
        </div>
    </div>
</template>
