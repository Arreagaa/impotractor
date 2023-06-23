<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

const logout = () => {
    Inertia.post(route("logout"));
};

const menuItems = [
    {
        title: "Inicio",
        icon: "fa-solid fa-tractor",
        url: route("landing"),
    },
    {
        title: "Dashboard",
        icon: "fa-solid fa-chart-pie",
        url: route("dashboard"),
    },
    {
        title: "Cuenta",
        icon: "fa-solid fa-user",
        url: "/user/profile",
        badge: "Personal",
    },
    {
        title: "Productos",
        icon: "fa-solid fa-bag-shopping",
        url: "/#Products",
    },
    {
        title: "Cotizaciones",
        icon: "fa-solid fa-clipboard-list",
        url: route("cotization"),
    },
    {
        title: "Historial",
        icon: "fa-solid fa-clipboard-check",
        url: "/cotizations",
    },
    {
        title: "Pedidos",
        icon: "fa-solid fa-truck-ramp-box",
        url: "/orders",
    },
];
</script>
<template>
    <aside
        id="sidebar"
        class="bg-zinc-900 fixed hidden z-20 h-full top-0 left-0 pt-16 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75"
        aria-title="Sidebar"
    >
        <div
            class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0"
        >
            <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                <div class="flex-1 px-3 bg-white divide-y space-y-1">
                    <ul class="space-y-2 pb-2">
                        <li v-for="item in menuItems" :key="item.title">
                            <Link
                                :href="item.url"
                                class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group"
                            >
                                <l-icon
                                    :icon="item.icon"
                                    class="w-6 h-5 text-gray-500 group-hover:text-gray-900 transition duration-75"
                                />
                                <span class="ml-3">{{ item.title }}</span>
                                <span
                                    v-if="item.badge"
                                    class="bg-gray-200 text-gray-800 ml-3 text-sm font-medium inline-flex items-center justify-center px-2 rounded-full"
                                    >{{ item.badge }}</span
                                >
                            </Link>
                        </li>
                    </ul>
                </div>
            </div>
            <form method="POST" @submit.prevent="logout" class="border-t rounded-lg hover:bg-gray-100 group transition duration-75">
                <button
                    class="text-base text-gray-900 font-normal flex items-center py-4 px-6"
                >
                    <l-icon
                        icon="fa-solid fa-right-from-bracket"
                        class="w-6 h-5 text-gray-500 group-hover:text-gray-900 transition duration-75"
                    />
                    <span class="ml-3">Cerrar sesión</span>
                </button>
            </form>
        </div>
    </aside>
</template>
