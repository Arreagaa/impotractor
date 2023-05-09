<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import AppDashboard from "../../Layouts/AppDashboard.vue";
import IFooter from "../Cotization/utils/IFooter.vue";
import IPagination from "../Pagination/IShow.vue";
export default {
    props: {
        cotizations: Object,
    },
    components: {
        AppLayout,
        AppDashboard,
        IFooter,
        IPagination,
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
                                        <div class="container shadow-xl">
                                            <section class="bg-white">
                                                <div class="container">
                                                    <div
                                                        class="flex flex-wrap -mx-4"
                                                    >
                                                        <div
                                                            class="w-full px-4"
                                                        >
                                                            <div
                                                                class="max-w-full overflow-x-auto"
                                                            >
                                                                <table
                                                                    class="table-auto w-full bg-zinc-900 rounded-lg overflow-hidden sm:shadow-lg"
                                                                >
                                                                    <thead>
                                                                        <tr
                                                                            class="bg-primary text-left"
                                                                        >
                                                                            <th
                                                                                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-4 lg:py-4 px-3 lg:px-4 border-l border-transparent"
                                                                            >
                                                                                Número
                                                                                de
                                                                                Cotización
                                                                            </th>
                                                                            <th
                                                                                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 lg:py-4 px-3 lg:px-4"
                                                                            >
                                                                                Referencia
                                                                            </th>
                                                                            <th
                                                                                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 lg:py-4 px-3 lg:px-4"
                                                                            >
                                                                                Fecha
                                                                            </th>
                                                                            <th
                                                                                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 lg:py-4 px-3 lg:px-4"
                                                                            >
                                                                                Status
                                                                            </th>
                                                                            <th
                                                                                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 lg:py-4 px-3 lg:px-4"
                                                                            >
                                                                                Acciones
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr
                                                                            v-for="cotization in cotizations.data"
                                                                            :key="
                                                                                cotization.id
                                                                            "
                                                                        >
                                                                            <td
                                                                                class="text-left text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border hover:bg-gray-100"
                                                                            >
                                                                                {{
                                                                                    cotization.id
                                                                                }}
                                                                            </td>
                                                                            <td
                                                                                class="text-left text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border hover:bg-gray-100"
                                                                            >
                                                                                {{
                                                                                    cotization.reference
                                                                                }}
                                                                            </td>
                                                                            <td
                                                                                class="text-left text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border hover:bg-gray-100"
                                                                            >
                                                                                {{
                                                                                    cotization.created_at
                                                                                }}
                                                                            </td>
                                                                            <td
                                                                                class="text-left text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border hover:bg-gray-100"
                                                                            >
                                                                                <span
                                                                                    v-if="
                                                                                        cotization.is_ordered ==
                                                                                        1
                                                                                    "
                                                                                    class="relative px-3 py-1 font-bold text-green-900"
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
                                                                                        cotization.is_ordered ==
                                                                                        0
                                                                                    "
                                                                                    class="relative px-3 py-1 font-bold text-red-900"
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
                                                                                class="text-left text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
                                                                            >
                                                                                <a
                                                                                    :href="`/cotization?id=${cotization.id}`"
                                                                                >
                                                                                    <button
                                                                                        v-if="
                                                                                            cotization.is_ordered ==
                                                                                            1
                                                                                        "
                                                                                        class="focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400 text-sm leading-none text-gray-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none"
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
                                                                                </a>

                                                                                <a
                                                                                    :href="`/cotization?id=${cotization.id}`"
                                                                                >
                                                                                    <button
                                                                                        v-if="
                                                                                            cotization.is_ordered ==
                                                                                            0
                                                                                        "
                                                                                        class="focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400 text-sm leading-none text-gray-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none"
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
                                                                                        </svg></button
                                                                                ></a>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <IPagination :links="cotizations.links" />
                        </div>
                    </main>
                    <br />
                    <IFooter />
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
