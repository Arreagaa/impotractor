<template>
    <div class="max-w-app">
        <div class="flex">
            <div v-for="(item, index) in Products">
                <div
                    @click="active = item.slug"
                    :class="{ 'text-yellow-500': active == item.slug }"
                >
                    {{ item.title }}
                </div>
            </div>
        </div>
        <div v-for="(item, index) in Products[active].items">
            <img
                class="img-fluid h-96 w-full object-cover object-top"
                :src="item.image"
                alt=""
            />
            {{ item.name }}
        </div>
    </div>
</template>
<script setup>
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
