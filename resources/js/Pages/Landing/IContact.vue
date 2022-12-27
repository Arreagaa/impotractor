<script setup>
import ICircles from "./utils/ICircles.vue";
import IInformation from "../IContact/IInformation.vue";
import { useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    name: "",
    email: "",
    phone: "",
    body: "",
});

const submit = () => {
    form.post(route("contact"), {
        onSuccess: () => form.reset(),
    });
};
</script>
<template>
    <!-- ====== Contact Section Start -->
    <section class="pb-16 overflow-hidden relative z-10 max-w-app">
        <div class="container">
            <div class="flex flex-wrap lg:justify-between -mx-4">
                <IInformation />
                <div class="w-full lg:w-1/2 xl:w-5/12 px-4">
                    <div
                        class="bg-white relative rounded-lg p-8 sm:p-12 shadow-lg"
                    >
                        <form @submit.prevent="submit" method="POST">
                            <div class="mb-6">
                                <input
                                    v-model="form.name"
                                    type="text"
                                    placeholder="Nombre"
                                    name="Nombre&nbsp;del&nbsp;Cliente"
                                    class="w-full rounded py-3 px-[14px] text-body-color text-base border border-[f0f0f0] outline-none focus-visible:shadow-none focus:border-primary"
                                    required
                                />
                            </div>
                            <div class="mb-6">
                                <input
                                    v-model="form.email"
                                    type="email"
                                    placeholder="Correo Electrónico"
                                    name="Correo&nbsp;Electrónico"
                                    class="w-full rounded py-3 px-[14px] text-body-color text-base border border-[f0f0f0] outline-none focus-visible:shadow-none focus:border-primary"
                                    required
                                />
                            </div>
                            <div class="mb-6">
                                <input
                                    v-model="form.phone"
                                    type="text"
                                    placeholder="Número de teléfono"
                                    name="Número&nbsp;de&nbsp;Teléfono"
                                    class="w-full rounded py-3 px-[14px] text-body-color text-base border border-[f0f0f0] outline-none focus-visible:shadow-none focus:border-primary"
                                    required
                                />
                            </div>
                            <div class="mb-6">
                                <textarea
                                    v-model="form.body"
                                    rows="6"
                                    placeholder="Mensaje o Cotización"
                                    name="Mensaje&nbsp;o&nbsp;Cotización"
                                    class="w-full rounded py-3 px-[14px] text-body-color text-base border border-[f0f0f0] resize-none outline-none focus-visible:shadow-none focus:border-primary"
                                    required
                                ></textarea>
                            </div>
                            <div>
                                <button
                                    type="submit"
                                    onclick="location.href = 'http://127.0.0.1:8000/Succes'"
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
    <!-- ====== Contact Section End -->
</template>
