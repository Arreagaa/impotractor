<script setup>
import AppFooter from "../../Layouts/AppFooter.vue";
import AppHeader from "../../Layouts/AppHeader.vue";
import IBagTitle from "./utils/IBagTitle.vue";
import ICta from "./utils/ICta.vue";
import IHero from "./IHero.vue";
import IAbout from "./IAbout.vue";
import IValues from "./IValues.vue";
import IProducts from "./IProducts.vue";
</script>
<template>
    <link
        href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css"
        rel="stylesheet"
    />
    <section class="bg-zinc-900">
        <div>
            <AppHeader />
            <IHero />
        </div>
    </section>

    <section>
        <div class="relative pb-10">
            <br />
            <IBagTitle id="About" title="Conócenos" />
            <br />
            <IAbout />
            <br>
        </div>
    </section>

    <section>
        <div class="relative">
            <ICta />
            <br>
        </div>
    </section>

    <section>
        <div class="relative">
            <br />
            <IBagTitle id="Values" title="Valores" />
            <br />
            <IValues />
        </div>
    </section>

    <section>
        <div class="bg-white">
            <br />
            <IBagTitle id="Products" title="Productos" />
            <br />
            <IProducts />
        </div>
    </section>
</template>

<style>
.relative{
    background-color: #ebedef;
}
</style>
