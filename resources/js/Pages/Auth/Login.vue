<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import GuestInfo from "@/Components/GuestInfo.vue";
import RegOrAuth from "@/Components/RegOrAuth.vue";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    phone: '',
    mobile_number: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.mobile_number = form.phone
        .replaceAll('+', '')
        .replaceAll(' ', '')
        .replaceAll('-', '');

    form.post(route('login'), {
        onFinish: () => form.reset('password'),
        onSuccess: () => window.location.href = '/dashboard',
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Авторизация"/>
        <template #info>
            <GuestInfo>
                Войти или зарегистрироваться
                <template #description>
                    Для входа в личный кабинет, просмотра медицинской карты, результатов исследований и записи на прием,
                    необходима авторизация
                </template>
            </GuestInfo>
        </template>
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
        <RegOrAuth/>
        <form @submit.prevent="submit">
            <div>
                <TextInput
                    id="phone"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.phone"
                    required
                    :class="form.errors.mobile_number ? 'border-red-500' : ''"
                    autocomplete="phone"
                    placeholder="+7 999 999-99-99"
                    :phone=true
                />

                <InputError class="mt-2" :message="form.errors.mobile_number"/>
            </div>
            <div class="mt-3">
                <TextInput
                    :eyeShow="true"
                    id="password"
                    type="password"
                    v-model="form.password"
                    :class="form.errors.password ? 'border-red-500' : 'mt-1 block w-full'"
                    required
                    autocomplete="current-password"
                    placeholder="Пароль"
                />
                <InputError class="mt-2" :message="form.errors.password"/>
            </div>
            <div class="flex flex-row justify-between mt-4">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember"/>
                    <span class="ml-2 text-[15px] text-black">Запомнить меня</span>
                </label>
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="text-[15px] text-[#3D4D89] hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Забыли пароль?
                </Link>
            </div>

            <div class="mt-4 w-full">
                <PrimaryButton class="w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Войти
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
