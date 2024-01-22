<script setup>

import {ref} from "vue";

const props = defineProps(['customHolder', 'scndy']);

const SecondaryStyle = 'border-[#D4D4D4] leading-[140%] ' +
    'placeholder-[#747474] py-3.5 px-3 focus:border-indigo-500 ' +
    'hover:border-indigo-500 min-h-[120px] max-h-[150px] transition focus:ring-indigo-500 ' +
    'text-sm rounded-[12px] shadow-sm';


const styles = ref(props.scndy !== true ? "scndry text-white rounded-[5px] px-5 py-[15px]" +
    " text-[15px] leading-[135%] text-[#c6d4d3] bgSndry border border-[#d1fdff]" +
    " hover:border-[#d1fdff] transition focus:ring-indigo-500 " +
    " outline-none focus:border-[#d1fdff]" : SecondaryStyle);

</script>

<template>
    <textarea v-bind="props"
              :class="styles"
              @input="$emit('update:modelValue', $event.target.value)"
              :placeholder="customHolder ?? 'Сообщение для администратора'"
    ></textarea>
</template>

<style scoped>
.scndry {
    min-height: 120px;
    max-height: 150px;
}
</style>
