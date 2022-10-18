<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>
<template>
    <div class="max-w-fill bg-zinc-900 text-white font-bold">
        <nav id="header" class="w-full z-30 top-0 py-1">
            <div
                class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-3"
            >
                <label for="menu-toggle" class="cursor-pointer md:hidden block">
                    <svg
                        class="fill-current text-white"
                        xmlns="http://www.w3.org/2000/svg"
                        width="20"
                        height="20"
                        viewBox="0 0 20 20"
                    >
                        <path
                            d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"
                        ></path>
                    </svg>
                </label>
                <input class="hidden" type="checkbox" id="menu-toggle" />

                <div
                    class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-1"
                    id="menu"
                >
                    <nav class="lg:hidden">
                        <ul
                            class="md:flex items-center justify-between text-base text-white pt-8 md:pt-0"
                        >
                            <li>
                                <a
                                    class="inline-block no-underline py-2 px-4 hover:text-yellow-300"
                                    href="/#About"
                                    >NOSOTROS</a
                                >
                            </li>
                            <li>
                                <a
                                    class="inline-block no-underline py-2 px-4 hover:text-yellow-300"
                                    href="/#Values"
                                    >VALORES</a
                                >
                            </li>
                            <li>
                                <a
                                    class="inline-block no-underline py-2 px-4 hover:text-yellow-300"
                                    href="/#Products"
                                    >PRODUCTOS</a
                                >
                            </li>
                            <li>
                                <a
                                    class="inline-block no-underline py-2 px-4 hover:text-yellow-300"
                                    href="/#Contact"
                                    >CONTACTO</a
                                >
                            </li>
                            <li>
                                <a
                                    class="inline-block no-underline py-2 px-4 hover:text-yellow-300"
                                    href="/login"
                                    >INICIAR SESIÓN</a
                                >
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="">
                    <a
                        class="flex items-center tracking-wide no-underline hover:no-underline font-bold text-gray-800 mr-4"
                        href="/"
                    >
                        <img
                            src="/images/impotractor/impotractor-light-logo.png"
                            alt="image"
                            class="rounded mx-auto d-block"
                        />
                    </a>
                </div>

                <div
                    class="order-2 md:order-3 flex items-center lg:block hidden"
                    id="nav-content"
                >
                    <a
                        class="inline-block no-underline hover:text-yellow-300"
                        href="#"
                    >
                        <a
                            class="inline-block no-underline py-2 px-4 hover:text-yellow-300"
                            href="/#About"
                            >NOSOTROS</a
                        >
                    </a>

                    <a
                        class="inline-block no-underline hover:text-yellow-300"
                        href="#"
                    >
                        <a
                            class="inline-block no-underline py-2 px-4 hover:text-yellow-300"
                            href="/#Values"
                            >VALORES</a
                        >
                    </a>

                    <a
                        class="inline-block no-underline hover:text-yellow-300"
                        href="#"
                    >
                        <a
                            class="inline-block no-underline py-2 px-4 hover:text-yellow-300"
                            href="/#Products"
                            >PRODUCTOS</a
                        >
                    </a>

                    <a
                        class="inline-block no-underline hover:text-yellow-300"
                        href="#"
                    >
                        <a
                            class="inline-block no-underline py-2 px-4 hover:text-yellow-300"
                            href="/#Contact"
                            >CONTACTO</a
                        >
                    </a>

                    <a
                        class="inline-block no-underline hover:text-yellow-300"
                        href="#"
                    >
                        <a
                            class="inline-block no-underline py-2 px-4 hover:text-yellow-300"
                            href="/login"
                            >INICIAR SESIÓN</a
                        >
                    </a>
                </div>

                <div
                    class="order-2 md:order-3 flex items-center lg:hidden"
                    id="nav-content"
                >
                    <!--<a class="inline-block no-underline hover:text-yellow-300 lg:hidden" href="#">
                    <svg class="fill-current hover:text-yellow-300" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <circle fill="none" cx="12" cy="7" r="3" />
                        <path d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z" />
                    </svg>
                </a>

                <a class="pl-3 inline-block no-underline hover:text-yellow-300 lg:hidden" href="#">
                    <svg class="fill-current hover:text-yellow-300" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z" />
                        <circle cx="10.5" cy="18.5" r="1.5" />
                        <circle cx="17.5" cy="18.5" r="1.5" />
                    </svg>
                </a>-->
                </div>
            </div>
        </nav>
    </div>
</template>

<style>
.work-sans {
    font-family: "Work Sans", sans-serif;
}

#menu-toggle:checked + #menu {
    display: block;
}

.hover\:grow {
    transition: all 0.3s;
    transform: scale(1);
}

.hover\:grow:hover {
    transform: scale(1.02);
}
</style>
