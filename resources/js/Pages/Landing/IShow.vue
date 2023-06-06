<script setup>
import AppFooter from "../../Layouts/AppFooter.vue";
import AppHeader from "../../Layouts/AppHeader.vue";
import IBagTitle from "./utils/IBagTitle.vue";
import ICta from "./utils/ICta.vue";
import IWidget from "./utils/IWidget.vue";
import IHero from "./IHero.vue";
import IAbout from "./IAbout.vue";
import IValues from "./IValues.vue";
import IProducts from "./IProducts.vue";
import IContact from "./IContact.vue";
</script>
<template>
    <section id="Welcome" class="bg-zinc-900">
        <div>
            <AppHeader />
            <IHero />
        </div>
    </section>

    <section>
        <div class="relative bg-[url('/images/bg/bg-deco.png')] bg-cover pb-10">
            <br />
            <IBagTitle id="About" title="Conócenos" />
            <br />
            <IAbout />
            <br />
        </div>
    </section>

    <section>
        <div class="">
            <ICta />
        </div>
    </section>

    <section>
        <div class="bg-[url('/images/bg/bg-values.png')] bg-cover">
            <br />
            <IBagTitle id="Values" title="Valores" />
            <br />
            <IValues />
        </div>
    </section>

    <section>
        <div class="bg-[url('/images/bg/bg-products.png')] bg-fit bg-no-repeat">
            <br />
            <IBagTitle id="Products" title="Productos" />
            <IProducts />
            <hr />
        </div>
    </section>

    <section>
        <div class="bg-[#ebedef] relative">
            <br />
            <IBagTitle id="Contact" title="Contacto" />
            <br />
            <IContact />
            <br />
        </div>
    </section>
    <section>
        <AppFooter />
        <IWidget />
    </section>
</template>
