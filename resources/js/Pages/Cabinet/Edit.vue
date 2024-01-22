<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';
import GuestInfo from "@/Components/GuestInfo.vue";

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>
    <Head title="Смена пароля" />

    <AuthenticatedLayout styleClass="max-w-md">
        <template #info>
            <GuestInfo >
                Смена пароля
            </GuestInfo>
        </template>
        <UpdatePasswordForm class="w-full " />
<!--                <div class="p-8 bg-white shadow rounded-3xl">-->
<!--                    <UpdateProfileInformationForm-->
<!--                        :must-verify-email="mustVerifyEmail"-->
<!--                        :status="status"-->
<!--                        class="max-w-xl"-->
<!--                    />-->
<!--                </div>-->





<!--                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">-->
<!--                    <DeleteUserForm class="max-w-xl" />-->
<!--                </div>-->
    </AuthenticatedLayout>
</template>
