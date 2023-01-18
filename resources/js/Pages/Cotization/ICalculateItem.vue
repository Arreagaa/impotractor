<script>
export default {
    props: {
        item: Object,
        cotization: Object,
    },
    data() {
        return {
            itemable: {
                id: 0,
                percentage: 0,
                total_unit: 0,
                total: 0,
            },
        };
    },
    created() {
        this.calculate();
    },
    methods: {
        updateItem() {
            this.itemable.total =
                parseFloat(this.itemable.percentage) *
                parseFloat(this.itemable.total_unit);

            console.log(this.itemable);
        },
        calculate() {
            // ac{a}
        },
    },
    watch: {
        itemable: {
            handler: function (val) {
                this.itemable.total = val.total;
                this.itemable.total_unit = val.total_unit;
                this.itemable.total = val.total;
            },
            deep: true,
            immediate: true,
        },
    },
};
</script>
<template>
    <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
        <td class="border-grey-light border hover:bg-gray-100 p-3 text-center">
            {{ item.partNumber }}
        </td>
        <td class="border-grey-light border hover:bg-gray-100 p-3 text-center">
            {{ item.quantity }}
        </td>
        <td class="border-grey-light border hover:bg-gray-100 p-3 text-center">
            {{ item.description }}
        </td>
        <td class="border-grey-light border hover:bg-gray-100 p-3 text-center">
            Q.{{ item.price }}
        </td>

        <td class="border-grey-light border hover:bg-gray-100 p-3 text-left">
            <div class="flex">
                <input
                    v-model="itemable.percentage"
                    class="w-full rounded-sm rounded-l-lg border border-zinc-400 px-2 py-1 hover:border-yellow-400 focus:outline-none focus:ring focus:ring-yellow-400"
                    type="number"
                    @keydown.enter="updateItem"
                />
                <span
                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-r-md dark:bg-gray-600"
                >
                    %
                </span>
            </div>
        </td>
        <td class="border-grey-light border hover:bg-gray-100 p-3 text-center">
            Q.{{ itemable.total_unit }}
        </td>
        <td class="border-grey-light border hover:bg-gray-100 p-3 text-center">
            Q.{{ itemable.total }}
        </td>
    </tr>
</template>
<style></style>
