<script setup>
import {onMounted, ref, defineEmits} from 'vue';
import EyeOn from '@/assets/svg/EyeOn.svg';
import EyeOff from '@/assets/svg/EyeOff.svg';
import EyeShower from "@/Components/EyeShower.vue";

const props = defineProps({
    modelValue: {
        type: String,
        required: true,
    },
    phone: {
        type: Boolean,
    },
    eyeShow: {
        type: Boolean,
        default: false,
    },
    placeholder: {
        type: String,
    },
    autocomplete: {
        type: String,
    },
    class: {
        type: String,
    },
    type: {
        type: String,
    },
    id: {
        type: String,
    },
    secondary: {
        type: Boolean,
    },
    required: {}
});

const formattedPhone = ref('');

const regularPhone = /(\d{0,1})(\d{0,3})(\d{0,3})(\d{0,2})(\d{0,2})/;

// Функция форматирования номера телефона
const formatPhone = (e) => {
    const phone = e.target.value;
    if (props.phone) {
        const x = phone.replace(/[^0-9]/g, "").match(regularPhone); // +{7} {960} {069}-{37}-{53}
        if (!x[2] && x[1] !== '') {
            formattedPhone.value = x[1] === '7' ? '+' + x[1] : '+7 ' + x[1]
        } else {
            formattedPhone.value = !x[3] ? '+' + x[1] + x[2] : '+' + x[1] + ' ' + x[2] + ' ' + x[3] + (x[4] ? '-' + x[4] : '') + '-' + x[5]
        }
    }
    emit('update:modelValue', props.phone ? formattedPhone.value : e.target.value);
};
const validateNumber = (event) => {
    if (props.phone) {
        const charCode = String.fromCharCode(event.keyCode);
        if (!/[0-9]/.test(charCode)) {
            event.preventDefault();
        }
    }
};
// Определение эмитов
const emit = defineEmits(['update:modelValue']);
const input = ref(null);

const passwordVisible = ref(false);
const togglePasswordVisibility = () => {
    if (input.type === 'password') {
        input.type = 'text'
    } else {
        input.type = 'password'
    }
    passwordVisible.value = !passwordVisible.value;
};
const SecondaryStyle = "scndry text-white rounded-[5px] px-5 py-[15px]" +
    " text-[15px] leading-[135%] text-[#c6d4d3] bgSndry border border-[#d1fdff]" +
    " hover:border-[#d1fdff] transition focus:ring-indigo-500 " +
    " outline-none focus:border-[#d1fdff]"

const styles = ref(props.secondary !== true ? 'border-[#D4D4D4] leading-[140%] ' +
    'placeholder-[#747474] py-3.5 px-3 focus:border-indigo-500 ' +
    'hover:border-indigo-500 transition focus:ring-indigo-500 ' +
    'text-sm rounded-[12px] shadow-sm' : SecondaryStyle);



onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
    if (props.phone) {
        input.value.setAttribute('maxlength', 16);
    }
});

defineExpose({focus: () => input.value.focus()});

</script>

<template>
    <input v-if="!eyeShow"
           :class="props.class +' '+ styles"
           :value="modelValue"
           @input="formatPhone"
           @keypress="validateNumber"
           v-bind="props"
           ref="input"/>
    <div v-else class="relative border-0 px-0">
        <input
            id="inputPass"
            :class="props.class +' '+ styles"
            class="w-full"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            @keypress="validateNumber"
            :type="passwordVisible === true ? 'text' : 'password'"
            :placeholder="placeholder"
            required
            ref="input"/>
        <div class="eye_input absolute right-[15px] top-[15px]">
            <button type="button" @click="togglePasswordVisibility">
                <EyeShower :shower="!passwordVisible"/>
            </button>
        </div>
    </div>
</template>

<style lang="less">
.hidden { display:none;}

.scndry {

    &::placeholder {
        color: #f8f8f8;
    }
}

.bgSndry {
    background: rgba(198,212,211,.05);
    &:hover {
        background: rgba(198,212,211,.10);
    }
}
</style>

