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
                class="w-1/6 min-w-[160px] text-lg font-bold text-white py-1 px-2"
            >
                Acciones
            </th>
        </tr>
    </thead>
</template>
