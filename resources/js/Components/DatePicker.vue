<script setup>

import TextInput from "@/Components/TextInput.vue";
import {defineEmits} from "vue";

const props = defineProps({
    modelValue: {
        type: String,
        required: true,
    },
})
const emit = defineEmits(['update:modelValue']);
</script>

<template>
    <div class="relative">
        <VDatePicker  @input="$emit('update:modelValue', $event.target.value)" v-bind="props">
            <template #default="{ inputValue, inputEvents }">
                <TextInput
                    :value="inputValue"
                    v-on="inputEvents"
                    class="mt-1 block w-full" :model-value="inputValue"/>
            </template>
        </VDatePicker>
    </div>
</template>

<style scoped>

</style>
