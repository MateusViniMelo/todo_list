<template>
    <div
        class="px-4 py-5 h-56 rounded-2xl bg-gray-100  dark:bg-zinc-700"
    >
        <div class="mb-16">
            <h5 class="text-xl font-bold">{{ task?.title }}</h5>
            <p>{{ task?.description }}</p>
        </div>
        <div class="">
            <div class="mb-2">{{ useDateFormat(task?.date, 'DD/MM/YYYY').value }}</div>
            
            <div class="flex justify-between items-center">
                <Link
                    :href="`tarefa/mudar-status-completa/${task?.id}`"
                    :only="['tasks']"
                    v-if="task?.is_completed"
                    class="px-3 py-2 rounded-full text-sm font-medium text-center text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-200 dark:bg-green-500 dark:hover:bg-green-600 dark:focus:ring-green-700"
                >
                    Completado
                </Link>
                <Link
                    :href="`tarefa/mudar-status-completa/${task?.id}`"
                    :only="['tasks']"
                    type="button"
                    v-if="!task?.is_completed"
                    class="px-3 py-2 rounded-full text-sm font-medium text-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-200 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-700"
                >
                    Incompleto
                </Link>

                <div class="inline-flex space-x-2">
                    <Icon
                        @click="openModal(`editar-tarefa-modal${task?.id}`)"
                        icon="ic:baseline-edit-note"
                        width="32"
                        class="hover:text-blue-500 cursor-pointer"
                    />
                    <Link
                        :href="`tarefa/${task?.id}`"
                        method="delete"
                        as="button"
                        type="button"
                        :only="['tasks']"
                    >
                        <Icon
                            icon="material-symbols-light:delete"
                            width="32"
                            class="hover:text-red-500 cursor-pointer"
                        />
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { onMounted, PropType } from "vue";

import { Link, router } from "@inertiajs/vue3";
import { initFlowbite, Modal } from "flowbite";
import { useModal } from "@/composables/useModal";
import { Icon } from "@iconify/vue";

import type { ITask } from "@/interfaces/ITask";
import { useDateFormat, formatDate } from "@vueuse/core";



const { openModal, closeModal } = useModal();
const props = defineProps({
    task: {
        type: Object as PropType<ITask | null>,
    },
});


</script>
