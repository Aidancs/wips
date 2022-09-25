<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { ChevronDownIcon } from '@heroicons/vue/20/solid'

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
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm sm:rounded-lg">
                    <div class="p-60 bg-white border-b border-gray-200">
                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class="flex">
                        {{ authUser.name }} would you like to follow any of these users?
                            <Menu as="div" class="flex pl-6 relative inline-block text-left">
                                <div>
                                    <MenuButton class="inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100">
                                        Users to be followed
                                        <ChevronDownIcon class="-mr-1 ml-2 h-5 w-5" aria-hidden="true" />
                                    </MenuButton>
                                </div>

                                <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                    <MenuItems class="absolute z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                        <div class="py-1">
                                            <ul id="example-1">
                                                <li v-for="user in usersToFollow">
                                                    <MenuItem v-slot="{ active }">
                                                        <a :href="'/follows/' + user.id" id="user.id" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">{{ user.name }}</a>
                                                    </MenuItem>
                                                </li>
                                            </ul>
                                        </div>
                                    </MenuItems>
                                </transition>
                            </Menu>
                        </div>
                        <div class="flex">
                            <ul >
                                Users you follow:
                                <li v-for="followedUser in usersYouFollow">
                                    <div class="p-2 border border-black-500">{{ followedUser.name }}</div>
                                    <!--                                                        <a :href="'/follows/' + user.id" id="user.id" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">{{ user.name }}</a>-->
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
