<script>
import IBtn from "./utils/IBtn.vue";

export default {
    props: {
        cotizationOrder: Object,
        cotization: Object,
    },
    components: {
        IBtn,
    },
};
</script>
<template>
    <div
        class="relative mt-8 block p-8 overflow-hidden border bg-white border-slate-100 shadow rounded-lg ml-6 mr-6"
    >
        <div
            class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 md:gap-8 gap-4"
        >
            <div class="flex flex-col flex-shrink-0">
                <div class="text-2xl font-bold text-slate-900">
                    Datos de la Orden
                </div>
                <p class="mt-1 text-normal font-lg text-zinc-900">
                    Descuento en la Cotización:
                    {{ this.cotizationOrder.discount }}%
                </p>
                <div class="flex items-center gap-x-4 mt-2">
                    <IBtn />
                </div>
            </div>
            <div class="sm:ml-0 ml-8 flex flex-col">
                <h2 class="text-base font-semibold leading-4 text-gray-800">
                    NIT: {{ this.cotizationOrder.nit }}
                </h2>
                <span
                    class="focus:outline-none focus:underline font-semibold text-base leading-4 mt-6 text-gray-800"
                    >Cliente: {{ this.cotizationOrder.client }}</span
                >
                <span
                    class="focus:outline-none focus:underline font-semibold text-base leading-4 mt-6 text-gray-800"
                    >Contacto: {{ this.cotizationOrder.contact }}</span
                >
                <span
                    class="focus:outline-none focus:underline font-semibold text-base leading-4 mt-6 text-gray-800"
                    >Correo: {{ this.cotizationOrder.email }}</span
                >
            </div>
            <div class="flex flex-col">
                <h2 class="text-base font-semibold leading-4 text-gray-800">
                    Teléfono: {{ this.cotizationOrder.phone }}
                </h2>
                <span
                    class="focus:outline-none focus:underline font-semibold text-base leading-4 mt-6 text-gray-800"
                    >Ciudad: {{ this.cotizationOrder.city }}</span
                >
                <span
                    class="focus:outline-none focus:underline font-semibold text-base leading-4 mt-6 text-gray-800"
                    >Forma de Pago:
                    {{ this.cotizationOrder.paymentMethod }}</span
                >
                <span
                    class="focus:outline-none focus:underline font-semibold text-base leading-4 mt-6 text-gray-800"
                    >Tipo de Cotización: {{ this.cotizationOrder.type }}</span
                >
            </div>
            <div class="mt-10 lg:block hidden mr-12">
                <img
                    src="/images/impotractor/impotractor-logo-x2.png"
                    alt="image"
                    class="rounded mx-auto d-block"
                />
            </div>
        </div>
        <div class="mt-10 lg:hidden">
            <img
                src="/images/impotractor/impotractor-logo.png"
                alt="image"
                class="rounded mx-auto d-block"
            />
        </div>
    </div>
</template>
