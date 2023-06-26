<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import AppDashboard from "../../Layouts/AppDashboard.vue";
import IFooter from "../Cotization/utils/IFooter.vue";
import IAnalysis from "./IAnalysis.vue";
import Swal from "sweetalert2";
import { useForm } from "@inertiajs/inertia-vue3";
export default {
    components: {
        AppLayout,
        AppDashboard,
        IFooter,
        IAnalysis,
    },
    props: {
        errors: Object,
        orderItems: Object,
        item: Object,
        search: String,
        settlements: Array,
        order: {
            type: Object,
            default: () => ({
                id: 0,
                name: "",
                items: [],
            }),
        },
    },
    data() {
        return {
            items: {
                data: [],
            },
            form: {
                orderId: 0,
                name: "",
                file: "",
                stockFile: "",
                amountFile: "",
            },
        };
    },
    mounted() {
        this.form = useForm(this.form);
        this.getOrder();
    },
    watch: {
        order() {
            this.getOrder();
        },
    },
    methods: {
        getOrder() {
            if (this.order) {
                this.form.orderId = this.order.id;
                this.form.name = this.order.name;
                this.items = this.orderItems;
            }
        },
        clearFileInput() {
            const fileInput = document.getElementById("file");
            fileInput.value = null;
        },
        clearFileStockInput() {
            const stockFileInput = document.getElementById("stockFile");
            stockFileInput.value = null;
        },
        clearFileAmountInput() {
            const amountFileInput = document.getElementById("amountFile");
            amountFileInput.value = null;
        },
        clearForm() {
            this.clearFileInput();
            this.clearFileStockInput();
            this.clearFileAmountInput();
        },
        submit() {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "Asegúrate que el Pedido este completo.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#FFCC00",
                cancelButtonColor: "#d33",
                confirmButtonText: "¡Si, adjuntar al Pedido!",
                cancelButtonText: "Cancelar",
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$inertia.post(route("orders.store"), this.form, {
                        forceFormData: true,
                        preserveScroll: true,
                        onSuccess: () => {
                            Swal.fire({
                                title: "¡Actualización del Pedido!",
                                text: "Se ha agregado exitosamente.",
                                icon: "success",
                                confirmButtonColor: "#FFCC00",
                            });
                            this.clearForm();
                        },
                    });
                }
            });
        },
        updateItem(item) {
            const index = this.items.data.findIndex((i) => i.id === item.id);
            this.items.data[index] = item;
        },
        updateAnalysis() {
            this.$inertia.post(
                route("order.items.update", {
                    id: this.order.id,
                    _method: "PUT",
                }),
                {
                    items: this.items.data,
                    page: this.items.current_page,
                },
                {
                    forceFormData: true,
                    preserveScroll: true,
                    onSuccess: (e) => {
                        console.log(e);
                    },
                }
            );
        },
    },
};
</script>
<template>
    <AppLayout class="w-full" title="IData">
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
                                            Datos del Pedido
                                        </h3>
                                    </div>
                                    <div class="flow-root">
                                        <div
                                            class="max-w-full mx-auto bg-white pt-6 pr-6 pl-6"
                                        >
                                            <form @submit.prevent="submit">
                                                <div
                                                    class="grid gap-6 mb-6 lg:grid-cols-4"
                                                >
                                                    <div>
                                                        <label
                                                            for="name"
                                                            class="block mb-2 text-base font-medium text-gray-900"
                                                            >Pedido</label
                                                        >
                                                        <input
                                                            v-if="is('Admin')"
                                                            v-model="form.name"
                                                            type="text"
                                                            id="name"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5"
                                                            placeholder=""
                                                        />
                                                        <input
                                                            v-if="is('Seller')"
                                                            v-model="form.name"
                                                            type="text"
                                                            id="name"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5"
                                                            placeholder=""
                                                            disabled
                                                        />
                                                    </div>
                                                    <div>
                                                        <label
                                                            for="file"
                                                            class="block mb-2 text-base font-medium text-gray-900"
                                                            >Archivo de Data
                                                        </label>
                                                        <input
                                                            v-if="is('Admin')"
                                                            type="file"
                                                            id="file"
                                                            name="file"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5"
                                                            accept=".xlsx,.xls"
                                                            @change="
                                                                (e) =>
                                                                    (form.file =
                                                                        e.target.files[0])
                                                            "
                                                        />
                                                        <input
                                                            v-if="is('Seller')"
                                                            type="file"
                                                            id="file"
                                                            name="file"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5"
                                                            accept=".xlsx,.xls"
                                                            disabled
                                                        />
                                                    </div>
                                                    <div>
                                                        <label
                                                            for="stockFile"
                                                            class="block mb-2 text-base font-medium text-gray-900"
                                                            >Archivo de Stock
                                                        </label>
                                                        <input
                                                            v-if="is('Admin')"
                                                            type="file"
                                                            id="stockFile"
                                                            name="stockFile"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5"
                                                            accept=".xlsx,.xls"
                                                            @change="
                                                                (e) =>
                                                                    (form.stockFile =
                                                                        e.target.files[0])
                                                            "
                                                        />
                                                        <input
                                                            v-if="is('Seller')"
                                                            type="file"
                                                            id="stockFile"
                                                            name="stockFile"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5"
                                                            accept=".xlsx,.xls"
                                                            disabled
                                                        />
                                                    </div>
                                                    <div>
                                                        <label
                                                            for="amountFile"
                                                            class="block mb-2 text-base font-medium text-gray-900"
                                                            >Archivo de Cantidad
                                                            Mínima
                                                        </label>
                                                        <input
                                                            v-if="is('Admin')"
                                                            type="file"
                                                            id="amountFile"
                                                            name="amountFile"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5"
                                                            accept=".xlsx,.xls"
                                                            @change="
                                                                (e) =>
                                                                    (form.amountFile =
                                                                        e.target.files[0])
                                                            "
                                                        />
                                                        <input
                                                            v-if="is('Seller')"
                                                            type="file"
                                                            id="amountFile"
                                                            name="amountFile"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5"
                                                            accept=".xlsx,.xls"
                                                            disabled
                                                        />
                                                    </div>
                                                </div>
                                                <button
                                                    v-if="is('Admin')"
                                                    type="submit"
                                                    class="text-white bg-zinc-900 hover:bg-yellow-400 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                                                >
                                                    Guardar
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-if="order">
                            <IAnalysis
                                :is="is"
                                :order-items="items"
                                :order="order"
                                :item="item"
                                :search="search"
                                :settlements="settlements"
                                @update-item="updateItem($event)"
                                @delete="deleteItem($event)"
                                @update-analysis="updateAnalysis()"
                            />
                        </div>
                    </main>
                    <br />
                    <IFooter />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
