<template>
    <div>
        <nav aria-label="Page navigation example">
            <ul class="flex items-center -space-x-px h-10 text-base flex-wrap ">
                <li v-for="link in links" :key="link.label">
                    <Link
                        v-html="link.label"
                        :href="link.url ?? ''"
                        class="flex items-center justify-center  px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                        :class="{
                            'bg-slate-300': !link.url,
                            'flex items-center justify-center px-4 h-10 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white':
                                link.active,
                        }"
                    />
                </li>
            </ul>
        </nav>
    </div>
</template>

<script setup lang="ts">
import { Link } from "@inertiajs/vue3";
import { PropType } from "vue";

import type { ILinkResponse } from "@/interfaces/ILinkResponse";

const props = defineProps({
    links: {
        type: Array as PropType<ILinkResponse[] | []>,
    },
});
</script>

<style scoped></style>
