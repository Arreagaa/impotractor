<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
    href: String,
    active: Boolean,
});

const classes = computed(() => {
    return props.active
        ? 'inline-flex items-center px-1 pt-1 border-b-2 border-yellow-400 text-base font-bold leading-5 text-white focus:outline-none focus:border-yellow-400 transition '
        : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-base font-bold leading-5 text-white hover:text-yellow-400 hover:border-yellow-400 focus:outline-none focus:text-yellow-400 focus:border-yellow-400 transition';
});
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
