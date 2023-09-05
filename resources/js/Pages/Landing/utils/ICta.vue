<template>
    <div class="max-w-full flex justify-center items-center">
        <div
            class="card grid md:grid-cols-6 w-full p-none bg-zinc-900 before:content-[attr(before)]"
        >
            <div class="col-span-4 md:px-0 px-4 max-[320px]:px-0">
                <h2 class="font-bold text-3xl text-white ml-10 mt-8">
                    ¿Necesitas Asesoría?
                </h2>

                <p class="font-light text-white text-xl ml-10 mt-5 text-left">
                    En caso que tengas alguna duda o pregunta, solamente
                    márcanos, y con mucho gusto te responderemos.
                </p>

                <a href="/#Contact">
                    <button
                        class="inline-flex gap-2 text-white font-semibold ml-10 mt-5 mb-8 text-left group"
                    >
                        Realizar consulta o cotización
                        <l-icon
                            icon="fa-solid fa-arrow-right-long"
                            class="inline-block text-xl group-hover:translate-x-2 pt-0.5 transition delay-100 transition-200"
                        />
                    </button>
                </a>
            </div>
        </div>
    </div>
</template>
<style>
.card {
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
        url("/images/impotractor/tractor.jpg") fixed center center;
    background-size: cover;
    padding: 120px 0;
}
</style>
