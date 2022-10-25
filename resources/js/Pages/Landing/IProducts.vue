<script setup>
import IProductsButton from "./utils/IProductsButton.vue";
import { ref } from "vue";
const active = ref("hercorte");
const props = defineProps({
    item: {
        type: Object,
        required: true,
    },
    idItem: {
        type: Number,
        default: 0,
    },
});
const Products = {
    hercorte: {
        slug: "hercorte",
        title: "Herramienta de Corte",
        items: [
            {
                name: "Bases para Cucharon",
                image: "/images/hercorte/BaseCuch.jpeg",
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
                image: "/images/hercorte/PinySeg.png",
            },
            {
                name: "Cucharones",
                image: "/images/hercorte/cucharones.png",
            },
        ],
    },

    seyf: {
        slug: "seyf",
        title: "Sellos, empaques y fajas",
        items: [
            {
                name: "Fajas",
                image: "/images/seyf/fajas.jpg",
            },
            {
                name: "Gasket Kits",
                image: "/images/seyf/gasketkits.jpg",
            },
            {
                name: "Kits de Sellos",
                image: "/images/seyf/kitsdesellos.jpg",
            },
            {
                name: "Sellos Case",
                image: "/images/seyf/sellosCASE.jpg",
            },
            {
                name: "Sellos de Aceite",
                image: "/images/seyf/sellosdeaceite.jpg",
            },
            {
                name: "Sellos de Polvo",
                image: "/images/seyf/sellosdepolvo.jpg",
            },
            {
                name: "Sellos Hidráulicos",
                image: "/images/seyf/selloshidraulicos.jpg",
            },
        ],
    },

    rodaje: {
        slug: "rodaje",
        title: "Rodaje",
        items: [
            {
                name: "guardas",
                image: "/images/rodaje/guardas.webp",
            },
            {
                name: "Resortes",
                image: "/images/rodaje/resortes.jpg",
            },
            {
                name: "Rodos",
                image: "/images/rodaje/rodos.jpg",
            },
            {
                name: "Ruedas Tensoras",
                image: "/images/rodaje/ruedastensoras.jpg",
            },
        ],
    },

    electricos: {
        slug: "electricos",
        title: "Eléctricos",
        items: [
            {
                name: "Alarmas",
                image: "/images/electricos/alarmas.jpg",
            },
            {
                name: "Horometros",
                image: "/images/electricos/HOROMETROS.jpg",
            },
            {
                name: "Luces de Emergencia",
                image: "/images/electricos/lucesemergencia.jpg",
            },
            {
                name: "Motores de Arranque",
                image: "/images/electricos/motoresdearranque.jpg",
            },
            {
                name: "Relays",
                image: "/images/electricos/relays.jpg",
            },
            {
                name: "Selenoides",
                image: "/images/electricos/selenoides.jpg",
            },
            {
                name: "Sensores",
                image: "/images/electricos/sensores.jpg",
            },
            {
                name: "Switches",
                image: "/images/electricos/switches.jpg",
            },
        ],
    },

    hidraulicos: {
        slug: "hidraulicos",
        title: "Hidráulicos",
        items: [
            {
                name: "Bombas Hidráulicas",
                image: "/images/hidraulicos/bombashidraulicas.jpg",
            },
            {
                name: "Cilindros Hidráulicos",
                image: "/images/hidraulicos/cilindroshidraulicos.jpg",
            },
            {
                name: "Controles de Dirección",
                image: "/images/hidraulicos/controlesdedireccion.jpg",
            },
            {
                name: "Motores Hidráulicos",
                image: "/images/hidraulicos/motoreshidraulicos.jpg",
            },
            {
                name: "Pistones Hidráulicos",
                image: "/images/hidraulicos/pistoneshidraulicos.jpg",
            },
        ],
    },

    motores: {
        slug: "motores",
        title: "Motores",
        items: [
            {
                name: "Alternadores",
                image: "/images/motores/alternadores.webp",
            },
            {
                name: "Arbol de Levas",
                image: "/images/motores/arboldelevas.jpg",
            },
            {
                name: "Bombas de Agua",
                image: "/images/motores/bombasdeagua.jpg",
            },
            {
                name: "Cables",
                image: "/images/motores/cables.jpg",
            },
            {
                name: "Camisas",
                image: "/images/motores/camisas.webp",
            },
            {
                name: "Cartuchos",
                image: "/images/motores/cartuchos.jpg",
            },
            {
                name: "Cigueñal",
                image: "/images/motores/cigueñal.jpg",
            },
            {
                name: "Convertidores de Torque",
                image: "/images/motores/convertidoresdetorque.jpg",
            },
            {
                name: "Ferrules",
                image: "/images/motores/ferrules.jpg",
            },
            {
                name: "Inyectores",
                image: "/images/motores/inyectores.jpg",
            },
            {
                name: "Kits de Biela",
                image: "/images/motores/kitsdebiela.jpg",
            },
            {
                name: "Kits de Piston",
                image: "/images/motores/kitsdepiston.jpg",
            },
            {
                name: "Liner Kits",
                image: "/images/motores/linerkits.jpg",
            },
            {
                name: "Manifolds",
                image: "/images/motores/manifolds.jpg",
            },
            {
                name: "Rodamientos para Motor",
                image: "/images/motores/rodamientosmotor.jpg",
            },
            {
                name: "Tubos de Escape",
                image: "/images/motores/tubosdeescape.jpg",
            },
            {
                name: "Turbos",
                image: "/images/motores/turbos.jpg",
            },
        ],
    },

    filters: {
        slug: "filters",
        title: "Filtros",
        items: [
            {
                name: "Filtros de Aceite",
                image: "/images/filtros/filtrosaceite.jpg",
            },
            {
                name: "Filtros de Aire",
                image: "/images/filtros/filtrosaire.jpg",
            },
            {
                name: "Filtros de Aire Secundarios",
                image: "/images/filtros/filtrosairesecundarios.jpg",
            },
            {
                name: "Filtros Cabina de Aire",
                image: "/images/filtros/filtroscabinaaire.jpg",
            },
            {
                name: "Filtros de Diesel",
                image: "/images/filtros/filtrosdiesel.jpg",
            },
            {
                name: "Filtros Hidráulicos",
                image: "/images/filtros/filtroshidraulicos.jpg",
            },
        ],
    },
};
</script>
<template>
    <section class="bg-white dark:bg-gray-900 pb-10 max-w-app">
        <div class="container px-6 py-8 mx-auto">
            <div class="lg:flex lg:-mx-2">
                <div class="space-y-3 lg:w-1/5 lg:px-2 lg:space-y-4">
                    <div v-for="(item, index) in Products">
                        <a
                            class="block font-medium text-gray-500 dark:text-gray-300 cursor-pointer"
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
                        class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3"
                    >
                        <div v-for="(item, index) in Products[active].items">
                            <div
                                class="flex flex-col items-center justify-center w-full max-w-lg mx-auto"
                            >
                                <a :href="`#id-${idItem}`">
                                    <img
                                        class="object-cover w-full rounded-md h-72 xl:h-80"
                                        :src="item.image"
                                        alt=""
                                    />
                                </a>
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
                            <div class="lightboxes">
                                <div class="lightbox" :id="`id-${idItem}`">
                                    <a href="#Products" class="close"
                                        >&times;</a
                                    >
                                    <div class="lg:block hidden">
                                        <img class="img" :src="item.image" alt="" />
                                    </div>
                                    <div class="lg:hidden">
                                        <img class="img-mobile" :src="item.image" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style>
.lightbox {
    background: black;
    display: none;
    position: fixed;
    z-index: 1000;
}

.lightbox:target {
    align-items: center;
    bottom: 0;
    display: flex;
    justify-content: center;
    left: 0;
    right: 0;
    top: 0;
}

.lightbox .img {
    border-radius: 1em;
    display: block;
    margin: auto;
    max-height: 80vh;
    max-width: 90vh;
}

.lightbox .img-mobile {
    border-radius: 1em;
    display: block;
    margin: auto;
    max-height: 80vh;
}

.lightbox .close {
    color: #fff;
    font-size: 4em;
    font-weight: bold;
    height: 1em;
    position: fixed;
    right: 0;
    top: 0;
    width: 1em;
    z-index: 1001;
}
</style>
