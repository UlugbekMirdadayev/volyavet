<script setup>
import {Link} from '@inertiajs/vue3'
import LeftArrow from "@/assets/svg/ArrowLeft.svg";
const previousUrl = () => history.back();
</script>

<template>
    <button  @click="previousUrl"
          class="sm:absolute sm:left-0 sm:top-0 mr-auto sm:mr-0 mb-7"><span
        class="text-[#D1FDFF] text-[16px] md:text-lg items-center opacity-[0.5] leading-[140%] flex flex-row gap-2"><LeftArrow/>Назад</span>
    </button>
</template>

<style scoped>

</style>
