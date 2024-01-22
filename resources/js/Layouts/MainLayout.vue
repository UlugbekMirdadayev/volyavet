<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import {usePage} from "@inertiajs/vue3";

const props = defineProps(['page', 'hideHistory', 'prZero', 'breadItems', 'pageTitle', 'pxZero']);

const pp = usePage();

</script>

<template>
    <GuestLayout :page="page" :page-title="pageTitle"  :hide-history="hideHistory" :px-zero="pxZero" v-if="!pp.props.auth.user">
        <slot/>
    </GuestLayout>
    <AuthenticatedLayout :page="page" :page-title="pageTitle"  :bread-items="breadItems" :hide-history="hideHistory" :px-zero="pxZero" v-else>
        <slot/>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
