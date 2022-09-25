<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';

defineProps({
    authUser: Object,
    usersToFollow: Array,
    usersYouFollow: Array,
})
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                Follow or Unfollow
            </h2>
        </template>

        <div class="my-0 mx-auto max-w-3xl text-center">

            <p class="px-10 pb-10 text-center">Use this page to follow or unfollow other users</p>

            <div>{{ authUser.name }} would you like to follow or unfollow any of these users?</div>

            <div class="flex mb-4">
                <div class="w-1/2 bg-gray-400 h-auto text-center">
                    Users to Follow:
                    <ul id="example-1">
                        <li v-for="user in usersToFollow">
                            <div class="p-2 border border-black-500">
                                <a :href="'/follows/' + user.id" id="user.id" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">{{ user.name }}</a>
                            </div>
                        </li>
                    </ul>
                </div>
                `
                <div class="w-1/2 bg-blue-400 h-auto text-center">
                    <div>Users You Follow:</div>
                    <ul id="example-2">
                        <li v-for="followedUser in usersYouFollow">
                            <div class="p-2 border border-black-500">
                                <a :href="'/unfollows/' + followedUser.id" id="user.id" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">{{ followedUser.name }}</a>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
            
        </div>
    </AuthenticatedLayout>
</template>
