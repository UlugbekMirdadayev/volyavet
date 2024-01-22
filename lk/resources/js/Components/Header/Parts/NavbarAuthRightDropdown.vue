<script setup>

import DropdownLink from "@/Components/DropdownLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import Dropdown from "@/Components/Dropdown.vue";
import ArrowDown from "@/assets/svg/ArrowDown.svg";
import Hamburger from "@/assets/svg/Hamburger.svg";
import Cross from "@/assets/svg/Cross.svg";
import UserCircle from "@/assets/svg/UserCircle.svg";
import {getFullname} from "../../../utils/methods.js";

defineProps(['showingNavigationDropdown', 'ml0'])

</script>

<template>
    <div class="hidden sm:!flex sm:items-center" :class="ml0 ? 'ml-0' : 'sm:ml-6'">
        <!-- Settings Dropdown -->
        <div class="ml-3 relative">
            <Dropdown align="right" width="48">
                <template #trigger>
                    <span class="inline-flex rounded-md">
                        <button
                            type="button"
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                        >
                            <UserCircle class="w-12 h-12"/>
                            <ArrowDown class="ml-2 -mr-0.5"/>
                        </button>
                    </span>
                </template>

                <template #content>
                    <div class="pt-4 pb-1">
                        <div class="px-4">
                            <div class="font-medium text-sm text-white flex gap-3">
                                <UserCircle class="w-8 h-8"/> {{ getFullname($page.props.auth.user) }}
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('pets.create')"> Добавить питомца</ResponsiveNavLink>
                            <ResponsiveNavLink :href="route('profile.edit')">Смена пароля</ResponsiveNavLink>
                            <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                                Выйти
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </template>
            </Dropdown>
        </div>
    </div>

    <!-- Hamburger -->
    <div class="-mr-2 flex items-center sm:hidden">
        <button
            @click="showingNavigationDropdown = !showingNavigationDropdown"
            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:text-gray-500 transition duration-150 ease-in-out"
        >
            <UserCircle class="w-12 h-12"/>
            <ArrowDown class="ml-2 -mr-0.5"/>
        </button>
    </div>


    <!-- Responsive Navigation Menu MOBILE -->
    <div
        :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
        class="sm:hidden absolute top-20 right-3.5 z-50 bg-[#3D4C87] rounded-[10px] shadow-xl"
    >
        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1">
            <div class="px-4">
                <div class="font-medium text-base text-white flex flex-row gap-2.5 items-center">
                    <UserCircle class="w-8 h-8"/> {{ $page.props.auth.user.name }}
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <ResponsiveNavLink :href="route('pets.create')"> Добавить питомца</ResponsiveNavLink>
                <ResponsiveNavLink :href="route('profile.edit')"> Смена пароля</ResponsiveNavLink>
                <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                    Выйти
                </ResponsiveNavLink>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
