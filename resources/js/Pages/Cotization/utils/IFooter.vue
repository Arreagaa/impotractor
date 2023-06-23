<script>
export default {
    data() {
        return {
            currentYear: new Date().getFullYear(),
        };
    },
};
</script>
<template>
    <p class="text-center text-base text-gray-500 my-10">
        &copy; 2005-{{ currentYear }}
        <a
            href="https://www.facebook.com/impotractorsa/"
            class="hover:text-yellow-400"
            target="_blank"
            >Impotractor S.A.</a
        >
        Todos los derechos reservados.
    </p>
</template>
