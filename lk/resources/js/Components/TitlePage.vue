<script setup>
import CircleDot from '@/assets/svg/CircleDot.svg';

const props = defineProps(['isAuthLayout']);

</script>

<template>
<div class="TitlePage" :class="isAuthLayout ? 'AuthPage' : ''">
    <CircleDot/><h1><slot/></h1>
</div>
</template>

<style scoped>
.TitlePage {
    padding-bottom: 50px;
}
</style>
