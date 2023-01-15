<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
    terms: false,
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <div class="bg-white">
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

                        <p class="mt-3 text-gray-500">
                            Regístrate para poder continuar
                        </p>
                    </div>

                    <div class="mt-8">
                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel for="name" value="Nombre" />
                                <TextInput
                                    id="name"
                                    v-model="form.name"
                                    type="text"
                                    class="mt-1 block w-full"
                                    required
                                    autofocus
                                    autocomplete="name"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.name"
                                />
                            </div>

                            <div class="mt-4">
                                <InputLabel
                                    for="email"
                                    value="Correo electrónico"
                                />
                                <TextInput
                                    id="email"
                                    v-model="form.email"
                                    type="email"
                                    class="mt-1 block w-full"
                                    required
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.email"
                                />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="password" value="Contraseña" />
                                <TextInput
                                    id="password"
                                    v-model="form.password"
                                    type="password"
                                    class="mt-1 block w-full"
                                    required
                                    autocomplete="new-password"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.password"
                                />
                            </div>

                            <div class="mt-4">
                                <InputLabel
                                    for="password_confirmation"
                                    value="Confirmar Contraseña"
                                />
                                <TextInput
                                    id="password_confirmation"
                                    v-model="form.password_confirmation"
                                    type="password"
                                    class="mt-1 block w-full"
                                    required
                                    autocomplete="new-password"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.password_confirmation"
                                />
                            </div>

                            <div
                                v-if="
                                    $page.props.jetstream
                                        .hasTermsAndPrivacyPolicyFeature
                                "
                                class="mt-4"
                            >
                                <InputLabel for="terms">
                                    <div class="flex items-center">
                                        <Checkbox
                                            id="terms"
                                            v-model:checked="form.terms"
                                            name="terms"
                                            required
                                        />

                                        <div class="ml-2">
                                            I agree to the
                                            <a
                                                target="_blank"
                                                :href="route('terms.show')"
                                                class="underline text-sm text-gray-600 hover:text-gray-900"
                                                >Terms of Service</a
                                            >
                                            and
                                            <a
                                                target="_blank"
                                                :href="route('policy.show')"
                                                class="underline text-sm text-gray-600 hover:text-gray-900"
                                                >Privacy Policy</a
                                            >
                                        </div>
                                    </div>
                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.terms"
                                    />
                                </InputLabel>
                            </div>

                            <div class="mt-6">
                                <button
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                    class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-zinc-900 rounded-md hover:bg-yellow-400 focus:outline-none"
                                >
                                    Regístrate
                                </button>
                            </div>
                        </form>

                        <p class="mt-6 text-sm text-center text-gray-400">
                            ¿Ya tienes cuenta?
                            <a
                                href="/login"
                                class="text-blue-500 focus:outline-none focus:underline hover:underline"
                                >Inicia Sesión</a
                            >.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
.img-login {
    background-image: url("/images/impotractor/main-bgx2.jpg");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
</style>
