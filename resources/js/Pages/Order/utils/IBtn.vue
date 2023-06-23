<script>
export default {
    props: {
        cotization: Object,
    },
};
</script>
<template>
    <div class="lg:block hidden group inline-block mb-12">
        <button
            class="outline-none focus:outline-none border px-3 gap-2 py-2 bg-zinc-900 text-white rounded-lg flex items-center min-w-32 hover:bg-yellow-400"
        >
            <l-icon icon="fa-solid fa-file-lines" class="text-xl" />
            <span class="pr-1 font-bold flex-1 ml-1">Exportar a PDF</span>
            <span>
                <svg
                    class="fill-current h-4 w-4 transform group-hover:-rotate-180 transition duration-150 ease-in-out"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                >
                    <path
                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                    />
                </svg>
            </span>
        </button>
        <div
            class="bg-white border rounded-lg transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-32"
        >
            <a
                :href="`/cotization/${cotization.id}/cotizationPDF`"
                target="_blank"
                class="inline-flex rounded-lg px-3 py-1 hover:bg-gray-100"
            >
                Con Número de Parte</a
            >
            <hr />
            <a
                :href="`/cotization/${cotization.id}/PDFcotization`"
                target="_blank"
                class="rounded-lg px-3 py-2 hover:bg-gray-100"
                >Sin Número de Parte</a
            >
        </div>
    </div>
    <div class="lg:hidden group inline-block">
        <button
            class="outline-none focus:outline-none border px-3 py-2 bg-zinc-900 text-white rounded-lg gap-2 flex items-center min-w-32 hover:bg-yellow-400"
        >
            <l-icon icon="fa-solid fa-file-lines" class="text-xl" />
            <span class="pr-1 font-bold flex-1 ml-1">Exportar</span>
            <span>
                <svg
                    class="fill-current h-4 w-4 transform group-hover:-rotate-180 transition duration-150 ease-in-out"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                >
                    <path
                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                    />
                </svg>
            </span>
        </button>
        <div
            class="bg-white border rounded-lg transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-32"
        >
            <a
                :href="`/cotization/${cotization.id}/cotizationPDF`"
                target="_blank"
                class="inline-flex rounded-lg px-3 py-1 hover:bg-gray-100"
            >
                Con Número de Parte</a
            >
            <hr />
            <a
                :href="`/cotization/${cotization.id}/PDFcotization`"
                target="_blank"
                class="rounded-lg px-3 py-1 hover:bg-gray-100"
                >Sin Número de Parte</a
            >
        </div>
    </div>
</template>
<style>
li > div {
    transform: translatex(100%) scale(0);
}
li:hover > div {
    transform: translatex(101%) scale(1);
}
li > button svg {
    transform: rotate(-90deg);
}
li:hover > button svg {
    transform: rotate(-270deg);
}
.group:hover .group-hover\:scale-100 {
    transform: scale(1);
}
.group:hover .group-hover\:-rotate-180 {
    transform: rotate(180deg);
}
.scale-0 {
    transform: scale(0);
}
.min-w-32 {
    min-width: 8rem;
}
</style>
