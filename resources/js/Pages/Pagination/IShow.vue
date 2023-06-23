<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
    components: {
        Link,
    },
    props: {
        links: Array,
        preserveScroll: Boolean,
    },
};
</script>
<template>
    <div class="flex justify-center">
        <nav aria-label="Page navigation example">
            <ul class="flex list-style-none">
                <li v-for="(link, key) in links" :key="key" class="page-item">
                    <a
                        v-if="link.url == null"
                        v-html="link.label"
                        class="page-link relative block py-1.5 px-3 rounded border-0 bg-transparent outline-none transition-all duration-300 rounded text-gray-800 hover:text-white hover:bg-gray-200 focus:shadow-none"
                    />
                    <Link
                        v-else
                        :href="link.url"
                        v-html="link.label"
                        :class="{ 'text-white bg-amber-300': link.active }"
                        :preserve-scroll="preserveScroll"
                        class="page-link relative block py-1.5 px-3 rounded border-0 outline-none transition-all rounded text-gray-800 hover:bg-amber-300 focus:shadow-none"
                    />
                </li>
            </ul>
        </nav>
    </div>
</template>
