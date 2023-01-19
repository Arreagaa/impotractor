<script>
import ICalculateItem from "./ICalculateItem.vue";

export default {
    props: {
        cotizationItems: Array,
        cotization: Object,
    },
    components: {
        ICalculateItem,
    },
};
</script>
<template>
    <div class="pt-4 px-4" id="Calculator">
        <div class="my-4">
            <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-bold leading-none text-gray-900">
                        Calculadora
                    </h3>
                </div>
                <div class="flex items-center justify-center">
                    <div class="container">
                        <table
                            class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg"
                        >
                            <thead class="text-white">
                                <tr
                                    class="bg-zinc-900 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0"
                                >
                                    <th class="p-3 text-center">
                                        Número de Parte
                                    </th>
                                    <th class="p-3 text-center">Cantidad</th>
                                    <th class="p-3 text-center">Descripción</th>
                                    <th class="p-3 text-center">P. Unitario</th>
                                    <th class="p-3 text-center">Total</th>
                                    <th class="p-3 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="flex-1 sm:flex-none divide-y">
                                <tr
                                    class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 border-b-2"
                                    v-for="(item, index) in cotizationItems"
                                    :key="index"
                                >
                                    <td class="p-3 text-center">
                                        {{ item.partNumber }}
                                    </td>
                                    <td class="p-3 text-center">
                                        {{ item.quantity }}
                                    </td>
                                    <td class="p-3 text-center">
                                        {{ item.description }}
                                    </td>
                                    <td class="p-3 text-center">
                                        Q.{{ item.price.toFixed(2) }}
                                    </td>
                                    <td class="p-3 text-center">
                                        Q.{{ item.total }}
                                    </td>
                                    <td class="p-3 text-center">
                                        <button
                                            @click="$emit('delete', item.id)"
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
                        <br />
                        <div
                            class="flex justify-end font-bold space-x-4 text-base border-t border-gray-100 px-5 py-2"
                        >
                            <div>Gran Total</div>
                            <div>
                                <span>Q.500.00</span>
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
                        <table
                            class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg"
                        >
                            <thead class="text-white">
                                <tr
                                    class="bg-zinc-900 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0"
                                >
                                    <th class="p-3 text-center">
                                        Número de Parte
                                    </th>
                                    <th class="p-3 text-center">Cantidad</th>
                                    <th class="p-3 text-center">Descripción</th>
                                    <th class="p-3 text-center">
                                        Precio Unitario
                                    </th>
                                    <th class="p-3 text-center">Porcentaje</th>
                                    <th class="p-3 text-center">
                                        Total Unitario
                                    </th>
                                    <th class="p-3 text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody class="flex-1 sm:flex-none">
                                <ICalculateItem
                                    v-for="(item, index) in cotizationItems"
                                    :cotization="cotization"
                                    :item="item"
                                    :key="index"
                                    @item-update="$emit('update-item', $event)"
                                />
                            </tbody>
                        </table>
                        <div
                            class="flex justify-end font-bold space-x-4 text-base border-t border-gray-100 px-5 py-2"
                        >
                            <div>Gran Total</div>
                            <div>
                                <span>Q.700.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
