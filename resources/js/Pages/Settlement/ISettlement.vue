<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import AppDashboard from "../../Layouts/AppDashboard.vue";
import IFooter from "../Cotization/utils/IFooter.vue";
import ISettData from "./ISettData.vue";
import IPagination from "../Pagination/IShow.vue";
import Swal from "sweetalert2";
import { useForm } from "@inertiajs/inertia-vue3";
export default {
    components: {
        AppLayout,
        AppDashboard,
        IFooter,
        ISettData,
        IPagination,
    },
    props: {
        errors: Object,
        settlements: Object,
        search: String,
    },
    mounted() {
        this.form = useForm(this.form);
    },
    data() {
        return {
            form: {
                file: null,
            },
        };
    },
    methods: {
        clearFileInput() {
            const fileInput = document.getElementById("file");
            fileInput.value = null;
        },
        submit() {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "Asegúrate de que sea el archivo correcto.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#FFCC00",
                cancelButtonColor: "#d33",
                confirmButtonText: "¡Sí, adjuntar a la Liquidación!",
                cancelButtonText: "Cancelar",
            }).then((result) => {
                if (result.isConfirmed) {
                    const { file } = this.form;

                    this.$inertia.post(
                        route("settlements.store"),
                        { file },
                        {
                            onSuccess: () => {
                                Swal.fire({
                                    title: "¡Actualización del listado de Liquidación!",
                                    text: "Se ha agregado exitosamente.",
                                    icon: "success",
                                    confirmButtonColor: "#FFCC00",
                                });
                                this.clearFileInput();
                            },
                        }
                    );
                }
            });
        },
    },
};
</script>
<template>
    <AppLayout class="w-full" title="Liquidación">
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
                                            Productos en Liquidación
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
                                                            for="file"
                                                            class="block mb-2 text-base font-medium text-gray-900"
                                                        >
                                                            Archivo de Productos
                                                            en Liquidación
                                                        </label>
                                                        <input
                                                            type="file"
                                                            id="file"
                                                            name="file"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5"
                                                            accept=".xlsx,.xls"
                                                            required
                                                            @change="
                                                                (e) =>
                                                                    (form.file =
                                                                        e.target.files[0])
                                                            "
                                                        />
                                                    </div>
                                                </div>
                                                <button
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
                        <div>
                            <ISettData
                                :is="is"
                                :settlements="settlements"
                                :search="search"
                            />
                            <IPagination
                                v-if="this.settlements.data.length > 0"
                                :links="settlements.links"
                                :preserve-scroll="true"
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
