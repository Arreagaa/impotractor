<script>
import ICalculateItem from "./ICalculateItem.vue";

export default {
    props: {
        cotizationItems: Array,
        cotization: Object,
        grandTotal: Number,
    },
    components: {
        ICalculateItem,
    },
};
</script>
<template>
    <div class="pt-4 px-4" id="Calculator">
        <div class="my-4">
            <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-ful l">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-bold leading-none text-gray-900">
                        Calculadora
                    </h3>
                </div>
                <div class="flex items-center justify-center">
                    <div class="container">
                        <section class="bg-white rounded-lg border">
                            <div class="container">
                                <div class="flex flex-wrap -mx-4">
                                    <div class="w-full px-4">
                                        <div
                                            class="max-w-full overflow-x-auto shadow-xl"
                                        >
                                            <table
                                                class="table-auto w-full rounded-lg overflow-hidden sm:shadow-xl"
                                            >
                                                <thead class="bg-zinc-900">
                                                    <tr
                                                        class="bg-zinc-900 text-center"
                                                    >
                                                        <th
                                                            class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 lg:py-4 px-3 lg:px-4"
                                                        >
                                                            Número de Parte
                                                        </th>
                                                        <th
                                                            class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 lg:py-4 px-3 lg:px-4"
                                                        >
                                                            Cantidad
                                                        </th>
                                                        <th
                                                            class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 lg:py-4 px-3 lg:px-4"
                                                        >
                                                            Descripción
                                                        </th>
                                                        <th
                                                            class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 lg:py-4 px-3 lg:px-4"
                                                        >
                                                            Precio Unitario
                                                        </th>
                                                        <th
                                                            class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 lg:py-4 px-3 lg:px-4"
                                                        >
                                                            Total
                                                        </th>
                                                        <th
                                                            v-if="
                                                                cotization.is_ordered ==
                                                                1
                                                            "
                                                            class="hidden w-1/6 min-w-[160px] text-lg font-bold text-white py-3 lg:py-4 px-3 lg:px-4"
                                                        >
                                                            Acciones
                                                        </th>
                                                        <th
                                                            v-else
                                                            class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 lg:py-4 px-3 lg:px-4"
                                                        >
                                                            Acciones
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="divide-y">
                                                    <tr
                                                        v-for="(
                                                            item, index
                                                        ) in cotizationItems"
                                                        :key="index"
                                                        class="border-b-2"
                                                    >
                                                        <td
                                                            class="text-center text-dark font-medium text-base py-3 px-2 bg-white border-grey-light hover:bg-gray-100"
                                                        >
                                                            {{
                                                                item.partNumber
                                                            }}
                                                        </td>
                                                        <td
                                                            class="text-center text-dark font-medium text-base py-3 px-2 bg-white border-grey-light hover:bg-gray-100"
                                                        >
                                                            {{ item.quantity }}
                                                        </td>
                                                        <td
                                                            class="text-center text-dark font-medium text-base py-3 px-2 bg-white border-grey-light hover:bg-gray-100"
                                                        >
                                                            {{
                                                                item.description
                                                            }}
                                                        </td>
                                                        <td
                                                            class="text-center text-dark font-medium text-base py-3 px-2 bg-white border-grey-light hover:bg-gray-100"
                                                        >
                                                            Q.{{
                                                                item.price
                                                                    .toFixed(2)
                                                                    .replace(
                                                                        /(\d)(?=(\d{3})+\.\d\d$)/g,
                                                                        "$1,"
                                                                    )
                                                            }}
                                                        </td>
                                                        <td
                                                            class="text-center text-dark font-medium text-base py-3 px-2 bg-white border-grey-light hover:bg-gray-100"
                                                        >
                                                            Q.{{
                                                                item.total
                                                                    .toFixed(2)
                                                                    .replace(
                                                                        /(\d)(?=(\d{3})+\.\d\d$)/g,
                                                                        "$1,"
                                                                    )
                                                            }}
                                                        </td>
                                                        <td
                                                            v-if="
                                                                cotization.is_ordered ==
                                                                1
                                                            "
                                                            class="hidden p-3 text-center"
                                                        >
                                                            <button
                                                                class="focus:ring-2 focus:ring-offset-2 focus:ring-red-400 text-sm leading-none text-gray-600 py-2 px-5 bg-gray-100 rounded focus:outline-none"
                                                                disabled
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
                                                        <td
                                                            v-else
                                                            class="text-center text-dark font-medium text-base py-3 px-2 bg-white border-grey-light"
                                                        >
                                                            <button
                                                                @click="
                                                                    $emit(
                                                                        'delete',
                                                                        item.id
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
                        <div
                            class="flex justify-end font-bold space-x-4 text-base border-t border-gray-100 px-5 py-2"
                        >
                            <div>Gran Total</div>
                            <div>
                                <span
                                    >Q.{{
                                        grandTotal
                                            .toFixed(2)
                                            .replace(
                                                /(\d)(?=(\d{3})+\.\d\d$)/g,
                                                "$1,"
                                            )
                                    }}</span
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-4 px-4" id="Resumen">
        <div class="my-4">
            <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-bold leading-none text-gray-900">
                        Resumen
                    </h3>
                </div>
                <div class="flex items-center justify-center">
                    <div class="container">
                        <section class="bg-white rounded-lg border">
                            <div class="container">
                                <div class="flex flex-wrap -mx-4">
                                    <div class="w-full px-4">
                                        <div
                                            class="max-w-full overflow-x-auto shadow-xl"
                                        >
                                            <table
                                                class="table-auto w-full rounded-lg overflow-hidden sm:shadow-xl"
                                            >
                                                <thead>
                                                    <tr
                                                        class="bg-zinc-900 text-center"
                                                    >
                                                        <th
                                                            class="w-1/6 min-w-[160px] text-lg font-bold text-white py-4 lg:py-4 px-3 lg:px-4 border-l border-transparent"
                                                        >
                                                            Número de Parte
                                                        </th>
                                                        <th
                                                            class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 lg:py-4 px-3 lg:px-4"
                                                        >
                                                            Cantidad
                                                        </th>
                                                        <th
                                                            class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 lg:py-4 px-3 lg:px-4"
                                                        >
                                                            Descripción
                                                        </th>
                                                        <th
                                                            class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 lg:py-4 px-3 lg:px-4"
                                                        >
                                                            Precio Unitario
                                                        </th>
                                                        <th
                                                            class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 lg:py-4 px-3 lg:px-4"
                                                        >
                                                            Descuento
                                                        </th>
                                                        <th
                                                            class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 lg:py-4 px-3 lg:px-4"
                                                        >
                                                            Total
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <ICalculateItem
                                                        v-for="(
                                                            item, index
                                                        ) in cotizationItems"
                                                        :cotization="cotization"
                                                        :item="item"
                                                        :key="index"
                                                        @item-update="
                                                            $emit(
                                                                'update-item',
                                                                $event
                                                            )
                                                        "
                                                    />
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div
                            class="flex justify-end font-bold space-x-4 text-base border-t border-gray-100 px-5 py-2"
                        >
                            <div>Gran Total</div>
                            <div>
                                <span
                                    >Q.{{
                                        grandTotal
                                            .toFixed(2)
                                            .replace(
                                                /(\d)(?=(\d{3})+\.\d\d$)/g,
                                                "$1,"
                                            )
                                    }}</span
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
