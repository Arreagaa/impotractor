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
            timeout: null,
        };
    },
    computed: {
        monthlyForecast() {
            return (
                (this.itemable.ene +
                    this.itemable.feb +
                    this.itemable.mar +
                    this.itemable.abr +
                    this.itemable.may +
                    this.itemable.jun +
                    this.itemable.jul +
                    this.itemable.ago +
                    this.itemable.sep +
                    this.itemable.oct +
                    this.itemable.nov +
                    this.itemable.dic) /
                12
            );
        },
        quarterlyForecast() {
            return this.monthlyForecast * 3;
        },
        monthlyMissing() {
            return this.itemable.stock - this.monthlyForecast;
        },
        shortfallQuarterly() {
            return this.itemable.stock - this.quarterlyForecast;
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
            clearTimeout(this.timeout);
            this.timeout = setTimeout(() => {
                this.itemable = {
                    ...this.itemable,
                    rotation: this.rotations,
                    missingMonthly: this.monthlyMissing,
                    quarterlyShortfall: this.shortfallQuarterly,
                    settlement: this.isListed,
                };
                this.$emit("update-item", this.itemable);
            }, 500);
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
                @input="updateItem"
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
                @input="updateItem"
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
                @input="updateItem"
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
                @input="updateItem"
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
                @input="updateItem"
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
                @input="updateItem"
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
                @input="updateItem"
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
                @input="updateItem"
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
                @input="updateItem"
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
                @input="updateItem"
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
                @input="updateItem"
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
                @input="updateItem"
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
                @input="updateItem"
                :class="[
                    'rounded-md px-2 py-1 hover:border-yellow-400 focus:ring',
                    itemable.minimumAmount > itemable.stock
                        ? 'border-red-400 text-red-400 focus:border-red-400 focus:ring-red-400'
                        : 'border-zinc-400 focus:border-zinc-400 focus:ring-yellow-400',
                ]"
                type="number"
            />
            <input
                v-if="is('Seller')"
                v-model="itemable.stock"
                @input="updateItem"
                class="rounded-md border border-zinc-400 px-2 py-1 hover:border-yellow-400 focus:outline-none focus:ring focus:ring-yellow-400"
                type="number"
                disabled
            />
        </td>
        <td
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border hover:bg-gray-100"
        >
            {{ itemable.minimumAmount }}
        </td>
        <td
            v-if="is('Admin')"
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border hover:bg-gray-100"
        >
            {{ rotations }}
        </td>
        <td
            v-if="is('Admin')"
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
        >
            {{ isListed }}
        </td>
        <td
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
        >
            {{ monthlyForecast.toFixed(2) }}
        </td>
        <td
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
        >
            {{ quarterlyForecast.toFixed(2) }}
        </td>
        <td
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
        >
            {{ monthlyMissing.toFixed(2) }}
        </td>
        <td
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
        >
            {{ shortfallQuarterly.toFixed(2) }}
        </td>
        <td
            v-if="$page.props.user.id == 2"
            class="text-center text-zinc-900 font-medium text-base py-3 px-2 bg-white border-grey-light border"
        >
            <input
                v-model="itemable.suggestion"
                @input="updateItem"
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
                @input="updateItem"
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
                @input="updateItem"
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
