<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import AppDashboard from "../../Layouts/AppDashboard.vue";

export default {
    props: {
        cotizations: Array,
    },
    components: {
        AppLayout,
        AppDashboard,
    },
};
</script>

<template>
    <AppLayout class="w-full" title="Cotizaciones">
        <div>
            <div class="flex overflow-hidden bg-white">
                <AppDashboard />
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
                                                        v-for="cotization in cotizations"
                                                        :key="cotization.id"
                                                        class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0"
                                                    >
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            {{ cotization.id }}
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            {{
                                                                cotization.referencia
                                                            }}
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            {{
                                                                cotization.created_at
                                                            }}


                                                        </td>
                                                        <td
                                                            class="border hover:bg-gray-100 p-2"
                                                        >
                                                            <span
                                                                v-if="
                                                                    cotization.status ==
                                                                    1
                                                                "
                                                                class="relative px-3 py-1 font-semibold text-green-900"
                                                            >
                                                                <span
                                                                    aria-hidden
                                                                    class="absolute inset-0 bg-green-200 rounded-full"
                                                                ></span>
                                                                <span
                                                                    class="relative"
                                                                    >Ordenada</span
                                                                >
                                                            </span>
                                                            <span
                                                                v-if="
                                                                    cotization.status ==
                                                                    0
                                                                "
                                                                class="relative px-3 py-1 font-semibold text-red-900"
                                                            >
                                                                <span
                                                                    aria-hidden
                                                                    class="absolute inset-0 bg-red-200 rounded-full"
                                                                ></span>
                                                                <span
                                                                    class="relative"
                                                                    >No
                                                                    Ordenada</span
                                                                >
                                                            </span>
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            <button
                                                                v-if="
                                                                    cotization.status ==
                                                                    1
                                                                "
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
                                                            <button
                                                                v-if="
                                                                    cotization.status ==
                                                                    0
                                                                "
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
                                                            </button>
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
