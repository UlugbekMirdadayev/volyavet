<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, useForm} from '@inertiajs/vue3';
import GuestInfo from "@/Components/GuestInfo.vue";
import {ref} from "vue";

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
});

const success = ref(false);

const phEmail = ref(null);
if (window.innerWidth <= 768) {
    phEmail.value = "E-mail при регистрации";
} else {
    phEmail.value = "E-mail, указанный при регистрации";
}

const submit = () => {
    form.post(route('password.email'));
    success.value = true
};
</script>

<template>
    <GuestLayout>
        <Head title="Сброс пароля"/>
        <template #info>
            <GuestInfo>
                Сброс пароля
            </GuestInfo>
        </template>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
        <form @submit.prevent="submit" v-if="!success">
            <div>

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autofocus
                    :class="form.errors.email ? 'border-red-500' : ''"
                    autocomplete="username"
                    :placeholder="phEmail"
                />

                <InputError class="mt-2" :message="form.errors.email"/>
            </div>
            <div class="mt-3">
                <span class="text-[12px] sm:text-sm text-[#747474] sm:ml-3">На этот адрес придёт ссылка для сброса пароля</span>
            </div>
            <div class="mt-4">
                <PrimaryButton class="w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Получить ссылку
                </PrimaryButton>
            </div>
        </form>
        <div v-else>
            <div class="mb-6 sm:px-2">
                <span class="text-[14px] sm:text-sm text-[#272727]" v-if="!form.errors.email">
                        На {{form.email}} отправлено письмо со ссылкой для сброса пароля.
                    <br>
                    <br>
                    Если письмо не пришло, проверьте папку «Спам» или нажмите кнопку ниже.
                </span>
                <span v-else class="text-red-700">
                    {{form.errors.email}}
                </span>
            </div>
            <PrimaryButton @click.prevent="submit" class="w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                ОТПРАВИТЬ ПОВТОРНО
            </PrimaryButton>
        </div>
    </GuestLayout>
</template>
