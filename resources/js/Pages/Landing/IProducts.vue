<template>
    <div class="max-w-app">
        <div class="flex ">
            <div v-for="item, index in Products ">
                <div @click="active = item.slug" :class="{'text-red-500':active == item.slug}">
                    {{ item.title }}
                </div>
            </div>
        </div>
        <div v-for="item, index in Products[active].items ">
            {{ item.name }}
            {{ item.image }}
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
        ],
    },

    seyf: {
        slug: "seyf",
        title: "Sellos",
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
};
</script>
