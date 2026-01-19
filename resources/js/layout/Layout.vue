<script setup>
import Footer from "../Pages/Components/Footer.vue";
import NavBar from "../Pages/Components/NavBar.vue";
</script>

<template>
    <div class="flex flex-col min-h-screen bg-white">
        <!-- Header/Navbar -->
        <NavBar />

        <!-- Main Content - Each Page Will Show Different Content Here -->
        <main class="flex-1 w-full">
            <slot />
        </main>

        <!-- Footer -->
        <Footer />
    </div>
</template>
