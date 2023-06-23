<script>
import Swal from "sweetalert2";
export default {
    props: {
        is: Function,
        order: Object,
        item: Object,
        settlements: Array,
    },
    data() {
        return {
            partNumber: "",
            partNumbers: [],
            itemable: {},
        };
    },
    computed: {
        monthlyMissing() {
            return this.itemable.stock - this.itemable.monthlyForecast;
        },
        shortfallQuarterly() {
            return this.itemable.stock - this.itemable.quarterlyForecast;
        },
        firstRotation() {
            if (
                this.itemable.ene + this.itemable.feb + this.itemable.mar >=
                1
            ) {
                return "T";
            } else {
                return "";
            }
        },
        SecondRotation() {
            if (
                this.itemable.abr + this.itemable.may + this.itemable.jun >=
                1
            ) {
                return "T";
            } else {
                return "";
            }
        },
        thirdRotation() {
            if (
                this.itemable.jul + this.itemable.ago + this.itemable.sep >=
                1
            ) {
                return "T";
            } else {
                return "";
            }
        },
        fourthRotation() {
            if (
                this.itemable.oct + this.itemable.nov + this.itemable.dic >=
                1
            ) {
                return "T";
            } else {
                return "";
            }
        },
        rotations() {
            return (
                this.firstRotation +
                this.SecondRotation +
                this.thirdRotation +
                this.fourthRotation
            );
        },
        settlementItems() {
            this.partNumbers = [];
            for (this.settlement of this.settlements) {
                this.partNumbers.push(this.settlement.partNumber);
            }
            return this.partNumbers;
        },
        isListed() {
            if (this.settlementItems.includes(this.item.partNumber)) {
                return "Listado";
            } else {
                return "No Listado";
            }
        },
    },
    methods: {
        updateItem() {
            this.itemable = {
                id: 0,
                ene: this.itemable.ene,
                feb: this.itemable.feb,
                mar: this.itemable.mar,
                abr: this.itemable.abr,
                may: this.itemable.may,
                jun: this.itemable.jun,
                jul: this.itemable.jul,
                ago: this.itemable.ago,
                sep: this.itemable.sep,
                oct: this.itemable.oct,
                nov: this.itemable.nov,
                dic: this.itemable.dic,
                stock: this.itemable.stock,
                rotation: this.rotations,
                monthlyForecast: this.itemable.monthlyForecast,
                quarterlyForecast: this.itemable.quarterlyForecast,
                missingMonthly: this.monthlyMissing,
                quarterlyShortfall: this.shortfallQuarterly,
                suggestion: this.itemable.suggestion,
                suggestionSeller: this.itemable.suggestionSeller,
                suggestionSeller3: this.itemable.suggestionSeller3,
                settlement: this.isListed,
            };
            this.$inertia.post(
                route("order_item.update", {
                    order_item_id: this.order.id,
                    id: this.item.id,
                    preserveScroll: true,
                }),
                this.itemable
            );
        },
        deleteItem(id) {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "Asegúrate que quieres eliminar este producto.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#FFCC00",
                cancelButtonColor: "#d33",
                confirmButtonText: "¡Si, eliminar del Pedido!",
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$inertia.delete(
                        route("order_item.delete", {
                            order_item_id: this.order.id,
                            id,
                        }),
                        {
                            onSuccess: () => {
                                Swal.fire({
                                    title: "¡Producto Eliminado!",
                                    text: "Producto eliminado exitosamente.",
                                    icon: "success",
                                    confirmButtonColor: "#FFCC00",
                                });
                            },
                        }
                    );
                }
            });
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
    <tr>
        <td
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border hover:bg-gray-100"
        >
            {{ item.partNumber }}
        </td>
        <td
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border hover:bg-gray-100"
        >
            {{ item.description }}
        </td>
        <td
            v-if="is('Admin')"
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border hover:bg-gray-100"
        >
            <input
                v-model="itemable.ene"
                @keydown.enter="updateItem"
                class="rounded-md border border-zinc-400 px-2 py-1 hover:border-yellow-400 focus:outline-none focus:ring focus:ring-yellow-400"
                type="number"
            />
        </td>
        <td
            v-if="is('Admin')"
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border hover:bg-gray-100"
        >
            <input
                v-model="itemable.feb"
                @keydown.enter="updateItem"
                class="rounded-md border border-zinc-400 px-2 py-1 hover:border-yellow-400 focus:outline-none focus:ring focus:ring-yellow-400"
                type="number"
            />
        </td>
        <td
            v-if="is('Admin')"
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
        >
            <input
                v-model="itemable.mar"
                @keydown.enter="updateItem"
                class="rounded-md border border-zinc-400 px-2 py-1 hover:border-yellow-400 focus:outline-none focus:ring focus:ring-yellow-400"
                type="number"
            />
        </td>
        <td
            v-if="is('Admin')"
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
        >
            <input
                v-model="itemable.abr"
                @keydown.enter="updateItem"
                class="rounded-md border border-zinc-400 px-2 py-1 hover:border-yellow-400 focus:outline-none focus:ring focus:ring-yellow-400"
                type="number"
            />
        </td>
        <td
            v-if="is('Admin')"
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
        >
            <input
                v-model="itemable.may"
                @keydown.enter="updateItem"
                class="rounded-md border border-zinc-400 px-2 py-1 hover:border-yellow-400 focus:outline-none focus:ring focus:ring-yellow-400"
                type="number"
            />
        </td>
        <td
            v-if="is('Admin')"
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
        >
            <input
                v-model="itemable.jun"
                @keydown.enter="updateItem"
                class="rounded-md border border-zinc-400 px-2 py-1 hover:border-yellow-400 focus:outline-none focus:ring focus:ring-yellow-400"
                type="number"
            />
        </td>
        <td
            v-if="is('Admin')"
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
        >
            <input
                v-model="itemable.jul"
                @keydown.enter="updateItem"
                class="rounded-md border border-zinc-400 px-2 py-1 hover:border-yellow-400 focus:outline-none focus:ring focus:ring-yellow-400"
                type="number"
            />
        </td>
        <td
            v-if="is('Admin')"
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
        >
            <input
                v-model="itemable.ago"
                @keydown.enter="updateItem"
                class="rounded-md border border-zinc-400 px-2 py-1 hover:border-yellow-400 focus:outline-none focus:ring focus:ring-yellow-400"
                type="number"
            />
        </td>
        <td
            v-if="is('Admin')"
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
        >
            <input
                v-model="itemable.sep"
                @keydown.enter="updateItem"
                class="rounded-md border border-zinc-400 px-2 py-1 hover:border-yellow-400 focus:outline-none focus:ring focus:ring-yellow-400"
                type="number"
            />
        </td>
        <td
            v-if="is('Admin')"
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
        >
            <input
                v-model="itemable.oct"
                @keydown.enter="updateItem"
                class="rounded-md border border-zinc-400 px-2 py-1 hover:border-yellow-400 focus:outline-none focus:ring focus:ring-yellow-400"
                type="number"
            />
        </td>
        <td
            v-if="is('Admin')"
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
        >
            <input
                v-model="itemable.nov"
                @keydown.enter="updateItem"
                class="rounded-md border border-zinc-400 px-2 py-1 hover:border-yellow-400 focus:outline-none focus:ring focus:ring-yellow-400"
                type="number"
            />
        </td>
        <td
            v-if="is('Admin')"
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
        >
            <input
                v-model="itemable.dic"
                @keydown.enter="updateItem"
                class="rounded-md border border-zinc-400 px-2 py-1 hover:border-yellow-400 focus:outline-none focus:ring focus:ring-yellow-400"
                type="number"
            />
        </td>
        <td
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border hover:bg-gray-100"
        >
            <input
                v-if="is('Admin')"
                v-model="itemable.stock"
                @keydown.enter="updateItem"
                :class="[
                    'rounded-md px-2 py-1 hover:border-yellow-400 focus:ring',
                    item.minimumAmount > itemable.stock
                        ? 'border-red-400 text-red-400 focus:border-red-400 focus:ring-red-400'
                        : 'border-zinc-400 focus:border-zinc-400 focus:ring-yellow-400',
                ]"
                type="number"
            />
            <input
                v-if="is('Seller')"
                v-model="itemable.stock"
                @keydown.enter="updateItem"
                class="rounded-md border border-zinc-400 px-2 py-1 hover:border-yellow-400 focus:outline-none focus:ring focus:ring-yellow-400"
                type="number"
                disabled
            />
        </td>
        <td
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border hover:bg-gray-100"
        >
            {{ item.minimumAmount }}
        </td>
        <td
            v-if="is('Admin')"
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border hover:bg-gray-100"
        >
            {{ itemable.rotation }}
        </td>
        <td
            v-if="is('Admin')"
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
        >
            {{ this.isListed }}
        </td>
        <td
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
        >
            {{ Math.round(itemable.monthlyForecast) }}
        </td>
        <td
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
        >
            {{ Math.round(itemable.quarterlyForecast) }}
        </td>
        <td
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
        >
            {{ Math.round(itemable.missingMonthly) }}
        </td>
        <td
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
        >
            {{ Math.round(itemable.quarterlyShortfall) }}
        </td>
        <td
            v-if="$page.props.user.id == 2"
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
        >
            <input
                v-model="itemable.suggestion"
                @keydown.enter="updateItem"
                class="rounded-md border border-zinc-400 px-2 py-1 hover:border-yellow-400 focus:outline-none focus:ring focus:ring-yellow-400"
                type="number"
            />
        </td>
        <td
            v-if="$page.props.user.id == 1"
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
        >
            <input
                v-model="itemable.suggestion"
                class="rounded-md border border-zinc-400 px-2 py-1 hover:border-yellow-400 focus:outline-none focus:ring focus:ring-yellow-400"
                type="number"
                disabled
            />
        </td>
        <td
            v-if="$page.props.user.id == 3"
            class="hidden text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
        ></td>
        <td
            v-if="$page.props.user.id == 3"
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
        >
            <input
                v-model="itemable.suggestionSeller"
                @keydown.enter="updateItem"
                class="rounded-md border border-zinc-400 px-2 py-1 hover:border-yellow-400 focus:outline-none focus:ring focus:ring-yellow-400"
                type="number"
            />
        </td>
        <td
            v-if="$page.props.user.id == 4"
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
        >
            <input
                v-model="itemable.suggestionSeller3"
                @keydown.enter="updateItem"
                class="rounded-md border border-zinc-400 px-2 py-1 hover:border-yellow-400 focus:outline-none focus:ring focus:ring-yellow-400"
                type="number"
            />
        </td>
        <td
            v-if="$page.props.user.id == 1"
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
        >
            <input
                v-model="itemable.suggestionSeller"
                class="rounded-md border border-zinc-400 px-2 py-1 hover:border-yellow-400 focus:outline-none focus:ring focus:ring-yellow-400"
                type="number"
                disabled
            />
        </td>
        <td
            v-if="$page.props.user.id == 2"
            class="hidden text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
        ></td>
        <td
            v-if="$page.props.user.id == 1"
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
        >
            <input
                v-model="itemable.suggestionSeller3"
                class="rounded-md border border-zinc-400 px-2 py-1 hover:border-yellow-400 focus:outline-none focus:ring focus:ring-yellow-400"
                type="number"
                disabled
            />
        </td>
        <td
            v-if="is('Admin')"
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
        >
            <button
                @click="deleteItem(item.id)"
                class="focus:ring-2 focus:ring-offset-2 focus:ring-red-400 text-sm leading-none text-gray-600 py-2 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none"
            >
                <l-icon icon="fa-solid fa-trash-can-arrow-up" class="text-xl" />
            </button>
        </td>
    </tr>
</template>
