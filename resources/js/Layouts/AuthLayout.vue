<template>
    <div>
        <nav
            class="fixed top-0 z-50 w-full bg-white border-b border-zinc-200 dark:bg-zinc-800 dark:border-zinc-700"
        >
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
                <div class="flex items-center justify-between">
                    <div
                        class="flex items-center justify-start rtl:justify-end"
                    >
                        <button
                            data-drawer-target="logo-sidebar"
                            data-drawer-toggle="logo-sidebar"
                            aria-controls="logo-sidebar"
                            type="button"
                            class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-zinc-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-zinc-700 dark:focus:ring-gray-600"
                        >
                            <span class="sr-only">Open sidebar</span>
                            <svg
                                class="w-6 h-6"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    clip-rule="evenodd"
                                    fill-rule="evenodd"
                                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"
                                ></path>
                            </svg>
                        </button>
                        <a
                            href="https://flowbite.com"
                            class="flex ms-2 md:me-24"
                        >
                        <Icon icon="jam:task-list" height="32" class="me-3 text-violet-600 dark:text-violet-500" />
                            
                            <span
                                class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white"
                                >OrganizaJá</span
                            >
                        </a>
                    </div>
                    <div class="flex items-center">
                        <div class="flex items-center ms-3">
                            <div>
                                <button
                                    type="button"
                                    class="flex text-sm bg-zinc-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                    aria-expanded="false"
                                    data-dropdown-toggle="dropdown-user"
                                >
                                    <span class="sr-only">Open user menu</span>
                                    <img
                                        class="w-8 h-8 rounded-full"
                                        :src="$page.props.auth.user.avatar_image_url "
                                        alt="user photo"
                                    />
                                </button>
                            </div>
                            <div
                                class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-zinc-700 dark:divide-gray-600"
                                id="dropdown-user"
                            >
                                <div class="px-4 py-3" role="none">
                                    <p
                                        class="text-sm text-gray-900 dark:text-white"
                                        role="none"
                                    >
                                        {{ $page.props.auth.user.name }}
                                    </p>
                                    <p
                                        class="text-sm font-medium text-gray-900 truncate dark:text-gray-300"
                                        role="none"
                                    >
                                        {{ $page.props.auth.user.email }}
                                    </p>
                                </div>
                                <ul class="py-1" role="none">
                                    <li>
                                        <Link
                                            :href="route('profile.edit')"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-zinc-100 dark:text-gray-300 dark:hover:bg-zinc-600 dark:hover:text-white"
                                            role="menuitem"
                                            >Perfil</Link
                                        >
                                    </li>

                                    <li
                                        @click="toggleDark()"
                                        class="cursor-pointer"
                                    >
                                        <span
                                            v-if="isDark"
                                            class="px-4 py-2 text-sm w-full inline-flex items-center text-gray-700 hover:bg-zinc-100 dark:text-gray-300 dark:hover:bg-zinc-600 dark:hover:text-white"
                                            role="menuitem"
                                        >
                                            <Icon
                                                icon="material-symbols:sunny"
                                                class="mr-1"
                                            />
                                            Claro
                                        </span>

                                        <span
                                            v-else
                                            class="px-4 py-2 text-sm text-gray-700 w-full inline-flex items-center hover:bg-zinc-100 dark:text-gray-300 dark:hover:bg-zinc-600 dark:hover:text-white"
                                            role="menuitem"
                                        >
                                            <Icon
                                                icon="material-symbols:dark-mode"
                                                class="mr-1"
                                            />
                                            Escuro</span
                                        >
                                    </li>
                                    <li>
                                        <Link
                                            :href="route('logout')"
                                            method="post"
                                            as="button"
                                            class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-zinc-100 dark:text-gray-300 dark:hover:bg-zinc-600 dark:hover:text-white"
                                            role="menuitem"
                                            >Sair</Link
                                        >
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <aside
            id="logo-sidebar"
            class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-zinc-200 sm:translate-x-0 dark:bg-zinc-800 dark:border-zinc-700"
            aria-label="Sidebar"
        >
            <div class="h-full pb-4 overflow-y-auto bg-white dark:bg-zinc-800">
                <ul class="space-y-2 font-medium">
                    <li>
                        <Link
                            href="/dashboard"
                            :class="{
                                'border-r-4 border-violet-600 dark:border-violet-500 bg-zinc-100 dark:bg-zinc-700':
                                    $page.url === '/dashboard',
                            }"
                            class="flex items-center p-2 text-gray-900 dark:text-white hover:bg-zinc-100 dark:hover:bg-zinc-700 group"
                        >
                            <Icon
                                icon="bi:list-task"
                                class="text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                width="28"
                            />
                            <span class="ms-3">Todas as Tarefas</span>
                        </Link>
                    </li>
                    <li>
                        <Link
                            href="/tarefa-importante"
                            :class="{
                                'border-r-4 border-violet-600 dark:border-violet-500 bg-zinc-100 dark:bg-zinc-700':
                                    $page.url === '/tarefa-importante',
                            }"
                            class="flex items-center p-2 text-gray-900 dark:text-white hover:bg-zinc-100 dark:hover:bg-zinc-700 group"
                        >
                            <Icon
                                icon="carbon:warning-other"
                                class="text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                width="28"
                            />
                            <span class="ms-3">Importantes</span>
                        </Link>
                    </li>
                    <li>
                        <Link
                            href="/tarefa-completada"
                            :class="{
                                'border-r-4 border-violet-600 dark:border-violet-500 bg-zinc-100 dark:bg-zinc-700':
                                    $page.url === '/tarefa-completada',
                            }"
                            class="flex items-center p-2 text-gray-900 dark:text-white hover:bg-zinc-100 dark:hover:bg-zinc-700 group"
                        >
                            <Icon
                                icon="ic:sharp-checklist"
                                class="text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                width="28"
                            />
                            <span class="ms-3">Completadas</span>
                        </Link>
                    </li>
                </ul>
            </div>
        </aside>

        <div
            class="px-10 pt-8 sm:ml-64 bg-gray-50 dark:bg-zinc-900 min-h-screen"
        >
            <slot />
        </div>
    </div>
</template>

<script setup lang="ts">
import { Link } from "@inertiajs/vue3";
import { onMounted } from "vue";
import { initFlowbite } from "flowbite";
import { useDark, useToggle } from "@vueuse/core";
import { Icon } from "@iconify/vue";

const isDark = useDark();
const toggleDark = useToggle(isDark);
onMounted(() => {
    initFlowbite();
});
</script>

<style scoped></style>
