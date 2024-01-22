<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, useForm, Link} from '@inertiajs/vue3';
import GuestInfo from "@/Components/GuestInfo.vue";
import {onMounted, ref} from "vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

const props = defineProps({
    status: {
        type: String,
    },
    isFailed: {
        type: Boolean,
    },
    message: {
        type: Object,
    },
    error: {
        type: Object,
    }
});

const form = useForm({
    code: '',
});


const submit = () => {
    form.post(route('verification.verify-mobile'));
};
</script>

<template>
    <GuestLayout>
        <Head title="Подтверждение SMS"/>
        <template #info>
            <GuestInfo>
                Введите код из SMS
            </GuestInfo>
        </template>

        <div v-if="error || message" class="mb-4 font-medium text-sm text-center">
            <p :class="error ? 'text-red-600':'text-green-600'">{{message ?? error}}</p>
            <a :href="route('dashboard')" v-show="message" class="btn btn-primary inline-flex items-center justify-center px-10 py-2 border border-transparent font-bold uppercase tracking-widest transition ease-in-out duration-150 mt-5"
            >Перейти</a>
        </div>

        <form @submit.prevent="submit" :hidden="message">
            <div>

                <TextInput
                    id="code"
                    type="number"
                    class="mt-1 block w-full"
                    v-model="form.code"
                    required
                    autocomplete="username"
                    placeholder="Введите код"
                />

                <InputError class="mt-2" :message="form.errors.code"/>
            </div>
            <div class="mt-4">
                <PrimaryButton class="w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Зарегистрироваться
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
