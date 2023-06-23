<script>
import ISettHead from "./utils/ISettHead.vue";
import IValidate from "../IValidate.vue";
import Swal from "sweetalert2";
import { Link } from "@inertiajs/inertia-vue3";

export default {
    props: {
        is: Function,
        settlements: Object,
        search: String,
    },
    components: {
        ISettHead,
        IValidate,
        Link,
    },
    data() {
        return {
            query: this.search,
        };
    },
    methods: {
        performSearch() {
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
                text: "Asegúrate de que quieres eliminar este Producto.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#FFCC00",
                cancelButtonColor: "#d33",
                confirmButtonText: "¡Sí, eliminar de Liquidación!",
                cancelButtonText: "Cancelar",
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$inertia.delete(route("settlements.destroy", id), {
                        onSuccess: () => {
                            Swal.fire({
                                title: "¡Eliminación del Producto!",
                                text: "Se ha eliminado exitosamente.",
                                icon: "success",
                                confirmButtonColor: "#FFCC00",
                            });
                        },
                    });
                }
            });
        },
    },
};
</script>
<template>
    <div class="px-4 pt-6" id="Calculator">
        <div class="my-4">
            <div class="p-4 mb-4 bg-white rounded-md shadow sm:p-6 h-full l">
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
                            <l-icon
                                icon="fa-solid fa-magnifying-glass"
                                class="text-lg text-gray-600"
                            />
                        </div>
                        <div class="inline-flex">
                            <input
                                @keydown.enter.prevent="performSearch"
                                v-model="query"
                                type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus-form block lg:w-80 pl-10 p-2.5"
                                placeholder="Buscar Productos en Liquidación"
                            />
                            <div v-if="this.query != null" class="inline-flex">
                                <Link
                                    href="settlements"
                                    class="lg:block hidden p-2.5 ml-2 text-sm font-bold text-white bg-zinc-900 rounded-lg border hover:bg-yellow-400"
                                >
                                    Volver al Listado de Liquidación
                                </Link>
                                <Link
                                    href="settlements"
                                    class="lg:hidden p-2.5 ml-2 text-sm font-bold text-white bg-zinc-900 rounded-lg border hover:bg-yellow-400"
                                >
                                    Regresar
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="this.settlements.data.length == 0">
                    <IValidate />
                </div>
                <div v-else class="flex items-center justify-center">
                    <div class="container shadow-xl">
                        <section class="bg-white">
                            <div class="container">
                                <div class="flex flex-wrap -mx-4">
                                    <div class="w-full px-2">
                                        <div class="max-w-full overflow-x-auto">
                                            <table
                                                class="w-full overflow-hidden rounded-md table-auto bg-zinc-900 sm:shadow-lg"
                                            >
                                                <ISettHead :is="is" />
                                                <tbody>
                                                    <tr
                                                        v-for="settlement in settlements.data"
                                                        :key="settlement.id"
                                                    >
                                                        <td
                                                            class="px-2 py-3 text-base font-medium text-center bg-white border text-zinc-900 border-grey-light hover:bg-gray-100"
                                                        >
                                                            {{
                                                                settlement.partNumber
                                                            }}
                                                        </td>
                                                        <td
                                                            class="px-2 py-3 text-base font-medium text-center bg-white border text-zinc-900 border-grey-light hover:bg-gray-100"
                                                        >
                                                            {{
                                                                settlement.description
                                                            }}
                                                        </td>
                                                        <td
                                                            v-if="is('Admin')"
                                                            class="px-2 py-3 text-base font-medium text-center bg-white border text-zinc-900 border-grey-light"
                                                        >
                                                            <button
                                                                @click="
                                                                    deleteSettlement(
                                                                        settlement.id
                                                                    )
                                                                "
                                                                class="px-5 py-2 text-sm leading-none text-gray-600 bg-gray-100 rounded focus:ring-2 focus:ring-offset-2 focus:ring-red-400 hover:bg-gray-200 focus:outline-none"
                                                            >
                                                                <l-icon
                                                                    icon="fa-solid fa-trash-can-arrow-up"
                                                                    class="text-2xl"
                                                                />
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
