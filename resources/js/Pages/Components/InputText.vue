<script setup>
    const model = defineModel({
        type: null,
        required: true,
    });
defineProps({
    name: {
        type: String,
        required: true,
    },
    type: {
        type: String,
        default: "text",
    },
    message: String,
});
</script>

<template>
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
            {{ name }}
        </label>
        <input
            :type="type"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400"
            placeholder="Enter your name"
            v-model="model"
        />
        <small class="text-red-500" v-if="message">{{ message }}</small>
    </div>
</template>
