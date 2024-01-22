<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, usePage} from '@inertiajs/vue3';
import Slider from "@/Components/Slider.vue";
import Breadcrumbs from "@/Components/Header/Parts/Breadcrumbs.vue";
import Callback from "@/Components/Popup/Callback.vue";
import {onMounted, ref} from "vue";

const page = usePage();
const petOpen = ref(false);

const items = [

    page.props.parent,
    {
        label: page.props.title
    },
]

onMounted(() => {
    if (page.props.petSuccess) petOpen.value = true;
})

</script>

<template>
    <Head title="Личный кабинет"/>
    <AuthenticatedLayout hide-history="true" page="true" :bread-items="items">
        <template #header>
            <h2 class="font-semibold text-xl text-white-200 leading-tight">Личный кабинет</h2>
        </template>

        <Slider/>
    </AuthenticatedLayout>
        <Teleport to="body">
            <Callback v-model="petOpen" :successPage="true"  :style-value="3"  />
        </Teleport>
</template>
