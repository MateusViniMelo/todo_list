<script setup lang="ts">

import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';
import AuthLayout from '@/Layouts/AuthLayout.vue';
import ChangeImageAvatarForm from "@/Pages/Profile/Partials/ChangeImageAvatarForm.vue"
defineProps<{
    mustVerifyEmail?: boolean;
    status?: string;
}>();
</script>

<template>
    <Head title="Perfil" />

    <AuthLayout>
       

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                 <div class="p-4 sm:p-8 bg-white dark:bg-zinc-800 shadow sm:rounded-lg">
                    <ChangeImageAvatarForm/>
                </div>
                <div class="p-4 sm:p-8 bg-white dark:bg-zinc-800 shadow sm:rounded-lg">
                    <UpdateProfileInformationForm
                        :must-verify-email="mustVerifyEmail"
                        :status="status"
                        class="max-w-xl"
                    />
                </div>

                <div class="p-4 sm:p-8 bg-white dark:bg-zinc-800 shadow sm:rounded-lg">
                    <UpdatePasswordForm class="max-w-xl" />
                </div>

                <div class="p-4 sm:p-8 bg-white dark:bg-zinc-800 shadow sm:rounded-lg">
                    <DeleteUserForm class="max-w-xl" />
                </div>
            </div>
        </div>
    </AuthLayout>
</template>
