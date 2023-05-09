<script>
import ISettHead from "./utils/ISettHead.vue";
import Swal from "sweetalert2/dist/sweetalert2.js";
import "sweetalert2/dist/sweetalert2.min.css";
export default {
    props: {
        is: Function,
        settlements: Object,
        search: String,
    },
    components: {
        ISettHead,
    },
    data() {
        return {
            query: this.search,
        };
    },
    methods: {
        search() {
            this.$inertia.get(
                route("settlements.index", {
                    q: this.query,
                    preserveScroll: true,
                })
            );
        },
        deleteSettlement(id) {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "Asegúrate que quieres eliminar este Producto.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#FFCC00",
                cancelButtonColor: "#d33",
                confirmButtonText: "¡Si, eliminar de Liquidación!",
                cancelButtonText: "Cancelar",
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$inertia.delete(route("settlements.destroy", id));
                    Swal.fire({
                        title: "¡Eliminación del Producto!",
                        text: "Se ha eliminado exitosamente.",
                        icon: "success",
                        confirmButtonColor: "#FFCC00",
                    });
                }
            });
        },
    },
};
</script>
<template>
    <div class="pt-6 px-4" id="Calculator">
        <div class="my-4">
            <div class="bg-white shadow rounded-md mb-4 p-4 sm:p-6 h-ful l">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-bold leading-none text-gray-900">
                        Productos
                    </h3>
                </div>
                <div class="p-3">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative mt-1">
                        <div
                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
                        >
                            <svg
                                class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                        </div>
                        <div class="inline-flex">
                            <input
                                @keydown.enter.prevent="search"
                                v-model="query"
                                type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus-form block lg:w-80 pl-10 p-2.5"
                                placeholder="Buscar Productos en Liquidación"
                            />
                            <div v-if="this.query != null" class="inline-flex">
                                <a
                                    href="settlements"
                                    class="lg:block hidden p-2.5 ml-2 text-sm font-bold text-white bg-zinc-900 rounded-lg border hover:bg-yellow-400"
                                >
                                    Volver al Listado de Liquidación
                                </a>
                                <a
                                    href="settlements"
                                    class="lg:hidden p-2.5 ml-2 text-sm font-bold text-white bg-zinc-900 rounded-lg border hover:bg-yellow-400"
                                >
                                    Regresar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <div class="container shadow-xl">
                        <section class="bg-white">
                            <div class="container">
                                <div class="flex flex-wrap -mx-4">
                                    <div class="w-full px-2">
                                        <div class="max-w-full overflow-x-auto">
                                            <table
                                                class="table-auto w-full bg-zinc-900 rounded-md overflow-hidden sm:shadow-lg"
                                            >
                                                <ISettHead :is="is" />
                                                <tbody>
                                                    <tr
                                                        v-for="settlement in settlements.data"
                                                        :key="settlement.id"
                                                    >
                                                        <td
                                                            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border hover:bg-gray-100"
                                                        >
                                                            {{
                                                                settlement.partNumber
                                                            }}
                                                        </td>
                                                        <td
                                                            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border hover:bg-gray-100"
                                                        >
                                                            {{
                                                                settlement.description
                                                            }}
                                                        </td>
                                                        <td
                                                            v-if="is('Admin')"
                                                            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
                                                        >
                                                            <button
                                                                @click="
                                                                    deleteSettlement(
                                                                        settlement.id
                                                                    )
                                                                "
                                                                class="focus:ring-2 focus:ring-offset-2 focus:ring-red-400 text-sm leading-none text-gray-600 py-2 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none"
                                                            >
                                                                <svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    fill="none"
                                                                    viewBox="0 0 24 24"
                                                                    stroke-width="1.5"
                                                                    stroke="currentColor"
                                                                    class="w-6 h-6"
                                                                >
                                                                    <path
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"
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
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
