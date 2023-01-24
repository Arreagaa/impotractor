<script>
import IBtn from "./utils/IBtn.vue";

export default {
    components: {
        IBtn,
    },
};
</script>
<!--<template>
    <div
        class="relative mt-8 block p-8 overflow-hidden border bg-white border-slate-100 rounded-base ml-6 mr-6"
    >
        <span class="absolute inset-x-0 bottom-0 h-2 bg-yellow-400"></span>

        <div class="justify-between sm:flex">
            <div>
                <h5 class="text-2xl font-bold text-slate-900">
                    Datos de la Orden
                </h5>
                <p class="mt-1 text-normal font-medium text-zinc-900">
                    Impotractor S.A.
                </p>
            </div>

            <div class="inline-flex place-items-end mt-2 sm:block">
                <IBtn />
            </div>
        </div>

        <section class="">
            <div class="flex mt-6">
                <div class="flex flex-col-reverse">
                    <dt class="text-sm font-medium text-zinc-900">NIT</dt>
                    <dd class="text-base text-slate-500">116383402</dd>
                </div>

                <div class="flex flex-col-reverse ml-3 sm:ml-36">
                    <dt class="text-sm font-medium text-zinc-900">Cliente</dt>
                    <dd class="text-base text-slate-500">Javier Rivas</dd>
                </div>

                <div class="flex flex-col-reverse ml-3 sm:ml-36">
                    <dt class="text-sm font-medium text-zinc-900">
                        Contacto
                    </dt>
                    <dd class="text-base text-slate-500">Javier Rivas</dd>
                </div>

                <div class="flex flex-col-reverse ml-3 sm:ml-36">
                    <dt class="text-sm font-medium text-zinc-900">
                        Correo Electrónico
                    </dt>
                    <dd class="text-base text-slate-500">
                        crjavier1021@gmail.com
                    </dd>
                </div>
            </div>

            <dl class="flex mt-6">
                <div class="flex flex-col-reverse">
                    <dt class="text-sm font-medium text-zinc-900">
                        Teléfono
                    </dt>
                    <dd class="text-base text-slate-500">42783573</dd>
                </div>

                <div class="flex flex-col-reverse ml-3 sm:ml-36">
                    <dt class="text-sm font-medium text-zinc-900">Ciudad</dt>
                    <dd class="text-base text-slate-500">Guatemala</dd>
                </div>

                <div class="flex flex-col-reverse ml-3 sm:ml-36">
                    <dt class="text-sm font-medium text-zinc-900">
                        Forma de Pago
                    </dt>
                    <dd class="text-base text-slate-500">Contacto</dd>
                </div>

                <div class="flex flex-col-reverse ml-3 sm:ml-36">
                    <dt class="text-sm font-medium text-zinc-900">Tipo</dt>
                    <dd class="text-base text-slate-500">Stock</dd>
                </div>
            </dl>
        </section>

        <section class="base:hidden">
            <div class="flex mt-6">
                <div class="flex flex-col-reverse">
                    <dt class="text-sm font-medium text-zinc-900">NIT</dt>
                    <dd class="text-sm text-slate-500">116383402</dd>
                </div>

                <div class="flex flex-col-reverse ml-3 sm:ml-36">
                    <dt class="text-sm font-medium text-zinc-900">Cliente</dt>
                    <dd class="text-sm text-slate-500">Javier Rivas</dd>
                </div>

                <div class="flex flex-col-reverse ml-3 sm:ml-36">
                    <dt class="text-sm font-medium text-zinc-900">Contacto</dt>
                    <dd class="text-sm text-slate-500">Javier Rivas</dd>
                </div>

                <div class="flex flex-col-reverse ml-3 sm:ml-36">
                    <dt class="text-sm font-medium text-zinc-900">
                        Correo Electrónico
                    </dt>
                    <dd class="text-sm text-slate-500">
                        crjavier1021@gmail.com
                    </dd>
                </div>
            </div>

            <dl class="flex mt-6">
                <div class="flex flex-col-reverse">
                    <dt class="text-sm font-medium text-zinc-900">Teléfono</dt>
                    <dd class="text-sm text-slate-500">42783573</dd>
                </div>

                <div class="flex flex-col-reverse ml-3 sm:ml-36">
                    <dt class="text-sm font-medium text-zinc-900">Ciudad</dt>
                    <dd class="text-sm text-slate-500">Guatemala</dd>
                </div>

                <div class="flex flex-col-reverse ml-3 sm:ml-36">
                    <dt class="text-sm font-medium text-zinc-900">
                        Forma de Pago
                    </dt>
                    <dd class="text-sm text-slate-500">Contacto</dd>
                </div>

                <div class="flex flex-col-reverse ml-3 sm:ml-36">
                    <dt class="text-sm font-medium text-zinc-900">Tipo</dt>
                    <dd class="text-sm text-slate-500">Stock</dd>
                </div>
            </dl>
        </section>
    </div>
</template>-->

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
                    Impotractor S.A.
                </p>
                <div class="flex items-center gap-x-4 mt-2">
                    <IBtn />
                </div>
            </div>
            <div class="sm:ml-0 ml-8 flex flex-col">
                <h2 class="text-base font-semibold leading-4 text-gray-800">
                    NIT: 116383402
                </h2>
                <span
                    class="focus:outline-none focus:underline font-semibold text-base leading-4 mt-6 text-gray-800"
                    >Cliente: Javier Rivas</span
                >
                <span
                    class="focus:outline-none focus:underline font-semibold text-base leading-4 mt-6 text-gray-800"
                    >Contacto: JR</span
                >
                <span
                    class="focus:outline-none focus:underline font-semibold text-base leading-4 mt-6 text-gray-800"
                    >Ciudad: Guatemala</span
                >
            </div>
            <div class="flex flex-col">
                <h2 class="text-base font-semibold leading-4 text-gray-800">
                    Teléfono: 42783573
                </h2>
                <span
                    class="focus:outline-none focus:underline font-semibold text-base leading-4 mt-6 text-gray-800"
                    >Correo Electrónico: XXXX</span
                >
                <span
                    class="focus:outline-none focus:underline font-semibold text-base leading-4 mt-6 text-gray-800"
                    >Forma de Pago: Contado</span
                >
                <span
                    class="focus:outline-none focus:underline font-semibold text-base leading-4 mt-6 text-gray-800"
                    >Tipo de Cotización: Stock</span
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
