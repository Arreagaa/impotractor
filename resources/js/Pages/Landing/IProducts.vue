<script setup>
import IProductsButton from "./utils/IProductsButton.vue";
import { ref } from "vue";
const active = ref("filters");
const Products = {
    filters: {
        slug: "filters",
        title: "Filtros",
        items: [
            {
                name: "Filtros de Aire",
                image: "/images/filtros/FAire.jpg",
            },
            {
                name: "Filtros de Diesel",
                image: "/images/filtros/FDiesel.jpg",
            },
            {
                name: "Filtros de Aceite",
                image: "/images/filtros/FAceite.jpg",
            },
            {
                name: "Filtros Hidraulicos",
                image: "/images/filtros/FHidr.jpg",
            },
            {
                name: "Filtros de Transmision",
                image: "/images/filtros/FTrans.jpg",
            },
        ],
    },

    seyf: {
        slug: "seyf",
        title: "Sellos, empaques y fajas",
        items: [
            {
                name: "Kit Empaques",
                image: "/images/seyf/KitEmpaques.png",
            },
            {
                name: "Kit Sellos",
                image: "/images/seyf/KitSellos.png",
            },
            {
                name: "Kit Fajas",
                image: "/images/seyf/KitFajas.jpg",
            },
        ],
    },

    hercorte: {
        slug: "hercorte",
        title: "Herramienta de Corte",
        items: [
            {
                name: "Bases para Cucharon",
                image: "/images/hercorte/BaseCuch.jpg",
            },
            {
                name: "Bases para puntas de patrol",
                image: "/images/hercorte/BasePatrol.jpg",
            },
            {
                name: "Cuchillas para Cucharon",
                image: "/images/hercorte/CuchCuch.jpg",
            },
            {
                name: "Protectores para Cucharon",
                image: "/images/hercorte/ProtCuch.jpg",
            },
            {
                name: "Puntas para Cucharon",
                image: "/images/hercorte/PunCuch.jpg",
            },
            {
                name: "Pines y Seguros",
                image: "/images/hercorte/PinySeg.jpg",
            },
        ],
    },

    rodaje: {
        slug: "rodaje",
        title: "Rodaje",
        items: [
            {
                name: "Rodaje",
                image: "/images/rodaje/rodajes.jpg",
            },
        ],
    },

    indicadores: {
        slug: "indicadores",
        title: "Indicadores",
        items: [
            {
                name: "Indicadores de Temperatura de Aceite",
                image: "/images/indicadores/IndAceite.jpg",
            },
            {
                name: "Indicadores de Temperatura de Agua",
                image: "/images/indicadores/IndAgua.jpg",
            },
        ],
    },

    electricos: {
        slug: "electricos",
        title: "Eléctricos",
        items: [
            {
                name: "Switch de Paso",
                image: "/images/electricos/SwitchPaso.jpg",
            },
            {
                name: "Switch de Starter",
                image: "/images/electricos/SwitchStarter.jpg",
            },
            {
                name: "Horometro Digital",
                image: "/images/electricos/HorDigital.jpg",
            },
        ],
    },

    motores: {
        slug: "motores",
        title: "Motores",
        items: [
            {
                name: "Gasket Kits",
                image: "/images/motores/GasketKits.jpg",
            },
            {
                name: "Bombas Hidráulicas",
                image: "/images/motores/BombasHidr.jpg",
            },
            {
                name: "Liner Kits",
                image: "/images/motores/LinerKits.jpg",
            },
            {
                name: "Bombas de Frenos",
                image: "/images/motores/BombasFrenos.jpg",
            },
            {
                name: "Válvulas de Motor",
                image: "/images/motores/ValvMotor.jpg",
            },
            {
                name: "Bombas de Agua",
                image: "/images/motores/BombasAgua.jpg",
            },
        ],
    },
};
</script>
<template>
    <section class="bg-white dark:bg-gray-900 pb-10">
        <div class="container px-6 py-8 mx-auto">
            <div class="lg:flex lg:-mx-2">
                <div class="space-y-3 lg:w-1/5 lg:px-2 lg:space-y-4">
                    <div v-for="(item, index) in Products">
                        <a
                            class="block font-medium text-gray-500 dark:text-gray-300"
                            @click="active = item.slug"
                            :class="{
                                'text-yellow-500': active == item.slug,
                            }"
                            >{{ item.title }}</a
                        >
                    </div>
                </div>

                <div class="mt-6 lg:mt-0 lg:px-2 lg:w-4/5">
                    <div
                        class="flex items-center justify-between text-sm tracking-widest uppercase"
                    >
                        <p class="text-gray-500 dark:text-gray-300">
                            Nuestros Productos
                        </p>
                    </div>

                    <div
                        class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4"
                    >
                        <div v-for="(item, index) in Products[active].items">
                            <div
                                class="flex flex-col items-center justify-center w-full max-w-lg mx-auto"
                            >
                                <img
                                    class="object-cover w-full rounded-md h-72 xl:h-80"
                                    :src="item.image"
                                    alt="T-Shirt"
                                />
                                <h4
                                    class="mt-2 text-lg font-medium text-gray-700 dark:text-gray-200"
                                >
                                    {{ item.name }}
                                </h4>
                                <p class="ext-gray-500 dark:text-gray-300">
                                    Impotractor S.A.
                                </p>

                                <IProductsButton />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
