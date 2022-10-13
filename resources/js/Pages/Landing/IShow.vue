<script setup>
import AppFooter from '../../Layouts/AppFooter.vue';
import AppHeader from '../../Layouts/AppHeader.vue';
import IHero from './IHero.vue';
</script>
<template>
    <link
    href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css"
    rel="stylesheet"
  >
  <section class="bg-zinc-900">
    <div>
      <AppHeader />
      <IHero />
    </div>
  </section>
</template>
