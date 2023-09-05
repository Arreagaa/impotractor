<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

const isMenuOpen = ref(false);

function toggleMenu() {
    isMenuOpen.value = !isMenuOpen.value;
}
</script>
<template>
    <div class="max-w-fill bg-zinc-900 text-white font-bold">
        <nav id="header" class="w-full z-30 top-0 py-1">
            <div
                class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-3"
            >
                <label for="menu-toggle" class="cursor-pointer md:hidden block">
                    <l-icon
                        v-if="!isMenuOpen"
                        icon="fa-solid fa-bars"
                        class="text-white text-xl"
                        @click="toggleMenu"
                    />
                    <l-icon
                        v-else
                        icon="fa-solid fa-xmark"
                        class="text-white text-xl"
                        @click="toggleMenu"
                    />
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
                                <Link
                                    class="inline-block py-2 px-2 hover:text-yellow-300"
                                    href="/#About"
                                    >NOSOTROS</Link
                                >
                            </li>
                            <li>
                                <Link
                                    class="inline-block py-2 px-2 hover:text-yellow-300"
                                    href="/#Values"
                                    >VALORES</Link
                                >
                            </li>
                            <li>
                                <Link
                                    class="inline-block py-2 px-2 hover:text-yellow-300"
                                    href="/#Products"
                                    >PRODUCTOS</Link
                                >
                            </li>
                            <li>
                                <Link
                                    class="inline-block py-2 px-2 hover:text-yellow-300"
                                    href="/#Contact"
                                    >CONTACTO</Link
                                >
                            </li>
                            <li>
                                <div>
                                    <Link
                                        v-if="$page.props.user"
                                        :href="route('dashboard')"
                                        class="inline-block py-2 px-2 hover:text-yellow-300"
                                        >CUENTA</Link
                                    >
                                    <Link
                                        v-else
                                        class="inline-block py-2 px-2 hover:text-yellow-300"
                                        :href="route('login')"
                                        >INICIAR SESIÓN</Link
                                    >
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div>
                    <Link
                        class="flex items-center tracking-wide hover: font-bold text-gray-800 mr-4 max-[320px]:mr-0"
                        :href="route('landing')"
                    >
                        <img
                            src="/images/impotractor/impotractor-light-logo.png"
                            alt="image"
                            class="rounded mx-auto d-block"
                        />
                    </Link>
                </div>

                <div
                    class="order-2 md:order-3 flex items-center lg:block hidden"
                    id="nav-content"
                >
                    <Link class="inline-block hover:text-yellow-300">
                        <Link
                            class="inline-block py-2 px-4 hover:text-yellow-300"
                            href="/#About"
                            >NOSOTROS</Link
                        >
                    </Link>

                    <Link class="inline-block hover:text-yellow-300">
                        <Link
                            class="inline-block py-2 px-4 hover:text-yellow-300"
                            href="/#Values"
                            >VALORES</Link
                        >
                    </Link>

                    <Link class="inline-block hover:text-yellow-300">
                        <Link
                            class="inline-block py-2 px-4 hover:text-yellow-300"
                            href="/#Products"
                            >PRODUCTOS</Link
                        >
                    </Link>

                    <Link class="inline-block hover:text-yellow-300">
                        <Link
                            class="inline-block py-2 px-4 hover:text-yellow-300"
                            href="/#Contact"
                            >CONTACTO</Link
                        >
                    </Link>

                    <Link class="inline-block hover:text-yellow-300">
                        <div>
                            <Link
                                v-if="$page.props.user"
                                :href="route('dashboard')"
                                class="inline-block py-2 px-4 hover:text-yellow-300"
                                >CUENTA</Link
                            >
                            <Link
                                v-else
                                class="inline-block py-2 px-4 hover:text-yellow-300"
                                :href="route('login')"
                                >INICIAR SESIÓN</Link
                            >
                        </div>
                    </Link>
                </div>

                <div
                    class="order-2 md:order-3 flex items-center lg:hidden"
                    id="nav-content"
                ></div>
            </div>
        </nav>
    </div>
</template>
