<script setup>

import HistoryBack from "@/Components/HistoryBack.vue";
import Footer from "@/Components/Footer.vue";
import Header from "@/Components/Header/Header.vue";
import TitlePage from "@/Components/TitlePage.vue";

const props = defineProps(['hideHistory', 'welcomePage', 'page', 'pageTitle', 'pxZero'])

</script>

<template>
    <main class="layout">
        <Header/>
        <div class="GuestLayout container layout__body mx-auto
        flex px-4 sm:px-0 flex-col items-center pt-6 sm:justify-center
        sm:pt-0 sm:mt-10 relative mb-[90px] sm:mb-[100px]"
             :class="page ? 'content' : ''"
        >
            <TitlePage v-if="page">{{ props.pageTitle }}</TitlePage>
            <history-back v-if="!hideHistory"/>
            <slot name="info"/>
            <div class="CardLayout w-full mt-6 overflow-hidden
            shadow-md"
                 :class="(page ? '' : 'sm:max-w-md') + (hideHistory ? '' : ' mt-6') + (pxZero ? ' !px-0 !rounded' : '')"
            >
                <slot/>
            </div>
        </div>
        <Footer/>
    </main>
</template>
