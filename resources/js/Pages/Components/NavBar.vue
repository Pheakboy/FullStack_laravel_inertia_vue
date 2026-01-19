<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <header class="bg-gray-100 border-b border-gray-200 sticky top-0 z-50">
        <nav class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="text-2xl font-bold text-black tracking-tight">
                    <Link :href="route('home')">
                        <img
                            src="/public/Shop_Logo.png"
                            alt="Logo"
                            class="h-20 w-auto"
                        />
                    </Link>
                </div>
                <div
                    v-if="$page.props.auth.user"
                    class="flex gap-4 items-center"
                >
                    <img
                        :src="`/storage/${$page.props.auth.user.avatar}`"
                        alt="User Avatar"
                        class="h-10 w-10 rounded-full border-2 border-gray-300"
                    />
                    <span class="text-gray-700 font-medium">{{
                        $page.props.auth.user.name
                    }}</span>
                    <Link
                        method="post"
                        as="button"
                        type="button"
                        :href="route('logout')"
                        class="bg-black text-white px-5 py-2 rounded-lg font-medium hover:bg-gray-900 transition-colors duration-200"
                    >
                        Logout
                    </Link>
                </div>
                <div v-else class="flex gap-8 items-center">
                    <Link
                        :href="route('home')"
                        :class="
                            $page.component === 'Home'
                                ? 'bg-black text-white'
                                : 'text-gray-700 hover:text-black hover:bg-gray-100'
                        "
                        class="px-3 py-2 rounded-lg transition-all duration-200 font-medium"
                    >
                        Home
                    </Link>
                    <Link
                        :href="route('about')"
                        :class="
                            $page.component === 'About'
                                ? 'bg-black text-white'
                                : 'text-gray-700 hover:text-black hover:bg-gray-100'
                        "
                        class="px-3 py-2 rounded-lg transition-all duration-200 font-medium"
                    >
                        About
                    </Link>
                    <Link
                        :href="route('service')"
                        :class="
                            $page.component === 'Service'
                                ? 'bg-black text-white'
                                : 'text-gray-700 hover:text-black hover:bg-gray-100'
                        "
                        class="px-3 py-2 rounded-lg transition-all duration-200 font-medium"
                    >
                        Services
                    </Link>

                    <Link
                        :href="route('register')"
                        :class="
                            $page.component === 'Auth/Register'
                                ? 'bg-gray-900'
                                : 'bg-blue-500 hover:bg-blue-600'
                        "
                        class="text-white px-5 py-2 rounded-lg font-medium transition-colors duration-200"
                    >
                        Register
                    </Link>
                    <Link
                        :href="route('login')"
                        :class="
                            $page.component === 'Auth/Login'
                                ? 'bg-gray-900'
                                : 'bg-blue-500 hover:bg-blue-600'
                        "
                        class="text-white px-5 py-2 rounded-lg font-medium transition-colors duration-200"
                    >
                        Login
                    </Link>
                </div>
            </div>
        </nav>
    </header>
</template>
