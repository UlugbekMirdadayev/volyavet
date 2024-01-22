<script setup>

import GuestInfo from "@/Components/GuestInfo.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, usePage} from "@inertiajs/vue3";
import {onMounted, ref} from "vue";

const page = usePage();

const items = [

    page.props.parent,
    {
        label: page.props.title
    },
]



</script>

<template>
    <AuthenticatedLayout hide-history="true" :page="true" :bread-items="items">
        <Head title="Записи на прием"/>
        <template #header>
            {{$page.props.title ?? "Записи на прием"}}
        </template>
        <h2 class="text-[#D1FDFF] text-center sm:text-start font-semibold text-2xl w-full">Внимание!  За две недели до вакцинации должна быть гельмитизация</h2>
        <div class="bg-white mt-6 p-6 sm:p-10 rounded-[20px] overflow-hidden h-full">
            <iframe id="recep" ref="recep" src="https://widgets.vetmanager.cloud/frame/1436" class="child w-full" height="600"/>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
#recep {
    border-top-right-radius: 180px;
}
</style>
