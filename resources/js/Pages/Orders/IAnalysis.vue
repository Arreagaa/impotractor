<script>
import IAnalysisHead from "./utils/IAnalysisHead.vue";
import IItemCalculate from "./IItemCalculate.vue";
import IPagination from "../Pagination/IShow.vue";
import IValidate from "../IValidate.vue";
import { Link } from "@inertiajs/inertia-vue3";
export default {
    props: {
        is: Function,
        order: Object,
        orderItems: Object,
        search: String,
        settlements: Array,
        item: Object,
    },
    components: {
        IAnalysisHead,
        IItemCalculate,
        IPagination,
        IValidate,
        Link,
    },
    data() {
        return {
            query: this.search,
        };
    },
    methods: {
        itemSearch(id) {
            this.$inertia.get(route("order", id), {
                q: this.query,
                preserveScroll: true,
            });
        },
    },
};
</script>
<template>
    <div class="pt-6 px-4" id="Calculator">
        <div class="my-4">
            <div class="bg-white shadow rounded-md mb-4 p-4 sm:p-6 h-ful l">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-bold leading-none text-gray-900">
                        Análisis
                    </h3>
                </div>
                <div class="px-3">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative mt-1">
                        <div
                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
                        >
                            <l-icon
                                icon="fa-solid fa-magnifying-glass"
                                class="text-lg text-gray-600"
                            />
                        </div>
                        <div class="inline-flex">
                            <input
                                @keydown.enter.prevent="
                                    itemSearch(this.order.id)
                                "
                                v-model="query"
                                type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus-form block lg:w-80 pl-10 p-2.5"
                                placeholder="Buscar Productos en el Pedido"
                            />
                            <div
                                v-if="this.query != null"
                                class="inline-flex ml-2"
                            >
                                <Link
                                    :href="`/order/${order.id}`"
                                    class="lg:block hidden text-white bg-zinc-900 hover:bg-yellow-400 focus:ring-4 focus:outline-none font-bold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                                >
                                    Volver al Pedido
                                </Link>
                                <Link
                                    :href="`/order/${order.id}`"
                                    class="lg:hidden text-white bg-zinc-900 hover:bg-yellow-400 focus:ring-4 focus:outline-none font-bold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                                >
                                    Regresar
                                </Link>
                            </div>
                        </div>
                    </div>
                    <div class="flex py-4">
                        <button
                            v-if="is('Admin')"
                            @click="$emit('update-analysis')"
                            class="text-white bg-zinc-900 hover:bg-yellow-400 focus:ring-4 focus:outline-none font-bold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                        >
                            Actualizar Análisis
                        </button>
                        <button
                            v-if="is('Seller')"
                            @click="$emit('update-analysis')"
                            class="text-white bg-zinc-900 hover:bg-yellow-400 focus:ring-4 focus:outline-none font-bold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                        >
                            Actualizar Sugerencias
                        </button>
                        <a
                            v-if="is('Admin')"
                            :href="route('items.export', { id: order.id })"
                            class="text-white bg-zinc-900 hover:bg-yellow-400 focus:ring-4 ml-2 focus:outline-none font-bold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                        >
                            Exportar a Excel
                        </a>
                    </div>
                </div>
                <div v-if="orderItems.data.length == 0">
                    <IValidate />
                </div>
                <div v-else class="flex items-center justify-center">
                    <div class="container shadow-xl">
                        <section class="bg-white">
                            <div class="container">
                                <div class="flex flex-wrap -mx-4">
                                    <div class="w-full px-2">
                                        <div class="max-w-full overflow-x-auto">
                                            <table
                                                class="table-auto w-full bg-zinc-900 rounded-md overflow-hidden sm:shadow-lg"
                                            >
                                                <IAnalysisHead :is="is" />
                                                <tbody>
                                                    <IItemCalculate
                                                        v-for="(
                                                            item, index
                                                        ) in orderItems.data"
                                                        :order="order"
                                                        :item="item"
                                                        :key="index"
                                                        :is="is"
                                                        :settlements="
                                                            settlements
                                                        "
                                                        @update-item="
                                                            $emit(
                                                                'update-item',
                                                                $event
                                                            )
                                                        "
                                                    />
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <IPagination
                v-if="orderItems.data.length > 0"
                :links="orderItems.links"
                :preserve-scroll="true"
            />
        </div>
    </div>
</template>
