<template>
    <!-- component -->
    <div class="max-w-full flex justify-center items-center">
        <card
            class="card grid grid-cols-6 w-full p-none bg-zinc-900 before:content-[attr(before)]"
        >
            <div class="col-span-4">
                <h2 class="font-bold text-3xl text-white ml-10 mt-8">
                    ¿Necesitas Asesoría?
                </h2>

                <p class="font-light text-white text-xl ml-10 mt-5 text-left">
                    En caso que tengas alguna duda o pregunta,
                    solamente márcanos, y con mucho gusto te responderemos.
                </p>

                <button class="text-white font-semibold ml-10 mt-5 mb-8 text-left group">
                    Realizar consulta o cotización
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="inline-block h-6 w-6 group-hover:translate-x-2 transition delay-100 transition-200"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"
                        />
                    </svg>
                </button>
            </div>
        </card>
    </div>
</template>

<style>
.card {
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
        url(https://www.gentrac.com.gt/wp-content/uploads/revslider/miniexcavadora/Portada.jpg)
            fixed center center;
    background-size: cover;
    padding: 120px 0;
}
</style>
