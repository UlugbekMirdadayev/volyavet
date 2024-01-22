<script setup>
import less from 'less';
import {Head} from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";
</script>

<template>
    <MainLayout :page="true" :page-title="$page.props.page.h1 ?? 'Политика конфиденциальности'" hide-history="true" px-zero="true">
        <Head :title="$page.props.page.title ?? 'Оферта'"/>

        <section>
            <div class="container" v-html="$page.props.content"/>
        </section>
    </MainLayout>

</template>


<style>

.offertaSection__title {
    margin: 21px 0;
    display: block;
    text-transform: uppercase;
    font-weight: 700;
    padding-right: 0.375rem;
}
</style>
