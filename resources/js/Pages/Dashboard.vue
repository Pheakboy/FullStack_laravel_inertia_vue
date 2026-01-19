<script setup></script>

<template>
    <div>
        <p class="text-green-500">{{ $page.props.flash.greet }}</p>
        <p class="mt-4">Welcome to {{ $page.props.auth.user.name }}</p>
    </div>
</template>
