<script>
export default {
    props: {
        cotizationOrder: Object,
        formOrder: Object,
        cotization: Object,
        oldGrandTotal: Number,
    },
};
</script>
<template>
    <button
        onclick="document.getElementById('myModal').showModal()"
        id="btn"
        class="inline-flex items-center text-white bg-zinc-900 hover:bg-yellow-400 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="w-6 h-6"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M7.5 7.5h-.75A2.25 2.25 0 004.5 9.75v7.5a2.25 2.25 0 002.25 2.25h7.5a2.25 2.25 0 002.25-2.25v-7.5a2.25 2.25 0 00-2.25-2.25h-.75m0-3l-3-3m0 0l-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 012.25 2.25v7.5a2.25 2.25 0 01-2.25 2.25h-7.5a2.25 2.25 0 01-2.25-2.25v-.75"
            />
        </svg>

        Ordenar
    </button>

    <dialog id="myModal" class="h-98 w-max-app bg-white rounded-md">
        <div class="flex flex-col w-full h-auto">
            <div
                class="flex w-full h-auto justify-center items-center bg-gray-200 rounded text-center text-gray-500"
            >
                <div
                    class="flex w-10/12 h-auto py-3 justify-left items-left text-2xl font-bold"
                >
                    Datos para la Orden
                </div>
                <div
                    onclick="document.getElementById('myModal').close();"
                    class="flex w-1/12 h-auto justify-center cursor-pointer"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="#000000"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="feather feather-x"
                    >
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </div>
            </div>
            <div
                class="flex max-w-app h-auto py-10 px-2 justify-center items-center"
            >
                <div class="max-w-2xl mx-auto bg-white p-4">
                    <form @submit.prevent="$emit('cotizationOrder')">
                        <div class="grid gap-6 mb-6 lg:grid-cols-2">
                            <div>
                                <label
                                    for="nit"
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                    >NIT</label
                                >
                                <input
                                    v-model="formOrder.nit"
                                    type="text"
                                    id="nit"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus-form"
                                    placeholder="NIT del Cliente"
                                    required
                                />
                            </div>
                            <div>
                                <label
                                    for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                    >Cliente</label
                                >
                                <input
                                    v-model="formOrder.client"
                                    type="text"
                                    id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus-form"
                                    placeholder="Nombre del Cliente"
                                    required
                                />
                            </div>
                            <div>
                                <label
                                    for="contact"
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                    >Contacto</label
                                >
                                <input
                                    v-model="formOrder.contact"
                                    type="text"
                                    id="contact"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus-form"
                                    placeholder="Contacto del Cliente"
                                    required
                                />
                            </div>
                            <div>
                                <label
                                    for="phone"
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                    >Teléfono</label
                                >
                                <input
                                    v-model="formOrder.phone"
                                    type="tel"
                                    id="phone"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus-form"
                                    placeholder="(+502)"
                                    pattern="\d{4}[- ]?\d{4}$"
                                    required
                                />
                            </div>
                            <div>
                                <label
                                    for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                    >Correo Electrónico</label
                                >
                                <input
                                    v-model="formOrder.email"
                                    type="email"
                                    id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus-form"
                                    placeholder="@gmail.com"
                                    required
                                />
                            </div>
                            <div>
                                <label
                                    for="city"
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                    >Ciudad</label
                                >
                                <input
                                    v-model="formOrder.city"
                                    type="text"
                                    id="city"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus-form"
                                    placeholder="Ciudad de Guatemala"
                                    required
                                />
                            </div>
                        </div>
                        <div class="mb-6">
                            <label
                                for="pay"
                                class="block mb-2 text-sm font-medium text-gray-900"
                                >Forma de Pago</label
                            >
                            <input
                                v-model="formOrder.paymentMethod"
                                type="text"
                                id="pay"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus-form"
                                placeholder="Forma de Pago de Cliente"
                                required
                            />
                        </div>
                        <div class="grid gap-6 mb-6 lg:grid-cols-2">
                            <div>
                                <label
                                    for="type"
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                    >Tipo de Cotización</label
                                >
                                <select
                                    :value="this.cotization.transport"
                                    id="transport"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5 focus-form"
                                    disabled
                                >
                                    <option selected>Elegir Cotización</option>
                                    <option value="Stock">Stock</option>
                                    <option value="Aereo">Aéreo Express</option>
                                    <option value="Reservado">Reservado</option>
                                    <option value="Reservado">Courier</option>
                                </select>
                            </div>
                            <div>
                                <label
                                    for="percentage"
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                    >Descuento (Q)</label
                                >
                                <input
                                    :value="this.oldGrandTotal"
                                    type="text"
                                    id="percentage"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus-form"
                                    placeholder="Se aplico un Descuento del 20%"
                                    required
                                    disabled
                                />
                            </div>
                        </div>
                        <button
                            type="submit"
                            class="inline-flex items-center text-white bg-zinc-900 hover:bg-yellow-400 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                        >
                            Guardar
                        </button>
                    </form>

                    <p class="lg:block hidden normal-case mt-5 items-center">
                        ¡Más que repuestos, todo un servicio! Encuentra lo que
                        buscas con nosotros, somos
                        <a
                            href="https://www.facebook.com/impotractorsa/"
                            class="hover:text-yellow-400"
                            target="_blank"
                            >Impotractor S.A.</a
                        >
                        Todos los derechos reservados.
                    </p>
                    <p class="lg:hidden normal-case mt-5 items-center">
                        ¡Más que repuestos, todo un servicio! Encuentra lo que
                        buscas con nosotros.
                    </p>
                </div>
            </div>
        </div>
    </dialog>
</template>
<style>
dialog[open] {
    animation: appear 0.15s cubic-bezier(0, 1.8, 1, 1.8);
}

dialog::backdrop {
    background: linear-gradient(
        45deg,
        rgba(0, 0, 0, 0.5),
        rgba(54, 54, 54, 0.5)
    );
    backdrop-filter: blur(3px);
}

@keyframes appear {
    from {
        opacity: 0;
        transform: translateX(-3rem);
    }

    to {
        opacity: 1;
        transform: translateX(0);
    }
}
</style>
