<script setup>

import {defineProps} from 'vue';
import EyeOn from '@/assets/svg/EyeOn.svg'
import EyeOff from '@/assets/svg/EyeOff.svg'

const props = defineProps({
    shower: {
        type: Boolean,
    }
})

</script>

<template>
    <EyeOff v-if="shower" />
    <EyeOn v-else/>
</template>

<style scoped>

</style>
