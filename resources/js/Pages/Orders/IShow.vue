<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import AppDashboard from "../../Layouts/AppDashboard.vue";
import IFooter from "../Cotization/utils/IFooter.vue";
import IPagination from "../Pagination/IShow.vue";
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
                    this.$inertia.delete(route("orders.destroy", id));
                    Swal.fire({
                        title: "¡Eliminación del Pedido!",
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
                                            <section
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
                                                                                        <svg
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            viewBox="0 0 24 24"
                                                                                            fill="currentColor"
                                                                                            class="w-6 h-6"
                                                                                        >
                                                                                            <path
                                                                                                fill-rule="evenodd"
                                                                                                d="M12 6.75a5.25 5.25 0 016.775-5.025.75.75 0 01.313 1.248l-3.32 3.319c.063.475.276.934.641 1.299.365.365.824.578 1.3.64l3.318-3.319a.75.75 0 011.248.313 5.25 5.25 0 01-5.472 6.756c-1.018-.086-1.87.1-2.309.634L7.344 21.3A3.298 3.298 0 112.7 16.657l8.684-7.151c.533-.44.72-1.291.634-2.309A5.342 5.342 0 0112 6.75zM4.117 19.125a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.008a.75.75 0 01-.75-.75v-.008z"
                                                                                                clip-rule="evenodd"
                                                                                            />
                                                                                            <path
                                                                                                d="M10.076 8.64l-2.201-2.2V4.874a.75.75 0 00-.364-.643l-3.75-2.25a.75.75 0 00-.916.113l-.75.75a.75.75 0 00-.113.916l2.25 3.75a.75.75 0 00.643.364h1.564l2.062 2.062 1.575-1.297z"
                                                                                            />
                                                                                            <path
                                                                                                fill-rule="evenodd"
                                                                                                d="M12.556 17.329l4.183 4.182a3.375 3.375 0 004.773-4.773l-3.306-3.305a6.803 6.803 0 01-1.53.043c-.394-.034-.682-.006-.867.042a.589.589 0 00-.167.063l-3.086 3.748zm3.414-1.36a.75.75 0 011.06 0l1.875 1.876a.75.75 0 11-1.06 1.06L15.97 17.03a.75.75 0 010-1.06z"
                                                                                                clip-rule="evenodd"
                                                                                            />
                                                                                        </svg></button
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
                                                                                        </svg></button
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
                                                                                        <svg
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            viewBox="0 0 24 24"
                                                                                            fill="currentColor"
                                                                                            class="w-6 h-6"
                                                                                        >
                                                                                            <path
                                                                                                fill-rule="evenodd"
                                                                                                d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75H12a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                                                                                                clip-rule="evenodd"
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
                    </main>
                    <div>
                        <IPagination :links="orders.links" />
                    </div>
                    <br />
                    <IFooter />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
