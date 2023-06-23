<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import AppDashboard from "../../Layouts/AppDashboard.vue";
import IFooter from "../Cotization/utils/IFooter.vue";
import IPagination from "../Pagination/IShow.vue";
import IValidate from "../IValidate.vue";
import Swal from "sweetalert2/dist/sweetalert2.js";
import "sweetalert2/dist/sweetalert2.min.css";
export default {
    props: {
        orders: Object,
    },
    components: {
        AppLayout,
        AppDashboard,
        IFooter,
        IPagination,
        IValidate,
    },
    methods: {
        deleteOrder(id) {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "Asegúrate que quieres eliminar este Pedido.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#FFCC00",
                cancelButtonColor: "#d33",
                confirmButtonText: "¡Si, eliminar Pedido!",
                cancelButtonText: "Cancelar",
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$inertia.delete(route("orders.destroy", id), {
                        onSuccess: () => {
                            Swal.fire({
                                title: "¡Eliminación del Pedido!",
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
    <AppLayout class="w-full" title="Cotizaciones">
        <div>
            <div class="flex overflow-hidden bg-white">
                <AppDashboard />
                <div
                    id="main-content"
                    class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64"
                >
                    <main>
                        <div class="pt-6 px-4">
                            <div
                                class="grid grid-cols-1 2xl:grid-cols-1 xl:gap-4 my-4"
                            >
                                <div
                                    class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full"
                                >
                                    <div
                                        class="flex items-center justify-between mb-4"
                                    >
                                        <h3
                                            class="text-xl font-bold leading-none text-gray-900"
                                        >
                                            Pedidos
                                        </h3>
                                    </div>
                                    <div
                                        class="flex items-center justify-center"
                                    >
                                        <div class="container">
                                            <a
                                                v-if="is('Admin')"
                                                href="/order"
                                                type="submit"
                                                class="mb-4 text-white bg-zinc-900 hover:bg-yellow-400 focus:ring-4 focus:outline-none font-bold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                                            >
                                                Crear Pedido
                                            </a>
                                            <a
                                                v-if="is('Admin')"
                                                href="settlements"
                                                type="submit"
                                                class="lg:ml-2 mb-4 text-white bg-zinc-900 hover:bg-yellow-400 focus:ring-4 focus:outline-none font-bold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                                            >
                                                Productos en Liquidación
                                            </a>
                                            <div
                                                v-if="
                                                    this.orders.data.length == 0
                                                "
                                            >
                                                <IValidate />
                                            </div>
                                            <section
                                                v-else
                                                class="bg-white rounded-lg border"
                                            >
                                                <div class="container">
                                                    <div
                                                        class="flex flex-wrap -mx-4"
                                                    >
                                                        <div
                                                            class="w-full px-4"
                                                        >
                                                            <div
                                                                class="max-w-full overflow-x-auto shadow-xl"
                                                            >
                                                                <table
                                                                    class="table-auto w-full rounded-lg overflow-hidden sm:shadow-xl"
                                                                >
                                                                    <thead
                                                                        class="bg-zinc-900"
                                                                    >
                                                                        <tr
                                                                            class="bg-zinc-900 text-center"
                                                                        >
                                                                            <th
                                                                                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 lg:py-4 px-3 lg:px-4"
                                                                            >
                                                                                Número
                                                                                de
                                                                                Pedido
                                                                            </th>
                                                                            <th
                                                                                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 lg:py-4 px-3 lg:px-4"
                                                                            >
                                                                                Pedido
                                                                            </th>
                                                                            <th
                                                                                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 lg:py-4 px-3 lg:px-4"
                                                                            >
                                                                                Fecha
                                                                            </th>
                                                                            <th
                                                                                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 lg:py-4 px-3 lg:px-4"
                                                                            >
                                                                                Acciones
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody
                                                                        class="divide-y"
                                                                    >
                                                                        <tr
                                                                            v-for="order in orders.data"
                                                                            :key="
                                                                                order.id
                                                                            "
                                                                            class="border-b-2"
                                                                        >
                                                                            <td
                                                                                class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light hover:bg-gray-100"
                                                                            >
                                                                                {{
                                                                                    order.id
                                                                                }}
                                                                            </td>
                                                                            <td
                                                                                class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light hover:bg-gray-100"
                                                                            >
                                                                                {{
                                                                                    order.name
                                                                                }}
                                                                            </td>
                                                                            <td
                                                                                class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light hover:bg-gray-100"
                                                                            >
                                                                                {{
                                                                                    order.created_at
                                                                                }}
                                                                            </td>
                                                                            <td
                                                                                class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light hover:bg-gray-100"
                                                                            >
                                                                                <a
                                                                                    v-if="
                                                                                        is(
                                                                                            'Admin'
                                                                                        )
                                                                                    "
                                                                                    :href="`/order/${order.id}`"
                                                                                >
                                                                                    <button
                                                                                        class="focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400 text-sm leading-none text-gray-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none"
                                                                                    >
                                                                                        <l-icon
                                                                                            icon="fa-solid fa-screwdriver-wrench"
                                                                                            class="text-2xl"
                                                                                        /></button
                                                                                ></a>

                                                                                <a
                                                                                    v-if="
                                                                                        is(
                                                                                            'Admin'
                                                                                        )
                                                                                    "
                                                                                >
                                                                                    <button
                                                                                        @click="
                                                                                            deleteOrder(
                                                                                                order.id
                                                                                            )
                                                                                        "
                                                                                        class="ml-2 focus:ring-2 focus:ring-offset-2 focus:ring-red-400 text-sm leading-none text-gray-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none"
                                                                                    >
                                                                                        <l-icon
                                                                                            icon="fa-solid fa-trash-can-arrow-up"
                                                                                            class="text-2xl"
                                                                                        /></button
                                                                                ></a>

                                                                                <a
                                                                                    v-if="
                                                                                        is(
                                                                                            'Seller'
                                                                                        )
                                                                                    "
                                                                                    :href="`/order/${order.id}`"
                                                                                >
                                                                                    <button
                                                                                        class="ml-4 focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400 text-sm leading-none text-gray-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none"
                                                                                    >
                                                                                        <l-icon
                                                                                            icon="fa-solid fa-business-time"
                                                                                            class="text-2xl"
                                                                                        /></button
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
                    </main>
                    <IPagination :links="orders.links" />
                    <br />
                    <IFooter />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
