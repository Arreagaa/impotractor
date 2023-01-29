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
            },
        };
    },
    computed: {
        discount() {
            return (this.itemable.total * this.itemable.percentage) / 100;
        },
    },
    methods: {
        updateItem() {
            this.itemable.total = this.itemable.total - this.discount;
            this.$inertia.post(
                route("cotization_item.update", {
                    cotization_id: this.cotization.id,
                    id: this.item.id,
                    preserveScroll: true,
                }),
                this.itemable
            );
        },
    },
    watch: {
        item: {
            handler: function (val) {
                this.itemable = val;
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
            Q.{{
                item.price.toFixed(2).replace(/(\d)(?=(\d{3})+\.\d\d$)/g, "$1,")
            }}
        </td>

        <td class="border-grey-light border hover:bg-gray-100 p-3 text-left">
            <div class="flex">
                <input
                    v-if="cotization.is_ordered == 1"
                    v-model="itemable.percentage"
                    class="w-full rounded-sm rounded-l-lg border border-zinc-400 px-2 py-1 hover:border-yellow-400 focus:outline-none focus:ring focus:ring-yellow-400"
                    type="number"
                    @keydown.enter="updateItem"
                    disabled
                />
                <input
                    v-else
                    v-model="itemable.percentage"
                    class="w-full rounded-sm rounded-l-lg border border-zinc-400 px-2 py-1 hover:border-yellow-400 focus:outline-none focus:ring focus:ring-yellow-400"
                    type="number"
                    @keydown.enter="updateItem"
                />
                <span
                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-r-md"
                >
                    %
                </span>
            </div>
        </td>
        <td class="border-grey-light border hover:bg-gray-100 p-3 text-center">
            Q.{{
                itemable.total
                    .toFixed(2)
                    .replace(/(\d)(?=(\d{3})+\.\d\d$)/g, "$1,")
            }}
        </td>
    </tr>
</template>
