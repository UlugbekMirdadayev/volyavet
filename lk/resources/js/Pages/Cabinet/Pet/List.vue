<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {getDate, getDogYears} from "@/utils/methods.js";
import less from 'less';
const props = defineProps(['pets']);

</script>
<template>
    <AuthenticatedLayout hide-history="true" prZero="true">
        <template #header>
            Питомцы
        </template>
        <div class="petTitle" v-show="pets.length >= 2">Кол-во питомцев - {{pets.length}}</div>
        <div class="pets flex flex-row gap-2 overflow-auto">
            <div class="card petCard mt-4 p-5 max-w-[250px] bg-indigo-900 text-white rounded-xl" v-for="pet in pets">
                <div class="info">Тип - {{pet.type}}</div>
                <div class="info petBreed">Порода - {{pet.breed}}</div>
                <div class="info">Кличка - {{pet.nickname}}</div>
                <div class="info">Пол - {{pet.sex}}</div>
                <div class="info">Дата рождения - {{getDate(pet.dateBirth)}}</div>
                <div class="info">Возраст - {{getDogYears(pet.dateBirth)}}</div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped lang="less">

.pets {
    padding-bottom: 5px;
    .card {
        &.petCard {
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            min-height: 250px;
            width: 450px;
            border-radius: 1rem;
            background: #3D4C87;
            padding: 1.5rem;
            text-wrap: nowrap;
            color: #fff;
            .info.petBreed {
                white-space: normal;
            }
        }
    }
}

</style>
