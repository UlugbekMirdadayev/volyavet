<script setup>
import less from 'less';
import {ref, watch, onMounted, defineEmits} from "vue";

const props = defineProps({
    modelValue: {
        type: String,
        required: true,
    },
    placeholder: {
        type: String,
    },
    class: {
        type: String,
    },
    id: {
        type: String,
    },
    options: {
        type: Array,
        required: true
    },
    petBreed: Boolean,
    required: {}
});

const styles = ref('ui-select border-[#D4D4D4] leading-[140%] ' +
    'placeholder-[#747474] py-3.5 px-3 focus:border-indigo-500 ' +
    'hover:border-indigo-500 transition focus:ring-indigo-500 ' +
    'text-sm rounded-[12px] shadow-sm');

</script>

<template>
    <select :value="modelValue"
            @change="$emit('update:modelValue', $event.target.value)"
            :class="props.class +' '+ styles"
            v-bind="props"
            :style="modelValue ? 'color:black;' : ''"
    >
        <option disabled value="" selected>{{ placeholder ?? "Пожалуйста выберите один" }}</option>
        <option v-for="(item, index) in options" :key="item.id" :value="item.value ?? index" v-if="!petBreed">{{ item.label ?? item }}</option>
        <option v-for="option in options" :key="option.id" :value="option.id" v-else>{{ option.title }}</option>
    </select>
</template>

<style scoped lang="less">
.ui-select {
    color: #747474;
}
</style>
