<template>
    <Head :title="titulo" />

    <AuthLayout>
        <div
            class="p-4 border-2 border-zinc-200 bg-white rounded-2xl dark:border-zinc-700 dark:bg-zinc-800 dark:text-white mt-14"
        >
            <h1 class="text-3xl font-bold mb-12">
                <span
                    class="border-b-4 border-violet-600 dark:border-violet-500 pr-12"
                >
                    {{ titulo }}</span
                    
                >
                
            </h1>
            {{ errors?.editTask }}
            <div class="grid grid-cols-4 gap-4 mb-4 min-h-[60vh]">
                <div
                    @click="openModal('adicionar-tarefa-modal')"
                    class="flex items-center justify-center h-56 rounded-2xl col-span-4 md:col-span-3 lg:col-span-2 xl:col-span-1 border-dashed border-2 hover:bg-gray-100 cursor-pointer border-gray-300 dark:border-zinc-600 dark:bg-zinc-800 dark:hover:bg-zinc-700"
                >
                    <p
                        class="text-xl flex items-center text-center justify-center text-gray-900 dark:text-white"
                    >
                        <Icon icon="material-symbols:add" width="32" />
                        Adicionar Nova Tarefa
                    </p>
                </div>
                <div
                    class="col-span-4 md:col-span-3 lg:col-span-2 xl:col-span-1"
                    v-for="task in tasks?.data"
                >
                    <TaskCard :task="task" :key="task.id" />
                    <ModalEditTask
                        :task="task"
                        :key="task.id"
                        :errors="errors?.editTask"
                    />
                </div>
            </div>
            <div class="flex items-center justify-center">
                <Pagination :links="tasks?.links" />
            </div>
            <ModalCreateTask />
        </div>
    </AuthLayout>
</template>

<script setup lang="ts">
import { onMounted, PropType } from "vue";
import AuthLayout from "@/Layouts/AuthLayout.vue";
import { Head } from "@inertiajs/vue3";
import { initFlowbite, Modal } from "flowbite";
import ModalCreateTask from "@/Components/Task/ModalCreateTask.vue";
import { Icon } from "@iconify/vue";
import { useModal } from "@/composables/useModal";
import ModalEditTask from "@/Components/Task/ModalEditTask.vue";
import TaskCard from "@/Components/TaskCard.vue";
import { ITaskResponse } from "@/interfaces/ITaskResponse";
const { openModal, closeModal } = useModal();

import Pagination from "@/Components/Pagination.vue";

const props = defineProps({
    tasks: {
        type: Object as PropType<ITaskResponse>,
    },
    errors: Object,
    titulo: String,
});



onMounted(() => {
    initFlowbite();
});
</script>
