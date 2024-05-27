<template>
    <div
        id="adicionar-tarefa-modal"
        tabindex="-1"
        aria-hidden="true"
        data-modal-backdrop="static"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
    >
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-zinc-800">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-zinc-600"
                >
                    <h3
                        class="text-lg font-semibold text-gray-900 dark:text-white"
                    >
                        Criar nova tarefa
                    </h3>
                    <button
                        type="button"
                        class="text-gray-400 bg-transparent hover:bg-zinc-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-zinc-600 dark:hover:text-white"
                        @click="closeModal('adicionar-tarefa-modal')"
                    >
                        <svg
                            class="w-3 h-3"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 14 14"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                            />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" @submit.prevent="submit()">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label
                                for="titulo"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Título
                                <span class="text-red-600 dark:text-red-500"
                                    >*</span
                                ></label
                            >
                            <input
                                type="text"
                                v-model="form.titulo"
                                id="titulo"
                                class="bg-zinc-50 border border-zinc-300 text-gray-900 text-sm rounded-lg focus:ring-violet-600 focus:border-primary-600 block w-full p-2.5 dark:bg-zinc-900 dark:border-zinc-900 dark:placeholder-gray-400 dark:text-white dark:focus:ring-violet-500 dark:focus:border-primary-500"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.titulo"
                            />
                        </div>
                        <div class="col-span-2">
                            <label
                                for="descricao"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Descrição</label
                            >
                            <textarea
                                id="descricao"
                                v-model="form.descricao"
                                rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-zinc-50 rounded-lg border border-zinc-300 focus:ring-violet-500 focus:border-violet-500 dark:bg-zinc-900 dark:border-zinc-900 dark:placeholder-gray-400 dark:text-white dark:focus:ring-violet-500 dark:focus:border-violet-500"
                            ></textarea>
                            <InputError
                                class="mt-2"
                                :message="form.errors.descricao"
                            />
                        </div>
                        <div class="col-span-2">
                            <label
                                for="dataTarefa"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Data
                                <span class="text-red-600 dark:text-red-500"
                                    >*</span
                                ></label
                            >
                            <input
                                type="date"
                                name="dataTarefa"
                                v-model="form.dataTarefa"
                                id="dataTarefa"
                                class="bg-zinc-50 border border-zinc-300 text-gray-900 text-sm rounded-lg focus:ring-violet-600 focus:border-primary-600 block w-full p-2.5 dark:bg-zinc-900 dark:border-zinc-900 dark:placeholder-gray-400 dark:text-white dark:focus:ring-violet-500 dark:focus:border-primary-500"
                                placeholder="Type product name"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.dataTarefa"
                            />
                        </div>
                        <div class="col-span-2">
                            <label
                                class="inline-flex items-center cursor-pointer"
                            >
                                <input
                                    type="checkbox"
                                    v-model="form.completa"
                                    class="sr-only peer"
                                />
                                <div
                                    class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-violet-300 dark:peer-focus:ring-violet-800 rounded-full peer dark:bg-zinc-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-violet-600"
                                ></div>
                                <span
                                    class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Completa</span
                                >
                            </label>
                        </div>
                        <div class="col-span-2">
                            <label
                                class="inline-flex items-center cursor-pointer"
                            >
                                <input
                                    type="checkbox"
                                    v-model="form.importante"
                                    class="sr-only peer"
                                />
                                <div
                                    class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-violet-300 dark:peer-focus:ring-violet-800 rounded-full peer dark:bg-zinc-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-violet-600"
                                ></div>
                                <span
                                    class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Importante</span
                                >
                            </label>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button
                            type="submit"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                            class="text-white inline-flex items-center bg-violet-700 hover:bg-violet-800 focus:ring-4 focus:outline-none focus:ring-violet-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-violet-600 dark:hover:bg-violet-700 dark:focus:ring-violet-800"
                        >
                            <svg
                                class="me-1 -ms-1 w-5 h-5"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                            Criar Tarefa
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { onMounted, onBeforeUnmount } from "vue";
import { initFlowbite } from "flowbite";
import { useForm } from "@inertiajs/vue3";
import { useToast } from "vue-toast-notification";
import InputError from "@/Components/InputError.vue";

import { useModal } from "@/composables/useModal";

const $toast = useToast();
const { openModal, closeModal } = useModal();
const form = useForm('CreateTask',{
    titulo: null,
    descricao: null,
    dataTarefa: null,
    completa: false,
    importante: false,
});

function submit() {
    form.post("/tarefa", {
        
        onSuccess: () => {
            form.reset();
            form.clearErrors()
            closeModal("adicionar-tarefa-modal");
            $toast.success("Tarefa adicionada com sucesso!");
        },
    });
}

onMounted(() => {
    initFlowbite();
});

onBeforeUnmount(() => {
    closeModal("adicionar-tarefa-modal");
});
</script>

<style scoped></style>
