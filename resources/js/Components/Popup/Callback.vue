<script setup>
import DogImage from '@/../images/dog.png'
import HorizontalLine from '@/assets/svg/HorizontalLine.svg';
import {ref, watchEffect, onMounted, reactive, watch} from "vue";
import FormInline from "@/Components/FormInline.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import NavLink from "@/Components/NavLink.vue";

const props = defineProps({
    modelValue: false,
    styleValue: {
        required: false,
        default: 0,
    },
    successPage: {
        type: Boolean,
        required: false,
        default: false,
    },
})

const successPage = ref(props.successPage);
const templatePhrases = ref([
    [
        'Введите свои данные',
        'Оставьте свои данные и наш администратор свяжется с вами для уточнения всех деталей записи в ближайшее время',
    ],
    [
        'Ваш запрос принят!',
        'Наш администратор вскоре свяжется с вами для уточнения деталей'
    ],
    [
        'Вы сменили пароль',
        ''
    ],
    [
        'ПИТОМЕЦ ДОБАВЛЕН',
        'Теперь Вы можете записать питомца на приём и просматривать историю посещений'
    ]
])
const emit = defineEmits(["update:modelValue", "update:successPage"]);
const popup = ref();
watchEffect(() => {
    if (props.modelValue) focusAtPopup();
    if (props.successPage) successPage.value = true;
});

watch(
    () => props.modelValue,
    () => {
        if (props.modelValue) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = null;
        }
    }
);

function closePopup() {
    successPage.value = false;
    emit("update:modelValue", false);
}
function focusAtPopup() {
    setTimeout(() => {
        if (popup.value) popup.value.focus();
    }, 100);
}
onMounted(() => {
    if (props.modelValue) focusAtPopup();
    if (props.successPage) successPage.value = true;
});
</script>

<template>
    <Transition leave-active-class="duration-200"
                enter-from-class="opacity-0"
                enter-to-class="opacity-100">
        <Transition
            enter-active-class="ease-out duration-300"
            enter-from-class="opacity-0"
            enter-to-class="opacity-100"
            leave-active-class="ease-in duration-200"
            leave-from-class="opacity-100"
            leave-to-class="opacity-0">
        <div v-if="props.modelValue" class="ui-popup-block transform transition-all overflow-y-scroll" @mousedown="closePopup">
            <div @mousedown.stop @keydown.esc="closePopup"
                 class="ui-popup mx-4 sm:max-w-md md:max-w-lg lg:max-w-md sm:w-full"
                 ref="popup"
                 tabindex="0">
                <button @click="closePopup" class="ui-popup-close">×</button>
                <div class="pp-content" v-if="successPage === false">
                    <div class="pp-decoration hidden sm:!flex">
                        <HorizontalLine class="h-[510px] lg:h-[550px]"/>
                    </div>
                    <div class="pp-form w-full lg:w-4/5 flex flex-col gap-5">
                        <h1 class="text-bold text-2xl md:text-4xl uppercase">{{ templatePhrases[props.styleValue][0] }}</h1>
                        <p class="text-sm">{{ templatePhrases[props.styleValue][1] }}</p>
                        <FormInline api-end="/api/thanks" class="w-full" clear-margins="true" txt-msg="true"
                                    show-oferta="true" @isSuccess="() => {successPage = true; styleValue = 1;}"
                                    button-name="Записаться на приём"/>
                    </div>
                </div>
                <div class="pp-content" v-else>
                    <div class="pp-decoration hidden sm:!flex">
                        <HorizontalLine class="h-[510px] lg:h-[500px]"/>
                    </div>
                    <div class="pp-form w-full lg:w-3/4 flex flex-col gap-5">
                        <h1 class="text-bold text-2xl md:text-4xl uppercase">
                            {{ templatePhrases[props.styleValue][0]  }}</h1>
                        <p class="text-sm">
                            {{ templatePhrases[props.styleValue][1] }} </p>
                        <SecondaryButton :href="route('dashboard')" class="justify-center lg:w-full">В личный кабинет
                        </SecondaryButton>
                        <img :src="DogImage" alt="DogImage"
                             class="rounded-md rounded-tr-[112px] w-full md:w-[100%] md:h-[50%] object-cover object-top">
                    </div>
                </div>

            </div>
        </div>
        </Transition>
    </Transition>
</template>



<style scoped>
.ui-popup-block {
    background-color: #000a;
    position: fixed;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10;
}

.ui-popup {
    position: relative;
    background: #212C53;
    padding: 32px 32px;
    border-radius: 15px;
    box-shadow: 0px 0px 8px -2px var(--color-black);
    outline: none;

}

.pp-content {
    display: flex;
    gap: 35px;
}

.ui-popup-close {
    position: absolute;
    border: none;
    color: white;
    top: 20px;
    right: 20px;
    width: 32px;
    height: 32px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    font-size: 54px;
    font-weight: 100;
    cursor: pointer;
    transition-duration: 300ms;
}

.ui-popup-close:hover {
    color: #808080FF;
}
</style>
