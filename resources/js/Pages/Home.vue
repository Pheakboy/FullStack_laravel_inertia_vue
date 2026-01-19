<script setup>
import { Head, Link } from "@inertiajs/vue3";
// import TestLayout from "@/layout/TestLayout.vue";
// defineOptions({
//     layout: TestLayout,
// });
defineProps({
    users: Object,
});

const getDate = (date) => {
    if (!date) return "";
    return new Date(date).toLocaleDateString("en-US", {
        year: "numeric",
        month: "long",
        day: "numeric",
    });
};
</script>

<template>
    <Head title="Home" />
    <div class="m-6 flex justify-end">
        <input
            type="text"
            placeholder="Search users by name or email..."
            class="w-80 px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
        />
    </div>
    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2 text-left">
                    Avatar
                </th>
                <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
                <th class="border border-gray-300 px-4 py-2 text-left">
                    Email
                </th>
                <th class="border border-gray-300 px-4 py-2 text-left">
                    RegisterDate
                </th>
            </tr>
        </thead>
        <tbody>
            <tr
                v-for="user in users.data"
                :key="user.id"
                class="hover:bg-gray-100"
            >
                <td class="border border-gray-300 px-4 py-2">
                    <img
                        :src="
                            user.avatar
                                ? 'storage/' + user.avatar
                                : 'storage/avatars/default-avatar.png'
                        "
                        alt=""
                        class="h-20 w-20 rounded-full object-cover"
                    />
                </td>
                <td class="border border-gray-300 px-4 py-2">
                    {{ user.name }}
                </td>
                <td class="border border-gray-300 px-4 py-2">
                    {{ user.email }}
                </td>
                <td class="border border-gray-300 px-4 py-2">
                    {{ getDate(user.created_at) }}
                </td>
            </tr>
        </tbody>
    </table>

    <!-- pagination -->
    <div class="flex flex-wrap items-center gap-2 m-6">
        <div class="text-sm text-gray-600 mr-auto">
            Showing {{ users.from }}-{{ users.to }} of {{ users.total }} users
        </div>

        <Link
            v-for="link in users.links"
            :key="link.label"
            :href="link.url || ''"
            :disabled="!link.url"
            v-html="link.label"
            class="px-3 py-2 text-sm rounded border transition-colors duration-150"
            :class="[
                link.active
                    ? 'bg-blue-500 text-white border-blue-500'
                    : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-100',
                !link.url &&
                    'bg-gray-100 text-gray-400 border-gray-200 cursor-not-allowed hover:bg-gray-100',
            ]"
        />
    </div>
</template>
