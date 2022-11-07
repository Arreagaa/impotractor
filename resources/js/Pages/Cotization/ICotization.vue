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
                                        href="/cotization/#Calculator"
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
                                        href="/cotization/#Resumen"
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
                        <div class="pt-4 px-4" id="Calculator">
                            <div class="my-4">
                                <div
                                    class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full"
                                >
                                    <div
                                        class="flex items-center justify-between mb-4"
                                    >
                                        <h3
                                            class="text-xl font-bold leading-none text-gray-900"
                                        >
                                            Calculadora
                                        </h3>
                                    </div>
                                    <div
                                        class="flex items-center justify-center"
                                    >
                                        <div class="container">
                                            <table
                                                class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg"
                                            >
                                                <thead class="text-white">
                                                    <tr
                                                        class="bg-zinc-900 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0"
                                                    >
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            Número de Parte
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            Cantidad
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            Descripción
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            Peso neto (Lb)
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            Precio ($)
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            Precio (Q)
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            DAI
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            IVA
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            P. Unitario
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            Total
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody
                                                    class="flex-1 sm:flex-none"
                                                >
                                                    <tr
                                                        class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0"
                                                    >
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- total amount -->
                                            <div
                                                class="flex justify-end font-bold space-x-4 text-base border-t border-gray-100 px-5 py-2"
                                            >
                                                <div>Gran Total</div>
                                                <div>
                                                    <span>500.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-4 px-4" id="Resumen">
                            <div class="my-4">
                                <div
                                    class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full"
                                >
                                    <div
                                        class="flex items-center justify-between mb-4"
                                    >
                                        <h3
                                            class="text-xl font-bold leading-none text-gray-900"
                                        >
                                            Resumen
                                        </h3>
                                    </div>
                                    <div
                                        class="flex items-center justify-center"
                                    >
                                        <div class="container lg:block hidden">
                                            <table
                                                class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg"
                                            >
                                                <thead
                                                    class="w-full data overflow-hidden bg-white text-zinc-900"
                                                >
                                                    <tr>
                                                        <th
                                                            colspan="3"
                                                            class="p-2 border"
                                                        >
                                                            Información
                                                            Importante
                                                        </th>
                                                        <th
                                                            colspan="2"
                                                            class="p-2 border"
                                                        >
                                                            Precio a (35%)
                                                        </th>
                                                        <th
                                                            colspan="2"
                                                            class="p-2 border"
                                                        >
                                                            Precio a (30%)
                                                        </th>
                                                        <th
                                                            colspan="2"
                                                            class="p-2 border"
                                                        >
                                                            Precio a (25%)
                                                        </th>
                                                        <th
                                                            colspan="3"
                                                            class="p-2 border"
                                                        >
                                                            Precio Final
                                                        </th>
                                                    </tr>
                                                </thead>

                                                <thead class="text-white">
                                                    <tr
                                                        class="bg-zinc-900 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0"
                                                    >
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            Número de Parte
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            Cantidad
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            Descripción
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            P. Unitario
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            Total
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            P. Unitario
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            Total
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            P. Unitario
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            Total
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            Porcentaje
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            Unitario
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            Total
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody
                                                    class="flex-1 sm:flex-none"
                                                >
                                                    <tr
                                                        class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0"
                                                    >
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- total amount -->
                                            <div
                                                class="flex justify-end font-bold space-x-4 text-base border-t border-gray-100 px-5 py-2"
                                            >
                                                <div>Gran Total</div>
                                                <div>
                                                    <span>500.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container lg:hidden">
                                            <table
                                                class="flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg"
                                            >
                                                <thead class="text-white">
                                                    <tr
                                                        class="bg-zinc-900 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0"
                                                    >
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            Número de Parte
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            Cantidad
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            Descripción
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            P. Unitario (35%)
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            Total (35%)
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            P. Unitario (30%)
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            Total (30%)
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            P. Unitario (25%)
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            Total (25%)
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            Porcentaje Final
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            Unitario Final
                                                        </th>
                                                        <th
                                                            class="p-3 text-left"
                                                        >
                                                            Total Final
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody
                                                    class="flex-1 sm:flex-none"
                                                >
                                                    <tr
                                                        class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0"
                                                    >
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3"
                                                        >
                                                            Example
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- total amount -->
                                            <div
                                                class="flex justify-end font-bold space-x-4 text-base border-t border-gray-100 px-5 py-2"
                                            >
                                                <div>Gran Total</div>
                                                <div>
                                                    <span>500.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>

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

<style>
@media (min-width: 640px) {
    table {
        display: inline-table !important;
    }

    thead tr:not(:first-child) {
        display: none;
    }
}

td:not(:last-child) {
    border-bottom: 1;
}

th:not(:last-child) {
    border-bottom: 2px solid rgba(0, 0, 0, 0.1);
}

.data {
    text-align: center;
    font-weight: bold;
}
</style>
