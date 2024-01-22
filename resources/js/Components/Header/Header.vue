<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import DropdownMenu from "@/Components/DropdownMenu.vue";
import SearchBar from "@/Components/SearchBar.vue";
import SocialMediaMobile from "@/Components/SocialMediaMobile.vue";
import {ref} from "vue";
import {Link, usePage} from '@inertiajs/vue3';
import ArrowDown from "@/assets/svg/ArrowDown.svg";
import UserCircle from "@/assets/svg/UserCircle.svg";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
const ulMenu = ref(null);
const showingNavigationDropdown = ref(false);
const page = usePage();
const currentBranch = page.props.currentBranch;
const branches = page.props.branches;

</script>

<template>
    <header class="header container">
        <div class="header__logo">
            <a :href="'https://volyavet.ru'">
                <ApplicationLogo class="w-[71px] h-[71px] max-w-[71px]"/>
            </a>
        </div>
        <div class="header__menu">
            <DropdownMenu>
                <template #name>
                    Меню
                </template>
                <div class="dropdown_menu">
                    <Link :href="route('main')">Новости и Акции</Link>
                    <a href="https://volyavet.ru/aboutUs">О нас</a>
                    <Link :href="route('services')">Услуги и цены</Link>
                    <a href="https://volyavet.ru/library">Библиотека</a>
                    <a href="https://volyavet.ru/#team">Наша команда</a>
                    <a href="https://volyavet.ru/#feedback">Отзывы</a>
                    <a href="https://volyavet.ru/contacts">Контакты</a>
                </div>
            </DropdownMenu>
            <DropdownMenu style="margin-left: 20px;">
                <template #name>
                    {{ currentBranch.title }}
                </template>
                <div class="dropdown_menu">
                    <a v-for="branch in branches" :href="'/branch/' + branch.id">
                        {{ branch.title }}
                    </a>
                </div>
            </DropdownMenu>
            <ul class="ul__list" ref="ulMenu">
                <li><Link :href="route('main')">Новости и Акции</Link></li>
                <li><a href="https://volyavet.ru/aboutUs">О нас</a></li>
                <li><Link :href="route('services')">Услуги и цены</Link></li>
                <li><a href="https://volyavet.ru/library">Библиотека</a></li>
                <li><a href="https://volyavet.ru/#team">Наша команда</a></li>
                <li><a href="https://volyavet.ru/#feedback">Отзывы</a></li>
                <li><a href="https://volyavet.ru/contacts">Контакты</a></li>
                <DropdownMenu class="v-PC">
                    <template #name>
                        {{ currentBranch.title }}
                    </template>
                    <div class="dropdown_menu">
                        <a v-for="branch in branches" :href="'/branch/' + branch.id">
                            {{ branch.title }}
                        </a>
                    </div>
                </DropdownMenu>
            </ul>
        </div>
        <SearchBar :ulMenu="ulMenu"/>


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
            <div class=" pb-1">
                <div class="mt-3 space-y-1">
                    <ResponsiveNavLink :href="route('login')">Войти</ResponsiveNavLink>
                    <ResponsiveNavLink :href="route('register')">Регистрация</ResponsiveNavLink>
                </div>
            </div>
        </div>
    </header>
    <SocialMediaMobile/>
</template>
