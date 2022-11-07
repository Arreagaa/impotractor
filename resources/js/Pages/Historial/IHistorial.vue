<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
</script>

<template>
    <AppLayout class="w-full" title="Cotizaciones">
        <div>
            <div class="flex overflow-hidden bg-white">
                <aside
                    id="sidebar"
                    class="fixed hidden z-20 h-full top-0 left-0 pt-16 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75"
                    aria-label="Sidebar"
                >
                    <div
                        class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0"
                    >
                        <div
                            class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto"
                        >
                            <div
                                class="flex-1 px-3 bg-white divide-y space-y-1"
                            >
                                <ul class="space-y-2 pb-2">
                                    <li>
                                        <a
                                            href="/dashboard"
                                            class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group"
                                        >
                                            <svg
                                                class="w-6 h-6 text-gray-500 group-hover:text-gray-900 transition duration-75"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                    d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"
                                                ></path>
                                                <path
                                                    d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"
                                                ></path>
                                            </svg>
                                            <span class="ml-3">Dashboard</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="/user/profile"
                                            class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group"
                                        >
                                            <svg
                                                class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                    clip-rule="evenodd"
                                                ></path>
                                            </svg>
                                            <span
                                                class="ml-3 flex-1 whitespace-nowrap"
                                                >Cuenta</span
                                            >
                                            <span
                                                class="bg-gray-200 text-gray-800 ml-3 text-sm font-medium inline-flex items-center justify-center px-2 rounded-full"
                                                >Personal</span
                                            >
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox"
                                            target="_blank"
                                            class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group"
                                        >
                                            <svg
                                                class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                    d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"
                                                ></path>
                                                <path
                                                    d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"
                                                ></path>
                                            </svg>
                                            <span
                                                class="ml-3 flex-1 whitespace-nowrap"
                                                >Inbox</span
                                            >
                                            <span
                                                class="bg-gray-200 text-gray-800 ml-3 text-sm font-medium inline-flex items-center justify-center px-2 rounded-full"
                                                >Personal</span
                                            >
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="/#Products"
                                            target="_blank"
                                            class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group"
                                        >
                                            <svg
                                                class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                                                    clip-rule="evenodd"
                                                ></path>
                                            </svg>
                                            <span
                                                class="ml-3 flex-1 whitespace-nowrap"
                                                >Productos</span
                                            >
                                        </a>
                                    </li>
                                </ul>
                                <div class="space-y-2 pt-2">
                                    <a
                                        href="/cotization"
                                        class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2"
                                    >
                                        <svg
                                            class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"
                                            ></path>
                                            <path
                                                fill-rule="evenodd"
                                                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                                clip-rule="evenodd"
                                            ></path>
                                        </svg>
                                        <span class="ml-3">Cotizaciones</span>
                                    </a>
                                    <a
                                        href="/cotization/#Calculator"
                                        class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2"
                                    >
                                        <svg
                                            class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"
                                            ></path>
                                        </svg>
                                        <span class="ml-3">Calculadora</span>
                                    </a>
                                    <a
                                        href="/cotization/#Resumen"
                                        class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2"
                                    >
                                        <svg
                                            class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"
                                            ></path>
                                        </svg>
                                        <span class="ml-3">Resumen</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <div
                    class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10"
                    id="sidebarBackdrop"
                ></div>
                <div
                    id="main-content"
                    class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64"
                >
                    <main>
                        <div class="pt-4 px-4" id="historial">
                            <div class="my-4">
                                <div
                                    class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full"
                                >
                                    <div
                                        class="flex items-center justify-between mb-4"
                                    >
                                        <h3
                                            class="text-xl font-bold leading-none text-gray-900"
                                        >
                                            Historial
                                        </h3>
                                    </div>
                                    <div
                                        class="flex items-center justify-center"
                                    >
                                        <div class="container">
                                            <table
                                                class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg"
                                            >
                                                <thead class="text-white">
                                                    <tr
                                                        class="bg-zinc-900 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0"
                                                    >
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            Número de Cotización
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            Referencia
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            Fecha
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            Status
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            Acciones
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody
                                                    class="flex-1 sm:flex-none"
                                                >
                                                    <tr
                                                        class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0"
                                                    >
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border hover:bg-gray-100 p-2"
                                                        >
                                                            <span
                                                                class="relative px-3 py-1 font-semibold text-green-900"
                                                            >
                                                                <span
                                                                    aria-hidden
                                                                    class="absolute inset-0 bg-green-200 rounded-full"
                                                                ></span>
                                                                <span
                                                                    class="relative"
                                                                    >Activo</span
                                                                >
                                                            </span>
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            <button
                                                                class="focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400 text-sm leading-none text-gray-600 py-2 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none"
                                                            >
                                                                <svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    width="16"
                                                                    height="16"
                                                                    fill="currentColor"
                                                                    class="bi bi-box-arrow-up"
                                                                    viewBox="0 0 16 16"
                                                                >
                                                                    <path
                                                                        fill-rule="evenodd"
                                                                        d="M3.5 6a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 1 0-1h2A1.5 1.5 0 0 1 14 6.5v8a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-8A1.5 1.5 0 0 1 3.5 5h2a.5.5 0 0 1 0 1h-2z"
                                                                    />
                                                                    <path
                                                                        fill-rule="evenodd"
                                                                        d="M7.646.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 1.707V10.5a.5.5 0 0 1-1 0V1.707L5.354 3.854a.5.5 0 1 1-.708-.708l3-3z"
                                                                    />
                                                                </svg>
                                                            </button>
                                                            <!--<button
                                                                class="focus:ring-2 ml-2 focus:ring-offset-2 focus:ring-yellow-400 text-sm leading-none text-gray-600 py-2 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none"
                                                            >
                                                                <svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    width="16"
                                                                    height="16"
                                                                    fill="currentColor"
                                                                    class="bi bi-pencil-square"
                                                                    viewBox="0 0 16 16"
                                                                >
                                                                    <path
                                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"
                                                                    />
                                                                    <path
                                                                        fill-rule="evenodd"
                                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"
                                                                    />
                                                                </svg>
                                                            </button>-->
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>

                    <br />
                    <p class="text-center text-base text-gray-500 my-10">
                        &copy; 2005-2022
                        <a
                            href="https://www.facebook.com/impotractorsa/"
                            class="hover:text-yellow-400"
                            target="_blank"
                            >Impotractor S.A.</a
                        >
                        Todos los derechos reservados.
                    </p>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style>
@media (min-width: 640px) {
    table {
        display: inline-table !important;
    }

    thead tr:not(:first-child) {
        display: none;
    }
}

td:not(:last-child) {
    border-bottom: 1;
}

th:not(:last-child) {
    border-bottom: 2px solid rgba(0, 0, 0, 0.1);
}

.data {
    text-align: center;
    font-weight: bold;
}
</style>
