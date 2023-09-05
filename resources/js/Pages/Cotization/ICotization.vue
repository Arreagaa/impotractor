<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import AppDashboard from "../../Layouts/AppDashboard.vue";
import IShowCotization from "./IShowCotization.vue";
import IModal from "../Order/IModal.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import IBtn from "../Order/utils/IBtn.vue";
import Swal from "sweetalert2";
import IClient from "../Order/IClient.vue";
import IFooter from "./utils/IFooter.vue";

export default {
    components: {
        AppLayout,
        AppDashboard,
        IShowCotization,
        IModal,
        IClient,
        IFooter,
        IBtn,
    },
    props: {
        errors: Object,
        cotization: {
            type: Object,
            default: () => ({
                id: 0,
                reference: "",
                is_ordered: false,
                provider_code: "",
                rate: 0,
                transport: "",
                items: [],
            }),
        },
    },
    data() {
        return {
            items: [],
            itemsUpdate: [],
            totalGrand: 0,
            oldGrand: 0,
            invalidPhone: false,
            form: {
                cotizationId: 0,
                reference: "",
                is_ordered: false,
                provider_code: "",
                rate: 7.75,
                transport: "Elegir Cotización",
                /*ITEMS*/
                partNumber: "",
                quantity: 0,
                description: "",
                price: 0,
            },
            formOrder: {
                cotizationId: 0,
                nit: "",
                client: "",
                contact: "",
                phone: "",
                email: "",
                city: "",
                paymentMethod: "",
                type: "",
                discount: 0,
            },
            alertSuccess: false,
        };
    },
    computed: {
        grandTotal() {
            this.totalGrand = 0;
            for (this.item of this.items) {
                this.totalGrand = this.totalGrand + this.item.total;
            }
            return this.totalGrand;
        },
        oldGrandTotal() {
            this.oldGrand = 0;
            for (this.item of this.items) {
                this.oldGrand = this.oldGrand + this.item.oldTotal;
            }
            return this.oldGrand;
        },
    },
    mounted() {
        this.form = useForm(this.form);
        this.getCotization();
    },
    watch: {
        cotization() {
            this.getCotization();
        },
    },
    methods: {
        getCotization() {
            if (this.cotization) {
                this.form.cotizationId = this.cotization.id;
                this.form.reference = this.cotization.reference;
                this.form.is_ordered = this.cotization.is_ordered;
                this.form.provider_code = this.cotization.provider_code;
                this.form.rate = this.cotization.rate;
                this.form.transport = this.cotization.transport;
                this.items = this.cotization.items;
                this.order = this.cotization.order;
            }
        },
        submit() {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "Asegúrate que la Cotización esté completa.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#FFCC00",
                cancelButtonColor: "#d33",
                confirmButtonText: "¡Sí, adjuntar a la Cotización!",
                cancelButtonText: "Cancelar",
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$inertia.post(route("cotizations.store"), this.form, {
                        forceFormData: true,
                        preserveScroll: true,
                        onSuccess: () => {
                            this.showSuccessAlert(
                                "¡Actualización de Cotización!",
                                "Se ha agregado exitosamente."
                            );
                            this.clearForm();
                        },
                    });
                }
            });
        },
        cotizationOrder() {
            this.formOrder.cotizationId = this.form.cotizationId;
            this.formOrder.type = this.form.transport;
            this.formOrder.discount = this.oldGrandTotal;

            if (!/^(\+\d{1,3})?\d{4}[- ]?\d{4}$/.test(this.formOrder.phone)) {
                this.invalidPhone = true;
                return;
            }
            this.$inertia.post(
                route("cotizations.order", {
                    id: this.form.cotizationId,
                    type: this.form.transport,
                    discount: this.oldGrandTotal,
                }),
                this.formOrder,
                {
                    forceFormData: true,
                }
            );
        },
        updateItem(item) {
            this.itemsUpdate.push(item);
        },
        deleteItem(id) {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "Asegúrate que quieres eliminar este producto.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#FFCC00",
                cancelButtonColor: "#d33",
                confirmButtonText: "¡Sí, eliminar de Cotización!",
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$inertia.delete(
                        route("cotization_item.delete", {
                            cotization_id: this.form.cotizationId,
                            id,
                        }),
                        {
                            onSuccess: () => {
                                this.showSuccessAlert(
                                    "¡Producto Eliminado!",
                                    "Producto eliminado exitosamente."
                                );
                            },
                        }
                    );
                }
            });
        },
        clearForm() {
            this.form.partNumber = "";
            this.form.quantity = 0;
            this.form.description = "";
            this.form.price = 0;
        },
        showSuccessAlert(title, text) {
            Swal.fire({
                title: title,
                text: text,
                icon: "success",
                confirmButtonColor: "#FFCC00",
                showConfirmButton: true,
            });
        },
    },
};
</script>
<template>
    <AppLayout class="w-full" title="Cotizaciones">
        <div>
            <div class="flex overflow-hidden bg-white">
                <AppDashboard />
                <div
                    class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10"
                    id="sidebarBackdrop"
                ></div>
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
                                            Cotizador
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
                                                            for="reference"
                                                            class="block mb-2 text-base font-medium text-gray-900"
                                                            >Referencia de la
                                                            Cotización</label
                                                        >
                                                        <input
                                                            v-if="
                                                                form.is_ordered ==
                                                                1
                                                            "
                                                            v-model="
                                                                form.reference
                                                            "
                                                            type="text"
                                                            id="reference"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5"
                                                            placeholder=""
                                                            disabled
                                                        />
                                                        <input
                                                            v-else
                                                            v-model="
                                                                form.reference
                                                            "
                                                            type="text"
                                                            id="reference"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5"
                                                            placeholder=""
                                                            required
                                                        />
                                                    </div>
                                                    <div>
                                                        <label
                                                            for="proveedor"
                                                            class="block mb-2 text-base font-medium text-gray-900"
                                                            >Código del
                                                            proveedor</label
                                                        >
                                                        <input
                                                            v-if="
                                                                form.is_ordered ==
                                                                1
                                                            "
                                                            v-model="
                                                                form.provider_code
                                                            "
                                                            type="text"
                                                            id="proveedor"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5"
                                                            placeholder=""
                                                            disabled
                                                        />
                                                        <input
                                                            v-else
                                                            v-model="
                                                                form.provider_code
                                                            "
                                                            type="text"
                                                            id="proveedor"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5"
                                                            placeholder=""
                                                            required
                                                        />
                                                    </div>
                                                    <div>
                                                        <label
                                                            for="rate"
                                                            class="block mb-2 text-base font-medium text-gray-900"
                                                            >Tipo de
                                                            Cambio</label
                                                        >
                                                        <input
                                                            v-if="
                                                                form.is_ordered ==
                                                                1
                                                            "
                                                            v-model="form.rate"
                                                            type="number"
                                                            id="rate"
                                                            class="bg-gray-50 text-center border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5"
                                                            min="0.00"
                                                            placeholder="7.75"
                                                            step="0.01"
                                                            pattern="^\d+(?:\.\d{1,2})?$"
                                                            disabled
                                                        />
                                                        <input
                                                            v-else
                                                            v-model="form.rate"
                                                            type="number"
                                                            id="rate"
                                                            class="bg-gray-50 text-center border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5"
                                                            min="0.00"
                                                            placeholder="7.75"
                                                            step="0.01"
                                                            pattern="^\d+(?:\.\d{1,2})?$"
                                                            required
                                                        />
                                                    </div>
                                                    <div>
                                                        <label
                                                            for="transport"
                                                            class="block mb-2 text-base font-medium text-gray-900"
                                                            >Tipo de Cotización
                                                        </label>
                                                        <select
                                                            v-if="
                                                                form.is_ordered ==
                                                                1
                                                            "
                                                            v-model="
                                                                form.transport
                                                            "
                                                            id="transport"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5"
                                                            disabled
                                                        >
                                                            <option selected>
                                                                Elegir
                                                                Cotización
                                                            </option>
                                                            <option
                                                                value="Stock"
                                                            >
                                                                Stock
                                                            </option>
                                                            <option
                                                                value="Aereo"
                                                            >
                                                                Aéreo Express
                                                            </option>
                                                            <option
                                                                value="Reservado"
                                                            >
                                                                Reservado
                                                            </option>
                                                            <option
                                                                value="Reservado"
                                                            >
                                                                Courier
                                                            </option>
                                                        </select>
                                                        <select
                                                            v-else
                                                            v-model="
                                                                form.transport
                                                            "
                                                            id="transport"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5"
                                                        >
                                                            <option selected>
                                                                Elegir
                                                                Cotización
                                                            </option>
                                                            <option
                                                                value="Stock"
                                                            >
                                                                Stock
                                                            </option>
                                                            <option
                                                                value="Aereo"
                                                            >
                                                                Aéreo Express
                                                            </option>
                                                            <option
                                                                value="Reservado"
                                                            >
                                                                Reservado
                                                            </option>
                                                            <option
                                                                value="Reservado"
                                                            >
                                                                Courier
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div>
                                                        <label
                                                            for="Parte"
                                                            class="block mb-2 text-base font-medium text-gray-900"
                                                            >Número de
                                                            Parte</label
                                                        >
                                                        <input
                                                            v-if="
                                                                form.is_ordered ==
                                                                1
                                                            "
                                                            v-model="
                                                                form.partNumber
                                                            "
                                                            type="text"
                                                            id="Parte"
                                                            class="bg-gray-50 text-center border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5"
                                                            placeholder=""
                                                            disabled
                                                        />
                                                        <input
                                                            v-else
                                                            v-model="
                                                                form.partNumber
                                                            "
                                                            type="text"
                                                            id="Parte"
                                                            class="bg-gray-50 text-center border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5"
                                                            placeholder=""
                                                            required
                                                        />
                                                    </div>
                                                    <div>
                                                        <label
                                                            for="quantity"
                                                            class="block mb-2 text-base font-medium text-gray-900"
                                                            >Cantidad</label
                                                        >
                                                        <input
                                                            v-if="
                                                                form.is_ordered ==
                                                                1
                                                            "
                                                            v-model="
                                                                form.quantity
                                                            "
                                                            type="number"
                                                            id="quantity"
                                                            class="bg-gray-50 text-center border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5"
                                                            min="0"
                                                            placeholder=""
                                                            disabled
                                                        />
                                                        <input
                                                            v-else
                                                            v-model="
                                                                form.quantity
                                                            "
                                                            type="number"
                                                            id="quantity"
                                                            class="bg-gray-50 text-center border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5"
                                                            min="0"
                                                            placeholder=""
                                                            required
                                                        />
                                                    </div>
                                                    <div>
                                                        <label
                                                            for="description"
                                                            class="block mb-2 text-base font-medium text-gray-900"
                                                            >Descripción</label
                                                        >
                                                        <input
                                                            v-if="
                                                                form.is_ordered ==
                                                                1
                                                            "
                                                            v-model="
                                                                form.description
                                                            "
                                                            type="text"
                                                            id="description"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5"
                                                            disabled
                                                        />
                                                        <input
                                                            v-else
                                                            v-model="
                                                                form.description
                                                            "
                                                            type="text"
                                                            id="description"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5"
                                                            required
                                                        />
                                                    </div>
                                                    <div>
                                                        <label
                                                            for="price_Product"
                                                            class="block mb-2 text-base font-medium text-gray-900"
                                                            >Precio (Q)</label
                                                        >
                                                        <input
                                                            v-if="
                                                                form.is_ordered ==
                                                                1
                                                            "
                                                            v-model="form.price"
                                                            type="number"
                                                            id="price_Product"
                                                            class="bg-gray-50 text-center border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5"
                                                            min="0"
                                                            placeholder="0.00"
                                                            step="0.01"
                                                            pattern="^\d+(?:\.\d{1,2})?$"
                                                            disabled
                                                        />
                                                        <input
                                                            v-else
                                                            v-model="form.price"
                                                            type="number"
                                                            id="price_Product"
                                                            class="bg-gray-50 text-center border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5"
                                                            min="0"
                                                            placeholder="0.00"
                                                            step="0.01"
                                                            pattern="^\d+(?:\.\d{1,2})?$"
                                                            required
                                                        />
                                                    </div>
                                                </div>
                                                <button
                                                    v-if="form.is_ordered == 1"
                                                    type="submit"
                                                    class="hidden text-white bg-gray-400 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                                                    disabled
                                                >
                                                    Guardar
                                                </button>
                                                <button
                                                    v-else
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
                        <div v-if="cotization">
                            <IShowCotization
                                :cotization-items="cotization.items"
                                :cotization="cotization"
                                :grandTotal="grandTotal"
                                @delete="deleteItem($event)"
                                @update-item="updateItem($event)"
                            />

                            <section v-if="form.is_ordered == 1">
                                <IClient
                                    :cotization-order="cotization.order"
                                    :cotization="cotization"
                                />
                            </section>
                        </div>
                        <section v-if="form.is_ordered != 1">
                            <div
                                v-if="cotization"
                                class="flex justify-end m-12 gap-x-4"
                            >
                                <div>
                                    <IModal
                                        @cotizationOrder="
                                            cotizationOrder($event)
                                        "
                                        :formOrder="formOrder"
                                        :cotization="cotization"
                                        :oldGrandTotal="oldGrandTotal"
                                        :invalidPhone="invalidPhone"
                                    />
                                </div>
                                <div>
                                    <IBtn :cotization="cotization" />
                                </div>
                            </div>
                        </section>
                    </main>

                    <br />
                    <IFooter />
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style>
@media (min-width: 640px) {
    table {
        display: inline-table !important;
    }

    thead tr:not(:first-child) {
        display: none;
    }
}

td:not(:last-child) {
    border-bottom: 1;
}

th:not(:last-child) {
    border-bottom: 2px solid rgba(0, 0, 0, 0.1);
}

.data {
    text-align: center;
    font-weight: bold;
}
</style>
