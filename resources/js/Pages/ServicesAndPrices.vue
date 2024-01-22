<script setup>

import GuestLayout from "@/Layouts/GuestLayout.vue";
import {Head} from "@inertiajs/vue3";
import {onMounted, ref} from "vue";
import Table from "@/Components/Table.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import MainLayout from "@/Layouts/MainLayout.vue";
import Callback from "@/Components/Popup/Callback.vue";


const props = defineProps(['categories', 'first_cat'])

const imageSrc = ref('')
onMounted(() => {
    const image = new Image(); // Создаем новый экземпляр изображения
    image.src = 'https://volyavet.ru/img/servicesAndPrice.jpg'; // Устанавливаем src изображения

    image.addEventListener('load', () => {
        imageSrc.value = image.src; // Обновляем значение рефа на src загруженной картинки
    });

    // Кэшируем изображение
    if (!image.complete) {
        image.onload = () => {
            URL.revokeObjectURL(image.src);
        };
    }
});

const sTitle = ref('');
const sDesc = ref('');
const sTable = ref({});
const activeCat = ref(0);

activeCat.value = props.first_cat.first.id
sTitle.value = props.first_cat.first.title;
sDesc.value = props.first_cat.first.description;
sTable.value = props.first_cat.services;



const changeCategory = ($id) => {
  axios.get('/category/'+$id).then(data => {
      const fdata = data.data.data;
      console.log(fdata)
      activeCat.value = fdata.category.id;
      sTitle.value = fdata.category.title;
      sDesc.value = fdata.category.description;
      sTable.value = fdata.category.services;
  })
};

const openModal = ref(false);


</script>

<template>
<MainLayout :page="true" page-title="Услуги и Цены" hide-history="true" px-zero="true">
    <Head title="Услуги и цены"/>

    <section>
        <div class="container">
            <div class="flex flex-col xl:flex-row">
                <div class="xl:px-6 grid grid-cols-2 md:grid-cols-3 xl:flex xl:flex-col gap-2 xl:gap-4">
                    <button class="btn btn-service xl:w-[280px]" v-for="cat in categories" :id="cat.id" @click="changeCategory(cat.id)" :class="cat.id === activeCat ? 'active' : ''">{{ cat.title }}</button>
                </div>
                <div class="xl:px-6 mt-[30px] xl:mt-0 border-t border-t-[#596281] xl:border-t-0 xl:border-l xl:border-l-[#596281]">
                    <h3 class="servicesAndPrice__title xl:!text-[25px] mb-[30px] mt-[30px] xl:mt-0">{{ sTitle }}</h3>
                    <p class="text-white md:leading-[16px] md:text-[14px] text-[16px] leading-[19px]">{{sDesc}}</p>
                    <img :src="imageSrc" alt="Services" class="image servicesAndPrice__image my-5 rounded-[20px] w-full">
                    <Table :headers="['Название услуги', 'Цена, ₽']" :rows="sTable" :services="true"/>

                    <div class="flex flex-col sm:flex-row mt-[50px] items-center gap-2.5">
                        <p class="text-[#c6d4d3] w-full md:w-[260px] text-[16px] md:text-sm order-2 sm:order-1">
                            Стоимость услуг на сайте не является публичной офертой и может
                            отличаться от цен прейскуранта
                        </p>
                        <SecondaryButton @click="openModal = true" class="w-full justify-center sm:w-auto order-1">Записаться на приём</SecondaryButton>
                    </div>
                </div>
            </div>
        </div>
    </section>
</MainLayout>
    <Teleport to="body">
        <Callback v-model="openModal"/>
    </Teleport>
</template>

<style scoped>
.servicesAndPrice__title {
    font-size: 18px;
    font-weight: 700;
    line-height: 103.36%;
    text-transform: uppercase;
    color: #f8f8f8;
}
</style>
