<script setup>
import less from 'less';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, usePage} from "@inertiajs/vue3";
import {onMounted, ref} from "vue";
import {getDogYears, getFullname} from "@/utils/methods.js";

const page = usePage();
const items = [
    {
        label: "Личный кабинет",
        url: route('dashboard')
    },
    page.props.parent,
    {
        label: page.props.title
    },
]

const pdBr = ref(false);

const medcard = ref(page.props.medcard)
const onResize = () => {
    if (window.innerWidth <= 570) {
        pdBr.value = true;
    } else {
        pdBr.value = false;
    }
}

onMounted(() => {
    window.addEventListener('resize', onResize);
})
</script>

<template>
    <AuthenticatedLayout hide-history="true" prZero="true" px-zero="true" page="true" :bread-items="items">
        <Head title="Приём"/>
        <template #header>
            {{ page.props?.title || '' }}
        </template>
        <div class="bg-white p-6 sm:p-10 rounded-[20px] overflow-hidden reception">
            <div class="flex gap-7 sm:gap-0 flex-col ">
                <div class="first__group flex flex-col sm:flex-row sm:justify-between">
                    <div class="header__info">

                        <p>ФИО владельца: <span><br v-if="pdBr">{{
                                getFullname({
                                    last_name: medcard.main.last_name,
                                    name: medcard.main.first_name,
                                    middle_name: medcard.main.middle_name
                                })
                            }}</span></p>
                        <p>Лечащий ветеринарный врач: <span><br v-if="pdBr">{{
                                getFullname({
                                    last_name: medcard.main.doctor_last_name,
                                    name: medcard.main.doctor_first_name,
                                    middle_name: medcard.main.doctor_middle_name
                                })
                            }} </span></p>
                        <p>Дата обращения: <span>{{ medcard.date_create.replaceAll('-', '.') }}</span></p>
                    </div>
                    <div class="header__info">
                        <p>Кличка питомца: <span>{{ medcard.patient.alias }}</span></p>
                        <p>Тип: <span>{{ medcard.main.pet_title }}</span></p>
                        <p>Порода: <span>{{ medcard.main.breed }}</span></p>
                        <p>Возраст: <span>{{ getDogYears(medcard.patient.birthday) }}</span></p>
                    </div>
                </div>
                <div class="header__info healthInfo pt-3">
                    <p class="text-lg">Описание лечения</p>
                    <span>Причины обращения к врачу: <span>{{medcard.main.admission_type_title}}</span></span>
                    <div v-html="medcard.description"/>
                </div>
                <div class="header__info pt-3">
                    <p class="text-lg">Рекомендации и назначения</p>
                    <div v-html="medcard?.recomendation"/>
                </div>
                <div class="header__info pt-3">
                    <p class="text-lg">Диагноз</p>
                    <div v-html="medcard.diagnos_text"/>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<style lang="less">
.header__info {
    &.healthInfo {
        div {
            div {
                a {
                    color: #2c3967 !important;
                    text-decoration:underline;
                }
            }
        }
    }
}

</style>
<style lang="less">
.header__info {
@apply flex flex-col gap-3;
}

.reception {
    p {

        color: black;
        font-weight: 600;

        span {
            font-weight: 400;
        }
    }


}
.healthInfo {
    div {
        a {
            color: #2c3967;
            font-weight: 500;
            text-decoration:underline;
        }
    }
    p {
        a {
            color: #2c3967;
            font-weight: 500;
            text-decoration:underline;
        }
    }
}

</style>
