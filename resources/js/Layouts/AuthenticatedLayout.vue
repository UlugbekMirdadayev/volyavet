<script setup>
import {ref} from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import {Link} from '@inertiajs/vue3';
import Header from '@/Components/Header/Header.vue';
import TitlePage from "@/Components/TitlePage.vue";
import Footer from "@/Components/Footer.vue";
import HeaderAuth from "@/Components/Header/HeaderAuth.vue";
import Breadcrumbs from "@/Components/Header/Parts/Breadcrumbs.vue";

const showingNavigationDropdown = ref(false);

const props = defineProps(['page', 'hideHistory', 'prZero', 'breadItems', 'pageTitle', 'styleClass', 'pxZero']);

</script>

<template>
    <main class="layout">
        <HeaderAuth/>

        <div  class="GuestLayout container layout__body mx-auto
        flex px-4 sm:px-0 flex-col items-center pt-6
        sm:pt-0 relative mb-[90px] sm:mb-[100px]"
             :class="page ? 'content' : ''"
        >
            <div class="Breadcrumbs sm:mx-8 mb-9" v-if="breadItems">
                <Breadcrumbs :items="breadItems"/>
            </div>
            <TitlePage v-if="$slots.header || pageTitle" :isAuthLayout="true">
                <slot name="header" v-if="$slots.header"/>
                <span v-else>{{pageTitle}}</span>
            </TitlePage>
            <slot name="info"/>
            <history-back v-if="!hideHistory"/>
            <div class="CardLayout w-full overflow-hidden shadow-md"
                 :class="styleClass +(hideHistory ? '' : ' mt-6') + (prZero ? ' !pr-0' : '') + (pxZero ? ' !px-0 !rounded' : '') ">
                <slot/>
            </div>
        </div>
        <Footer/>
    </main>
</template>
