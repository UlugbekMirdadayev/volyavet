<script setup>
import { Head } from '@inertiajs/vue3';
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Slider from "@/Components/Slider.vue";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});
let pageTitle = "Новости и Акции";

</script>

<template>
    <Head title="Главная страница"/>
    <GuestLayout :page="true" :hide-history="true" :pageTitle="pageTitle">
        <Slider/>
    </GuestLayout>

</template>

