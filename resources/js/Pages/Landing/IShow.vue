<script setup>
import AppFooter from "../../Layouts/AppFooter.vue";
import AppHeader from "../../Layouts/AppHeader.vue";
import IBagTitle from "./utils/IBagTitle.vue";
import IHero from "./IHero.vue";
import IAbout from "./IAbout.vue";
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
        <div class="relative">
            <br />
            <IBagTitle id="About" title="Conócenos" />
            <br />
            <IAbout />
        </div>
    </section>
</template>
