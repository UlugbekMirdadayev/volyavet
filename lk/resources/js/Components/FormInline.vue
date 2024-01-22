<script setup>
import less from 'less';
import {getCsrfToken} from "@/utils/methods.js";
import TextInput from "@/Components/TextInput.vue";
import {useForm, Link, usePage} from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import AreaText from "@/Components/AreaText.vue";
import {onMounted, defineEmits, ref} from "vue";
import SecondaryStyle_exp from "@/Shared/stylesExp.js";


const SecondaryStyle = SecondaryStyle_exp


const props = defineProps(['hasTitle', 'apiEnd', 'buttonName', 'clearMargins', 'txtMsg', 'showOferta'])
const emit = defineEmits(['isSuccess']);

const $page = usePage();
const currentBranch = $page.props.currentBranch;
const branches = $page.props.branches;

const actionDefault = '/api/thanks';

const form = useForm({
    name: '',
    phone: '',
    mobile_number: '',
    message: '',
    city: currentBranch.id,
});

const errorsp = ref({
    name: false,
    phone: false,
});

const checkerErrors = () => {
    if (form.name.length <= 3 && form.phone.length <= 15) {
        errorsp.value.name = true;
        errorsp.value.phone = true;
        return true;
    }
    if (form.name.length <= 3) {
        errorsp.value.name = true;
        return true;
    } else if(form.name.length >= 3) {
        errorsp.value.name = false;
    }
    if (form.phone.length <= 15) {
        errorsp.value.phone = true;
        return true;
    } else if(form.phone.length >= 15) {
        errorsp.value.phone = false;
    }
}

const onSubmit = () => {
    if (checkerErrors() === true) return;
    axios.post(props.apiEnd ?? actionDefault, {
        ...form.data()
    }).then((e) => {
        if (e.data.status === 'success') {
            form.reset()
            emit('isSuccess', true)
        }
    })
}

</script>

<template>
    <form @submit.prevent="onSubmit" class="flex flex-col " :class="clearMargins ? 'gap-4' : 'md:px-5 gap-2'"
          method="post">
        <input type="hidden" name="_token" :value="getCsrfToken()">
        <h4 class="contactTitleForm" v-show="hasTitle">закажите звонок:</h4>
        <TextInput secondary type="text" placeholder="Ваше имя" required v-model="form.name"
                   :class="errorsp.name ? 'border-red-600' : ''" name="name"/>
        <TextInput secondary :phone="true" type="tel" placeholder="Телефон" required maxlength="17"
                   :class="errorsp.phone ? 'border-red-600' : ''" v-model="form.phone" name="phone"/>
        <select :class="SecondaryStyle" v-model="form.city">
            <option style="background-color: #212C53;" v-for="branch in branches" v-bind:value="branch.id">{{ branch.title }}</option>
        </select>
        <AreaText v-if="txtMsg" v-model="form.message"/>
        <SecondaryButton class="justify-center" type="submit">{{ buttonName ?? "заказать звонок" }}</SecondaryButton>
        <div v-if="showOferta" class="md:pt-2.5 text-sm md:text bot text-start no-underline text-[#bcced0]">Нажимая на
            кнопку "<Link :href="route('policy')" class="underline">Записаться на приём</Link>", Вы соглашаетесь с <Link :href="route('oferta')" class="underline">публичным договором</Link></div>
    </form>
</template>

<style scoped lang="less">
.contactTitleForm {
    @media (min-width: 768px) {
        font-size: 20px;
        line-height: 130%;
        margin-bottom: 10px;
    }
    font-weight: 700;
    font-size: 14px;
    line-height: 130%;
    text-transform: uppercase;
    color: #f8f8f8;
    margin-bottom: 15px;
}
</style>
