<script setup>

import {Head, usePage} from "@inertiajs/vue3";
import ContactInline from "@/Components/Contacts/ContactInline.vue";
import FormInline from "@/Components/FormInline.vue";
import YandexMap from "@/Components/Contacts/YandexMap.vue";
import MainLayout from "@/Layouts/MainLayout.vue";
import Callback from "@/Components/Popup/Callback.vue";
import {ref} from "vue";
const page = usePage();

const items = [
        page.props.parent,
    {
        label: page.props.title
    },

]

const isOpen = ref(false);

</script>

<template>

    <MainLayout :page="true" page-title="Контакты" hide-history="true" px-zero="true" :bread-items="items">
        <Head :title="$page.props.title"/>
        <section>
            <div class="container">
                <ContactInline/>
                <div class="flex flex-col sm:flex-row">
                    <FormInline hasTitle="true" class="md:w-1/2 md:justify-center 3xl:w-1/4" @isSuccess="isOpen = true"/>
                    <div class="Map sm:mt-0 mt-5">
                        <YandexMap/>
                    </div>
                </div>
            </div>
        </section>

    </MainLayout>
    <Teleport to="body">
        <Callback v-model="isOpen" :successPage="isOpen"  :style-value="1"  />
    </Teleport>
</template>

<style scoped lang="less">
.Map {

    @media (min-width: 768px)  {
        width: 50%;
    }
    @media (min-width: 1440px)  {
        width: 75%;
        padding: 0 23px;
    }
    width: 100%;
}
</style>
