<template>
    <!-- component -->
    <div class="bg-white dark:bg-gray-900">
        <div class="flex justify-center h-screen">
            <div class="img-login hidden bg-cover lg:block lg:w-2/3">
                <div
                    class="flex items-center h-full px-20 bg-gray-900 bg-opacity-40 font-sans"
                >
                    <div>
                        <h2 class="text-4xl font-bold font-sans text-white">
                            ¡MÁS QUE REPUESTOS, TODO UN SERVICIO!
                        </h2>

                        <p class="max-w-xl mt-3 font-sans text-gray-300">
                            ENCUENTRA LO QUE BUSCAS CON NOSOTROS
                        </p>
                    </div>
                </div>
            </div>

            <div
                class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6"
            >
                <div class="flex-1">
                    <div class="text-center">
                        <a href="/">
                            <img
                                src="/images/impotractor/impotractor-logo-x2.png"
                                alt="image"
                                class="rounded mx-auto d-block"
                            />
                        </a>

                        <p class="mt-3 text-gray-600 dark:text-gray-300">
                            ¡Hemos Recibido tu Correo, muy pronto te
                            responderemos!
                        </p>
                    </div>

                    <div class="mt-8">
                        <form action="https://mail.google.com/mail/u/0/#inbox" target="_blank">
                            <div class="mt-6">
                                <button
                                    type="submit"
                                    class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-zinc-900 rounded-md hover:bg-yellow-400"
                                >
                                    Correo Electrónico
                                </button>
                            </div>
                        </form>

                        <p
                            class="mt-6 text-lg text-center text-gray-400 hover:text-yellow-400"
                        >
                            <a href="/"> ¿Deseas regresar al Inicio? </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
.img-login {
    background-image: url(/images/impotractor/tractor.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;image.png
}
</style>
