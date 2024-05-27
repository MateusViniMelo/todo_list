<script setup lang="ts">
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/vue3";
import { Icon } from "@iconify/vue";

import { useDark, useToggle } from "@vueuse/core"

const isDark = useDark()
</script>

<template>
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-zinc-900"
    >
        <div>
           <Icon icon="jam:task-list" class="w-20 h-20 fill-current text-gray-500 dark:text-gray-200" />
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg dark:bg-zinc-800 "
        >
            <slot />
        </div>
    </div>
</template>
