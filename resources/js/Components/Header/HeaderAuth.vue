<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import DropdownMenu from "@/Components/DropdownMenu.vue";
import SocialMediaMobile from "@/Components/SocialMediaMobile.vue";
import {ref} from "vue";
import {Link, usePage} from '@inertiajs/vue3';
import WhatsApp from '@/assets/svg/WhatsApp.svg';
import Telegram from '@/assets/svg/Telegram.svg';
import Telephone from '@/assets/svg/Telephone.svg';
import NavbarAuthRightDropdown from "@/Components/Header/Parts/NavbarAuthRightDropdown.vue";
import DownArrow from "@/assets/svg/ArrowDown.svg";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import Callback from "@/Components/Popup/Callback.vue";

const showingNavigationDropdown = ref(false);
const openModal = ref(false);
const ulMenu = ref(null);
const page = usePage();
const currentBranch = page.props.currentBranch;
const branches = page.props.branches;

</script>

<template>
    <header class="header AuthHeader container">
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
                    <Link :href="route('services')">Услуги</Link>
                    <Link :href="route('reception.create')">Запись</Link>
                    <Link :href="route('medCard.index')">Медкарта</Link>
                </div>
            </DropdownMenu>
            <ul class="ul__list" ref="ulMenu">
                <li>
                    <Link :href="route('services')">Услуги</Link>
                </li>
                <li><Link :href="route('reception.create')">Запись</Link></li>
                <li>
                    <Link :href="route('medCard.index')">Медкарта</Link>
                </li>
                <div class="Dropdown DropOther">
                    <button id="dropbtn" class="btnMenu flex items-center gap-3">Ещё
                        <DownArrow/>
                    </button>
                    <div class="dropdown-content flex flex-col gap-3.5 font-bold w-[200px]">
                        <li>
                            <a href="https://volyavet.ru/contacts">Контакты</a>
                        </li>
                        <li>
                            <Link :href="route('dashboard')">Новости и акции</Link>
                        </li>
                    </div>
                </div>
            </ul>
            <DropdownMenu class="v-PC" style="margin-left: 20px;">
                <template #name>
                    {{ currentBranch.title }}
                </template>
                <div class="dropdown_menu">
                    <a v-for="branch in branches" :href="'/branch/' + branch.id">
                        {{ branch.title }}
                    </a>
                </div>
            </DropdownMenu>
        </div>

        <div class="contacts-block lg:!flex items-center gap-10 hidden">
            <div class="flex">
                <a :href="'tel:'+$page.props.contacts.number" class="flex items-center gap-3.5">
                    <Telephone class="w-[20px] h-[20px]"/>
                    {{ $page.props.contacts.number }}</a>
            </div>
            <div class="gap-4 flex">
                <a :href="'https://'+$page.props.contacts.telegram">
                    <Telegram/>
                </a>
                <a :href="'https://'+$page.props.contacts.whatsapp">
                    <WhatsApp/>
                </a>
            </div>

            <SecondaryButton @click="openModal = true">Обратный звонок</SecondaryButton>
        </div>

        <!-- DropDown Right Part -->
        <NavbarAuthRightDropdown ml0="true" :showingNavigationDropdown="showingNavigationDropdown"/>
        <!-- /DropDown Right Part -->

    </header>
    <SocialMediaMobile/>
    <Teleport to="body">
        <Callback v-model="openModal"/>
    </Teleport>
</template>
