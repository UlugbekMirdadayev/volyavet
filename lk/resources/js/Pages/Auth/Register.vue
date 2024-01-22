<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import RegOrAuth from "@/Components/RegOrAuth.vue";
import GuestInfo from "@/Components/GuestInfo.vue";
import Checkbox from "@/Components/Checkbox.vue";
import SelectInput from "@/Components/SelectInput.vue";
import {onMounted, ref} from "vue";
import DatePicker from "@/Components/DatePicker.vue";

const form = useForm({
    last_name: '', // i
    name: '',
    middle_name: '',
    email: '',
    phone: '',
    mobile_number: '',
    password: '',
    password_confirmation: '',
    policy: false,
    accept_mail: false,
    typeAnimal: undefined, // вид животного подтягивать с CRM || SELECT // i
    petBreed: undefined, // i
    petNickname: '', // i
    sexAnimal: '', // Пол питомца || select // i
    dateBirthAnimal: undefined, // Пол питомца || select // i
});

const optionsAnimalType = ref();
const optionsAnimalBreed = ref();


const calendarColor = ref('blue');

// const optionsSexAnimal = ref();

const normalDate = onMounted((date) => {
    return new Date(date).toLocaleDateString();
});

const getBreed = () => {
    axios.get('/api/petType').then((resp) => {
        const data = resp.data
        if (data.success) {
            console.log(data)
            optionsAnimalType.value = data.data?.petType
        } else {
            console.warn('PET TYPE NOT WORKING!!!')
        }
    });
}

onMounted(() => {
   getBreed();
});

const changeBreed = ($id) => {
    const breed = optionsAnimalType.value[$id - 1];
    optionsAnimalBreed.value = breed.breeds
    form.reset('petBreed');
}

const submit = () => {
    // form.mobile_number = form.phone
    form.mobile_number = form.phone
        .replaceAll('+', '')
        .replaceAll(' ', '')
        .replaceAll('-', '');
    // console.log(form.mobile_number.length)
    // console.log(form.phone.length)
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
        onSuccess: () => window.location.href = '/dashboard'
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Регистрация"/>
        <template #info>
            <GuestInfo>
                Войти или зарегистрироваться
                <template #description>
                    Для входа в личный кабинет, просмотра медицинской карты, результатов исследований и записи на прием,
                    необходима авторизация
                </template>
            </GuestInfo>
        </template>
        <RegOrAuth/>
        <form @submit.prevent="submit">
            <div class="flex flex-col gap-2">
                <div>
                    <TextInput
                        id="telephone"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.phone"
                        :class="form.errors.mobile_number ? 'border-red-500' : ''"
                        required
                        autocomplete="name"
                        placeholder="Телефон*"
                        :phone=true
                    />

                    <InputError class="mt-2" :message="form.errors.mobile_number"/>
                </div>
                <div>
                    <TextInput
                        id="lastname"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.last_name"
                        :class="form.errors.last_name ? 'border-red-500' : ''"
                        required
                        autocomplete="name"
                        placeholder="Фамилия*"
                    />

                    <InputError class="mt-2" :message="form.errors.last_name"/>
                </div>

                <div>
                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        :class="form.errors.name ? 'border-red-500' : ''"
                        required
                        autocomplete="name"
                        placeholder="Имя"
                    />

                    <InputError class="mt-2" :message="form.errors.name"/>
                </div>

                <div>
                    <TextInput
                        id="middlename"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.middle_name"
                        :class="form.errors.middle_name ? 'border-red-500' : ''"
                        autocomplete="name"
                        placeholder="Отчество"
                    />

                    <InputError class="mt-2" :message="form.errors.middle_name"/>
                </div>
                <div>
                    <SelectInput
                        id="typeAnimal"
                        placeholder="Вид животного*"
                        required
                        :options="optionsAnimalType"
                        v-model="form.typeAnimal"
                        :class="form.errors.typeAnimal ? 'border-red-500' : ''"
                        :pet-breed="true"
                        class="w-full"
                        @change="changeBreed($event.target.value)"
                    />
                    <InputError class="mt-2" :message="form.errors.typeAnimal"/>
                </div>
                <div>
                    <SelectInput
                        id="petBreed"
                        class="mt-1 block w-full"
                        v-model="form.petBreed"
                        :class="form.errors.petBreed ? 'border-red-500' : ''"
                        required
                        :options="optionsAnimalBreed"
                        :pet-breed="true"
                        autocomplete="name"
                        placeholder="Порода питомца*"
                    />
                    <InputError class="mt-2" :message="form.errors.petBreed"/>
                </div>
                <div>
                    <TextInput
                        id="petNickname"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.petNickname"
                        :class="form.errors.petNickname ? 'border-red-500' : ''"
                        required
                        autocomplete="name"
                        placeholder="Кличка питомца*"
                    />

                    <InputError class="mt-2" :message="form.errors.petNickname"/>
                </div>
                <div>
                    <SelectInput
                        id="sexAnimal"
                        placeholder="Пол питомца*"
                        required
                        :options="$page.props.sex"
                        v-model="form.sexAnimal"
                        :class="form.errors.sexAnimal ? 'border-red-500' : ''"
                        class="w-full"
                    />
                    <InputError class="mt-2" :message="form.errors.sexAnimal"/>
                </div>
                <div>
                    <div class="relative">
                        <VDatePicker v-model="form.dateBirthAnimal" :color="calendarColor" is-dark="system">
                            <template #default="{ inputValue, inputEvents }">
                                <TextInput
                                    id="dateBirthAnimal"
                                    :value="inputValue"
                                    v-on="inputEvents"
                                    class="mt-1 block w-full"
                                    :model-value="inputValue"
                                    :class="form.errors.dateBirthAnimal ? 'border-red-500' : ''"
                                    placeholder="Дата рождения питомца*"
                                />
                            </template>
                        </VDatePicker>
                    </div>

                    <InputError class="mt-2" :message="form.errors.dateBirthAnimal"/>
                </div>

                <div>
                    <TextInput
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        :class="form.errors.email ? 'border-red-500' : ''"
                        required
                        autocomplete="name"
                        placeholder="E-mail*"
                    />

                    <InputError class="mt-2" :message="form.errors.email"/>
                </div>

                <div>
                    <TextInput
                        :eye-show="true"
                        id="password"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password"
                        required
                        :class="form.errors.password ? 'border-red-500' : ''"
                        autocomplete="new-password"
                        placeholder="Придумайте пароль*"
                    />

                    <InputError class="mt-2" :message="form.errors.password"/>
                </div>

                <div>
                    <TextInput
                        :eye-show="true"
                        id="password_confirmation"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password_confirmation"
                        :class="form.errors.password_confirmation ? 'border-red-500' : ''"
                        required
                        autocomplete="new-password"
                        placeholder="Повторите пароль*"
                    />

                    <InputError class="mt-2" :message="form.errors.password_confirmation"/>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-sm text-[#747474]">* - поля обязательны к заполенению</span>
                <label class="flex items-center mt-3">
                    <Checkbox name="policy" v-model:checked="form.policy" :class="form.errors.policy ? 'border-red-500' : ''"/>
                    <span class="ml-2 text-sm leading-[140%] text-black" :class="form.errors.policy ? 'text-red-500':''">Я принимаю «<Link :href="route('oferta')" class="termUse">Условия использования</Link>» и «<Link
                        :href="route('policy')" class="termUse" >Политику конфиденциальности</Link>»</span>
                </label>
                <label class="flex items-center mt-3">
                    <Checkbox name="accept_mail" v-model:checked="form.accept_mail"/>
                    <span class="ml-2 text-sm leading-[140%] text-black">Я принимаю  согласие на  получение рекламных новостей акций</span>
                </label>
            </div>
            <div class="flex items-center justify-end mt-4">

                <PrimaryButton class="w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Зарегистрироваться
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
