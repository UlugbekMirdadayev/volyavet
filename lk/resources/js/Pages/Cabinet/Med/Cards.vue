<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, usePage} from "@inertiajs/vue3";
import Table from "@/Components/Table.vue";
import {ref} from "vue";

const page = usePage();

const items = [
    page.props?.parent,
    {
        label: page.props?.title
    },
]

</script>

<template>
    <AuthenticatedLayout hide-history="true" prZero="true" px-zero="true" page="true" :bread-items="items">
        <Head title="Мед карта"/>
        <template #header>
            {{ page.props?.title }}
        </template>
        <div class="bg-white sm:p-8 rounded-[20px] overflow-hidden">
            <Table :headers="['Питомец', 'Дата', 'Цель обращения (Услуга)', 'Доктор', 'Подробнее']" :rows="$page.props.cards"
                   :services="false"/>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
