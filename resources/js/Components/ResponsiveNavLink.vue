<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    active: Boolean,
    href: String,
    as: String,
});

const classes = computed(() => {
    return props.active
        ? "block pl-3 pr-4 py-2 border-l-4 border-yellow-400 text-base font-bold text-white bg-zinc-900 focus:outline-none focus:text-yellow-400 focus:bg-gray-100 focus:border-yellow-400 transition"
        : "block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-bold text-white hover:text-yellow-400 hover:bg-zinc-900 hover:border-yellow-400 focus:outline-none focus:text-yellow-400 focus:bg-gray-50 focus:border-yellow-400 transition";
});
</script>

<template>
    <div>
        <button v-if="as == 'button'" :class="classes" class="w-full text-left">
            <slot />
        </button>

        <Link v-else :href="href" :class="classes">
            <slot />
        </Link>
    </div>
</template>
