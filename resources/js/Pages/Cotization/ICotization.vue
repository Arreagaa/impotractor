<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
</script>

<template>
    <AppLayout class="w-full" title="Cotizaciones">
        <div>
            <div class="flex overflow-hidden bg-white">
                <aside
                    id="sidebar"
                    class="fixed hidden z-20 h-full top-0 left-0 pt-16 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75"
                    aria-label="Sidebar"
                >
                    <div
                        class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0"
                    >
                        <div
                            class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto"
                        >
                            <div
                                class="flex-1 px-3 bg-white divide-y space-y-1"
                            >
                                <ul class="space-y-2 pb-2">
                                    <li>
                                        <a
                                            href="/dashboard"
                                            class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group"
                                        >
                                            <svg
                                                class="w-6 h-6 text-gray-500 group-hover:text-gray-900 transition duration-75"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                    d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"
                                                ></path>
                                                <path
                                                    d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"
                                                ></path>
                                            </svg>
                                            <span class="ml-3">Dashboard</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="/user/profile"
                                            class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group"
                                        >
                                            <svg
                                                class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                    clip-rule="evenodd"
                                                ></path>
                                            </svg>
                                            <span
                                                class="ml-3 flex-1 whitespace-nowrap"
                                                >Cuenta</span
                                            >
                                            <span
                                                class="bg-gray-200 text-gray-800 ml-3 text-sm font-medium inline-flex items-center justify-center px-2 rounded-full"
                                                >Personal</span
                                            >
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox"
                                            target="_blank"
                                            class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group"
                                        >
                                            <svg
                                                class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                    d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"
                                                ></path>
                                                <path
                                                    d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"
                                                ></path>
                                            </svg>
                                            <span
                                                class="ml-3 flex-1 whitespace-nowrap"
                                                >Inbox</span
                                            >
                                            <span
                                                class="bg-gray-200 text-gray-800 ml-3 text-sm font-medium inline-flex items-center justify-center px-2 rounded-full"
                                                >Personal</span
                                            >
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="/#Products"
                                            target="_blank"
                                            class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group"
                                        >
                                            <svg
                                                class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                                                    clip-rule="evenodd"
                                                ></path>
                                            </svg>
                                            <span
                                                class="ml-3 flex-1 whitespace-nowrap"
                                                >Productos</span
                                            >
                                        </a>
                                    </li>
                                </ul>
                                <div class="space-y-2 pt-2">
                                    <a
                                        href="/cotization"
                                        class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2"
                                    >
                                        <svg
                                            class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"
                                            ></path>
                                            <path
                                                fill-rule="evenodd"
                                                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                                clip-rule="evenodd"
                                            ></path>
                                        </svg>
                                        <span class="ml-3">Cotizaciones</span>
                                    </a>
                                    <a
                                        href="#"
                                        class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2"
                                    >
                                        <svg
                                            class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"
                                            ></path>
                                        </svg>
                                        <span class="ml-3">Calculadora</span>
                                    </a>
                                    <a
                                        href="#"
                                        class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2"
                                    >
                                        <svg
                                            class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"
                                            ></path>
                                        </svg>
                                        <span class="ml-3">Resumen</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <div
                    class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10"
                    id="sidebarBackdrop"
                ></div>
                <div
                    id="main-content"
                    class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64"
                >
                    <main>
                        <div class="pt-6 px-4">
                            <div
                                class="grid grid-cols-1 2xl:grid-cols-1 xl:gap-4 my-4"
                            >
                                <div
                                    class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full"
                                >
                                    <div
                                        class="flex items-center justify-between mb-4"
                                    >
                                        <h3
                                            class="text-xl font-bold leading-none text-gray-900"
                                        >
                                            Cotizador
                                        </h3>
                                    </div>
                                    <div class="flow-root">
                                        <div
                                            class="max-w-full mx-auto bg-white pt-6 pr-6 pl-6"
                                        >
                                            <form>
                                                <div
                                                    class="grid gap-6 mb-6 lg:grid-cols-4"
                                                >
                                                    <div>
                                                        <label
                                                            for="referencia"
                                                            class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-300"
                                                            >Referencia de la
                                                            Cotización</label
                                                        >
                                                        <input
                                                            type="text"
                                                            id="referencia"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-400 dark:focus:border-yellow-400"
                                                            placeholder=""
                                                            required
                                                        />
                                                    </div>
                                                    <div>
                                                        <label
                                                            for="proveedor"
                                                            class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-300"
                                                            >Código del
                                                            proveedor</label
                                                        >
                                                        <input
                                                            type="text"
                                                            id="proveedor"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-400 dark:focus:border-yellow-400"
                                                            placeholder=""
                                                            required
                                                        />
                                                    </div>
                                                    <div>
                                                        <label
                                                            for="Cambio"
                                                            class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-300"
                                                            >Tipo de
                                                            Cambio</label
                                                        >
                                                        <input
                                                            type="number"
                                                            id="Cambio"
                                                            class="bg-gray-50 text-center border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-400 dark:focus:border-yellow-400"
                                                            min="0"
                                                            value="7.75"
                                                            step="0.01"
                                                            pattern="^\d+(?:\.\d{1,2})?$"
                                                            required
                                                        />
                                                    </div>
                                                    <div>
                                                        <label
                                                            for="Transporte"
                                                            class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-300"
                                                            >Tipo de Transporte
                                                        </label>
                                                        <select
                                                            id="Transporte"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-400 dark:focus:border-yellow-400"
                                                        >
                                                            <option selected>
                                                                Elegir un
                                                                Transporte
                                                            </option>
                                                            <option
                                                                value="Courier"
                                                            >
                                                                Courier
                                                            </option>
                                                            <option
                                                                value="Aereo"
                                                            >
                                                                Aéreo Express
                                                            </option>
                                                            <option
                                                                value="Reservado"
                                                            >
                                                                Reservado
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label
                                                            for="Flete"
                                                            class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-300"
                                                            >Flete Extra
                                                            ($)</label
                                                        >
                                                        <input
                                                            type="number"
                                                            id="Flete"
                                                            min="0"
                                                            value="0.00"
                                                            class="bg-gray-50 text-center border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-400 dark:focus:border-yellow-400"
                                                            step="0.01"
                                                            pattern="^\d+(?:\.\d{1,2})?$"
                                                            required
                                                        />
                                                    </div>
                                                    <div>
                                                        <label
                                                            for="Peso"
                                                            class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-300"
                                                            >Peso total
                                                            (Lb)</label
                                                        >
                                                        <input
                                                            type="number"
                                                            id="Peso"
                                                            class="bg-gray-50 text-center border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-400 dark:focus:border-yellow-400"
                                                            min="0"
                                                            value="0.00"
                                                            step="0.01"
                                                            pattern="^\d+(?:\.\d{1,2})?$"
                                                            required
                                                        />
                                                    </div>
                                                    <div>
                                                        <label
                                                            for="Parte"
                                                            class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-300"
                                                            >Número de
                                                            Parte</label
                                                        >
                                                        <input
                                                            type="text"
                                                            id="Parte"
                                                            class="bg-gray-50 text-center border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-400 dark:focus:border-yellow-400"
                                                            placeholder=""
                                                            required
                                                        />
                                                    </div>
                                                    <div>
                                                        <label
                                                            for="Cantidad"
                                                            class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-300"
                                                            >Cantidad</label
                                                        >
                                                        <input
                                                            type="number"
                                                            id="Cantidad"
                                                            class="bg-gray-50 text-center border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-400 dark:focus:border-yellow-400"
                                                            min="0"
                                                            placeholder=""
                                                            required
                                                        />
                                                    </div>
                                                </div>
                                                <div class="mb-6">
                                                    <label
                                                        for="Descripcion"
                                                        class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-300"
                                                        >Descripción</label
                                                    >
                                                    <textarea
                                                        type="email"
                                                        id="Descripcion"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-400 dark:focus:border-yellow-400"
                                                        required
                                                    />
                                                </div>
                                                <div
                                                    class="grid gap-6 mb-6 lg:grid-cols-2"
                                                >
                                                    <div>
                                                        <label
                                                            for="Peso_Product"
                                                            class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-300"
                                                            >Peso (Lb)</label
                                                        >
                                                        <input
                                                            type="number"
                                                            id="Peso_Product"
                                                            class="bg-gray-50 text-center border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-400 dark:focus:border-yellow-400"
                                                            min="0"
                                                            value="0.00"
                                                            step="0.01"
                                                            pattern="^\d+(?:\.\d{1,2})?$"
                                                            required
                                                        />
                                                    </div>
                                                    <div>
                                                        <label
                                                            for="Precio_Product"
                                                            class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-300"
                                                            >Precio ($)</label
                                                        >
                                                        <input
                                                            type="number"
                                                            id="Precio_Product"
                                                            class="bg-gray-50 text-center border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-400 dark:focus:border-yellow-400"
                                                            min="0"
                                                            value="0.00"
                                                            step="0.01"
                                                            pattern="^\d+(?:\.\d{1,2})?$"
                                                            required
                                                        />
                                                    </div>
                                                </div>
                                                <button
                                                    type="submit"
                                                    class="text-white bg-zinc-900 hover:bg-yellow-400 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-yellow-400 dark:hover:bg-yellow-400"
                                                >
                                                    Guardar
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                    <footer
                        class="bg-white md:flex md:items-center md:justify-between shadow rounded-lg p-4 md:p-6 xl:p-8 my-6 mx-4"
                    >
                        <ul class="flex items-center flex-wrap mb-6 md:mb-0">
                            <li>
                                <a
                                    href="/#About"
                                    class="text-base font-fold text-gray-500 hover:text-yellow-400 mr-4 md:mr-6"
                                    >Nosotros</a
                                >
                            </li>
                            <li>
                                <a
                                    href="/#Contact"
                                    class="text-base font-fold text-gray-500 hover:text-yellow-400 mr-4 md:mr-6"
                                    >Contáctanos</a
                                >
                            </li>
                            <li>
                                <a
                                    href="https://policies.google.com/privacy?hl=es"
                                    Target="_blank"
                                    class="text-base font-fold text-gray-500 hover:text-yellow-400 mr-4 md:mr-6"
                                    >Políticas de Privacidad</a
                                >
                            </li>
                        </ul>
                        <div class="flex sm:justify-center space-x-6">
                            <a
                                href="https://www.facebook.com/impotractorsa/"
                                class="text-gray-500 hover:text-gray-900"
                            >
                                <svg
                                    class="h-5 w-5"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                    aria-hidden="true"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </a>
                        </div>
                    </footer>
                    <br />
                    <p class="text-center text-base text-gray-500 my-10">
                        &copy; 2005-2022
                        <a
                            href="https://www.facebook.com/impotractorsa/"
                            class="hover:text-yellow-400"
                            target="_blank"
                            >Impotractor S.A.</a
                        >
                        Todos los derechos reservados.
                    </p>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
