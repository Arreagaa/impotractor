<script setup>
import ICircles from "./utils/ICircles.vue";
import IInformation from "../IContact/IInformation.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import { ref } from "vue";
import { GoogleMap, Marker } from "vue3-google-map";

const center = ref({ lat: 14.6094559723096, lng: -90.54014887218062 });
const form = useForm({
    name: "",
    email: "",
    phone: "",
    body: "",
});

function cleanForm() {
    form.reset();
}

const submit = () => {
    form.post(route("contact"), {
        onSuccess: () => cleanForm(),
        preserveScroll: true,
    });
};
</script>
<template>
    <section class="pb-16 overflow-hidden relative z-10 max-w-app">
        <div class="container">
            <div class="flex flex-wrap lg:justify-between -mx-4">
                <div class="w-full lg:w-1/2 xl:w-6/12 px-4">
                    <div class="max-w-[570px] mb-12 lg:mb-0">
                        <h2
                            class="text-dark mb-6 uppercase font-bold text-[20px] sm:text-[20px] lg:text-[20px] xl:text-[20px]"
                        >
                            Contáctanos y Cotiza
                        </h2>
                        <div class="leading-relaxed mb-9">
                            <GoogleMap
                                api-key="AIzaSyCq7aHTKV601i0b1fosJWMDZcgZizakR1A"
                                style="width: 100%; height: 200px"
                                :center="center"
                                :zoom="15"
                            >
                                <Marker :options="{ position: center }" />
                            </GoogleMap>
                        </div>
                        <IInformation />
                    </div>
                </div>
                <div class="w-full lg:w-1/2 xl:w-5/12 px-4">
                    <div
                        class="bg-white relative rounded-lg p-8 sm:p-12 shadow-lg"
                    >
                        <form @submit.prevent="submit" method="POST">
                            <div class="mb-6">
                                <input
                                    v-if="form.errors.name"
                                    v-model="form.name"
                                    type="text"
                                    placeholder="Nombre"
                                    class="w-full rounded py-3 px-[14px] text-body-color text-base border border-[f0f0f0] outline-none focus-visible:shadow-none focus-form focus-danger"
                                />
                                <span
                                    v-if="form.errors.name"
                                    class="text-sm m-2 text-red-400"
                                >
                                    {{ form.errors.name }}
                                </span>
                                <input
                                    v-else
                                    v-model="form.name"
                                    type="text"
                                    placeholder="Nombre"
                                    class="w-full rounded py-3 px-[14px] text-body-color text-base border border-[f0f0f0] outline-none focus-visible:shadow-none focus-form"
                                />
                            </div>
                            <div class="mb-6">
                                <input
                                    v-if="form.errors.email"
                                    v-model="form.email"
                                    type="email"
                                    placeholder="Correo Electrónico"
                                    class="w-full rounded py-3 px-[14px] text-body-color text-base border border-[f0f0f0] outline-none focus-visible:shadow-none focus-form focus-danger"
                                />
                                <span
                                    v-if="form.errors.email"
                                    class="text-sm m-2 text-red-400"
                                >
                                    {{ form.errors.email }}
                                </span>
                                <input
                                    v-else
                                    v-model="form.email"
                                    type="email"
                                    placeholder="Correo Electrónico"
                                    class="w-full rounded py-3 px-[14px] text-body-color text-base border border-[f0f0f0] outline-none focus-visible:shadow-none focus-form"
                                />
                            </div>
                            <div class="mb-6">
                                <input
                                    v-if="form.errors.phone"
                                    v-model="form.phone"
                                    type="tel"
                                    placeholder="Número de teléfono"
                                    class="w-full rounded py-3 px-[14px] text-body-color text-base border border-[f0f0f0] outline-none focus-visible:shadow-none focus-form focus-danger"
                                />
                                <span
                                    v-if="form.errors.phone"
                                    class="text-sm m-2 text-red-400"
                                >
                                    {{ form.errors.phone }}
                                </span>
                                <input
                                    v-else
                                    v-model="form.phone"
                                    type="tel"
                                    placeholder="Número de teléfono"
                                    class="w-full rounded py-3 px-[14px] text-body-color text-base border border-[f0f0f0] outline-none focus-visible:shadow-none focus-form"
                                />
                            </div>
                            <div class="mb-6">
                                <textarea
                                    v-if="form.errors.body"
                                    v-model="form.body"
                                    rows="6"
                                    placeholder="Mensaje o Cotización"
                                    class="w-full rounded py-3 px-[14px] text-body-color text-base border border-[f0f0f0] resize-none outline-none focus-visible:shadow-none focus-form focus-danger"
                                ></textarea>
                                <span
                                    v-if="form.errors.body"
                                    class="text-sm m-2 text-red-400"
                                >
                                    {{ form.errors.body }}
                                </span>
                                <textarea
                                    v-else
                                    v-model="form.body"
                                    rows="6"
                                    placeholder="Mensaje o Cotización"
                                    class="w-full rounded py-3 px-[14px] text-body-color text-base border border-[f0f0f0] resize-none outline-none focus-visible:shadow-none focus-form"
                                ></textarea>
                            </div>
                            <div>
                                <button
                                    type="submit"
                                    class="w-full text-white bg-zinc-900 rounded border border-primary p-3 transition hover:bg-yellow-400"
                                >
                                    Enviar
                                </button>
                            </div>
                        </form>
                        <div>
                            <ICircles />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
