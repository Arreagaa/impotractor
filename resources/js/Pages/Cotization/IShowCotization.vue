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
                                    <th class="p-3 text-left">
                                        Número de Parte
                                    </th>
                                    <th class="p-3 text-left">Cantidad</th>
                                    <th class="p-3 text-left">Descripción</th>
                                    <th class="p-3 text-left">
                                        Peso neto (Lb)
                                    </th>
                                    <th class="p-3 text-left">Precio ($)</th>
                                    <th class="p-3 text-left">Precio (Q)</th>
                                    <th class="p-3 text-left">DAI</th>
                                    <th class="p-3 text-left">IVA</th>
                                    <th class="p-3 text-left">P. Unitario</th>
                                    <th class="p-3 text-left">Total</th>
                                </tr>
                            </thead>
                            <tbody class="flex-1 sm:flex-none">
                                <tr
                                    class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0"
                                    v-for="(item, index) in cotizationItems"
                                    :key="index"
                                >
                                    <td>{{ item.partNumber }}</td>
                                    <td>{{ item.quantity }}</td>
                                    <td>{{ item.description }}</td>
                                    <td>{{ item.weightUnit }}</td>
                                    <td>{{ item.price }}</td>
                                    <td @click="$emit('delete', item.id)">
                                        {{ item.name }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- total amount -->
                        <div
                            class="flex justify-end font-bold space-x-4 text-base border-t border-gray-100 px-5 py-2"
                        >
                            <div>Gran Total</div>
                            <div>
                                <span>500.00</span>
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
                    <div class="container lg:block hidden">
                        <table
                            class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg"
                        >
                            <thead
                                class="w-full data overflow-hidden bg-white text-zinc-900"
                            >
                                <tr>
                                    <th colspan="3" class="p-2 border">
                                        Información Importante
                                    </th>
                                    <th colspan="2" class="p-2 border">
                                        Precio a (35%)
                                    </th>
                                    <th colspan="2" class="p-2 border">
                                        Precio a (30%)
                                    </th>
                                    <th colspan="2" class="p-2 border">
                                        Precio a (25%)
                                    </th>
                                    <th colspan="3" class="p-2 border">
                                        Precio Final
                                    </th>
                                </tr>
                            </thead>

                            <thead class="text-white">
                                <tr
                                    class="bg-zinc-900 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0"
                                >
                                    <th class="p-3 text-left">
                                        Número de Parte
                                    </th>
                                    <th class="p-3 text-left">Cantidad</th>
                                    <th class="p-3 text-left">Descripción</th>
                                    <th class="p-3 text-left">P. Unitario</th>
                                    <th class="p-3 text-left">Total</th>
                                    <th class="p-3 text-left">P. Unitario</th>
                                    <th class="p-3 text-left">Total</th>
                                    <th class="p-3 text-left">P. Unitario</th>
                                    <th class="p-3 text-left">Total</th>
                                    <th class="p-3 text-left">Porcentaje</th>
                                    <th class="p-3 text-left">Unitario</th>
                                    <th class="p-3 text-left">Total</th>
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
                        <!-- total amount -->
                        <div
                            class="flex justify-end font-bold space-x-4 text-base border-t border-gray-100 px-5 py-2"
                        >
                            <div>Gran Total</div>
                            <div>
                                <span>500.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="container lg:hidden">
                        <table
                            class="flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg"
                        >
                            <thead class="text-white">
                                <tr
                                    class="bg-zinc-900 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0"
                                >
                                    <th class="p-3 text-left">
                                        Número de Parte
                                    </th>
                                    <th class="p-3 text-left">Cantidad</th>
                                    <th class="p-3 text-left">Descripción</th>
                                    <th class="p-3 text-left">
                                        P. Unitario (35%)
                                    </th>
                                    <th class="p-3 text-left">Total (35%)</th>
                                    <th class="p-3 text-left">
                                        P. Unitario (30%)
                                    </th>
                                    <th class="p-3 text-left">Total (30%)</th>
                                    <th class="p-3 text-left">
                                        P. Unitario (25%)
                                    </th>
                                    <th class="p-3 text-left">Total (25%)</th>
                                    <th class="p-3 text-left">
                                        Porcentaje Final
                                    </th>
                                    <th class="p-3 text-left">
                                        Unitario Final
                                    </th>
                                    <th class="p-3 text-left">Total Final</th>
                                </tr>
                            </thead>
                            <tbody class="flex-1 sm:flex-none">
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
                                </tr>
                            </tbody>
                        </table>
                        <!-- total amount -->
                        <div
                            class="flex justify-end font-bold space-x-4 text-base border-t border-gray-100 px-5 py-2"
                        >
                            <div>Gran Total</div>
                            <div>
                                <span>500.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
