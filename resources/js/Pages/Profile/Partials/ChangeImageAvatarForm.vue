<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-white">
                Foto de Perfil
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-200">
                Atualize sua foto de perfil
            </p>
        </header>

        <form class="mt-6 space-y-6" @submit.prevent="submit()">
            <div>
                <label
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    for="user_avatar"
                    >Foto de Perfil</label
                >
                <input
                    @input="handleFileInput"
                    accept="image/jpeg, image/png, image/jpg"
                    class="block w-full text-sm text-gray-900 border border-zinc-300 rounded-lg cursor-pointer bg-zinc-50 dark:text-gray-400 focus:outline-none dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400"
                    aria-describedby="user_avatar_help"
                    id="user_avatar"
                    type="file"
                />
            </div>

            <button
                    type="submit"
                    
                    class="text-white inline-flex items-center bg-violet-700 hover:bg-violet-800 focus:ring-4 focus:outline-none focus:ring-violet-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-violet-600 dark:hover:bg-violet-700 dark:focus:ring-violet-800"
                >
                    Salvar
                </button>
        </form>
    </section>
</template>

<script setup lang="ts">
import { Head, Link } from "@inertiajs/vue3";
import { reactive } from "vue";
import { router } from "@inertiajs/vue3";

const form = reactive<{ avatar: null | File; _method: string }>({
    _method: "put",
    avatar: null,
});

function handleFileInput(event: Event) {
    const target = event.target as HTMLInputElement;
    if (target.files != null && target.files.length > 0) {
        form.avatar = target.files[0];
    }
}
const submit = () => {
    router.post("/profile/change-avatar-image", form);
};
</script>

<style scoped></style>
