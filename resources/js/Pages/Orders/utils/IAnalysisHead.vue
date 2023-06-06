<script>
export default {
    props: {
        is: Function,
    },
};
</script>
<template>
    <thead>
        <tr class="bg-primary text-center">
            <th
                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 px-16"
            >
                Parte
            </th>
            <th
                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 px-16"
            >
                Descripción
            </th>
            <th
                v-if="is('Admin')"
                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 px-16"
            >
                ene
            </th>
            <th
                v-if="is('Admin')"
                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 px-16"
            >
                feb
            </th>
            <th
                v-if="is('Admin')"
                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 px-16"
            >
                mar
            </th>
            <th
                v-if="is('Admin')"
                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 px-16"
            >
                abr
            </th>
            <th
                v-if="is('Admin')"
                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 px-16"
            >
                may
            </th>
            <th
                v-if="is('Admin')"
                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 px-16"
            >
                jun
            </th>
            <th
                v-if="is('Admin')"
                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 px-16"
            >
                jul
            </th>
            <th
                v-if="is('Admin')"
                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 px-16"
            >
                ago
            </th>
            <th
                v-if="is('Admin')"
                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 px-16"
            >
                sep
            </th>
            <th
                v-if="is('Admin')"
                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 px-16"
            >
                oct
            </th>
            <th
                v-if="is('Admin')"
                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 px-16"
            >
                nov
            </th>
            <th
                v-if="is('Admin')"
                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-3 px-16"
            >
                dic
            </th>
            <th
                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-1 px-2"
            >
                Stock
            </th>
            <th
                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-1 px-2"
            >
                Cantidad Mínima
            </th>
            <th
                v-if="is('Admin')"
                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-1 px-2"
            >
                Rotación
            </th>
            <th
                v-if="is('Admin')"
                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-1 px-2"
            >
                Liquidación
            </th>
            <th
                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-1 px-2"
            >
                Pronóstico Mensual
            </th>
            <th
                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-1 px-2"
            >
                Pronóstico Trimestral
            </th>
            <th
                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-1 px-2"
            >
                Faltante Mensual
            </th>
            <th
                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-1 px-2"
            >
                Faltante Trimestral
            </th>
            <th
                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-1 px-2"
            >
                Sugerencia Vendedor
            </th>
            <th
                v-if="$page.props.user.id == 1"
                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-1 px-2"
            >
                Sugerencia Vendedor
            </th>
            <th
                v-if="$page.props.user.id == 1"
                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-1 px-2"
            >
                Sugerencia Vendedor
            </th>
            <th
                v-if="is('Admin')"
                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-1 px-2"
            >
                Acciones
            </th>
        </tr>
    </thead>
</template>
