<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import AppDashboard from "../../Layouts/AppDashboard.vue";
import IShowCotization from "./IShowCotization.vue";
import { useForm } from "@inertiajs/inertia-vue3";

export default {
  components: {
    AppLayout,
    AppDashboard,
    IShowCotization,
  },
  props: {
    errors: Object,
  },
  data() {
    return {
      items: [],
      itemsUpdate: [],
      form: {
        cotizationId: 0,
        referencia: null,
        status: false,
        codigoProveedor: null,
        cambio: null,
        transporte: null,
        fleteExtra: null,
        pesoTotal: null,
        numeroParte: null,
        cantidad: null,
        descripcion: null,
        pesoUnidad: null,
        precio: null,
      },
      formOrder: {
        cotizationId: 0,
      },
    };
  },
  created() {
    this.form = useForm(this.form);
  },
  methods: {
    submit() {
      this.form.post(route("cotizations.store"), {
        errorBag: "processForm",
        forceFormData: true,
        preserveScroll: true,
        onSuccess: (e) => {
          console.log("success", e);
          this.items = e.data.items;
          this.form.total = e.data.cotization.total;
        },
        onError: (errors) => {
          console.log("errorsin", errors);
        },
      });
    },
    updateItem(item) {
      this.itemsUpdate.push(item);
    },
    saveItems() {
      axios.post(route("cotizations.update-items"), this.itemsUpdate);
    },
    deleteItem() {
      this.form.delete(route("cotizations.destroy", this.form.cotizationId), {
        errorBag: "processForm",
        forceFormData: true,
        preserveScroll: true,
        onSuccess: (e) => {
          console.log("success", e);
          this.items = e.data.items;
          this.form.total = e.data.cotization.total;
        },
        onError: (errors) => {
          console.log("errorsin", errors);
        },
      });
    },
  },
};
</script>

<template>
  <AppLayout class="w-full" title="Cotizaciones">
    <div>
      <div class="flex overflow-hidden bg-white">
        <AppDashboard />
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
              <div class="grid grid-cols-1 2xl:grid-cols-1 xl:gap-4 my-4">
                <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
                  <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-bold leading-none text-gray-900">
                      Cotizador
                    </h3>
                  </div>
                  <div class="flow-root">
                    <div class="max-w-full mx-auto bg-white pt-6 pr-6 pl-6">
                      <form @submit.prevent="submit">
                        <div class="grid gap-6 mb-6 lg:grid-cols-4">
                          <div>
                            <label
                              for="referencia"
                              class="
                                block
                                mb-2
                                text-base
                                font-medium
                                text-gray-900
                                dark:text-gray-300
                              "
                              >Referencia de la Cotización</label
                            >
                            <input
                              v-model="form.referencia"
                              type="text"
                              id="referencia"
                              class="
                                bg-gray-50
                                border border-gray-300
                                text-gray-900 text-sm
                                rounded-lg
                                focus:ring-yellow-400 focus:border-yellow-400
                                block
                                w-full
                                p-2.5
                                dark:bg-gray-700
                                dark:border-gray-600
                                dark:placeholder-gray-400
                                dark:text-white
                                dark:focus:ring-yellow-400
                                dark:focus:border-yellow-400
                              "
                              placeholder=""
                              required
                            />
                          </div>
                          <div>
                            <label
                              for="proveedor"
                              class="
                                block
                                mb-2
                                text-base
                                font-medium
                                text-gray-900
                                dark:text-gray-300
                              "
                              >Código del proveedor</label
                            >
                            <input
                              v-model="form.codigoProveedor"
                              type="text"
                              id="proveedor"
                              class="
                                bg-gray-50
                                border border-gray-300
                                text-gray-900 text-sm
                                rounded-lg
                                focus:ring-yellow-400 focus:border-yellow-400
                                block
                                w-full
                                p-2.5
                                dark:bg-gray-700
                                dark:border-gray-600
                                dark:placeholder-gray-400
                                dark:text-white
                                dark:focus:ring-yellow-400
                                dark:focus:border-yellow-400
                              "
                              placeholder=""
                              required
                            />
                          </div>
                          <div>
                            <label
                              for="Cambio"
                              class="
                                block
                                mb-2
                                text-base
                                font-medium
                                text-gray-900
                                dark:text-gray-300
                              "
                              >Tipo de Cambio</label
                            >
                            <input
                              v-model="form.cambio"
                              type="number"
                              id="Cambio"
                              class="
                                bg-gray-50
                                text-center
                                border border-gray-300
                                text-gray-900 text-sm
                                rounded-lg
                                focus:ring-yellow-400 focus:border-yellow-400
                                block
                                w-full
                                p-2.5
                                dark:bg-gray-700
                                dark:border-gray-600
                                dark:placeholder-gray-400
                                dark:text-white
                                dark:focus:ring-yellow-400
                                dark:focus:border-yellow-400
                              "
                              min="0.00"
                              placeholder="7.75"
                              step="0.01"
                              pattern="^\d+(?:\.\d{1,2})?$"
                              required
                            />
                          </div>
                          <div>
                            <label
                              for="Transporte"
                              class="
                                block
                                mb-2
                                text-base
                                font-medium
                                text-gray-900
                                dark:text-gray-300
                              "
                              >Tipo de Transporte
                            </label>
                            <select
                              v-model="form.transporte"
                              id="Transporte"
                              class="
                                bg-gray-50
                                border border-gray-300
                                text-gray-900 text-sm
                                rounded-lg
                                focus:ring-yellow-400 focus:border-yellow-400
                                block
                                w-full
                                p-2.5
                                dark:bg-gray-700
                                dark:border-gray-600
                                dark:placeholder-gray-400
                                dark:text-white
                                dark:focus:ring-yellow-400
                                dark:focus:border-yellow-400
                              "
                            >
                              <option selected>Elegir un Transporte</option>
                              <option value="Courier">Courier</option>
                              <option value="Aereo">Aéreo Express</option>
                              <option value="Reservado">Reservado</option>
                            </select>
                          </div>
                          <div>
                            <label
                              for="Flete"
                              class="
                                block
                                mb-2
                                text-base
                                font-medium
                                text-gray-900
                                dark:text-gray-300
                              "
                              >Flete Extra ($)</label
                            >
                            <input
                              v-model="form.fleteExtra"
                              type="number"
                              id="Flete"
                              min="0"
                              placeholder="0.00"
                              class="
                                bg-gray-50
                                text-center
                                border border-gray-300
                                text-gray-900 text-sm
                                rounded-lg
                                focus:ring-yellow-400 focus:border-yellow-400
                                block
                                w-full
                                p-2.5
                                dark:bg-gray-700
                                dark:border-gray-600
                                dark:placeholder-gray-400
                                dark:text-white
                                dark:focus:ring-yellow-400
                                dark:focus:border-yellow-400
                              "
                              step="0.01"
                              pattern="^\d+(?:\.\d{1,2})?$"
                              required
                            />
                          </div>
                          <div>
                            <label
                              for="Peso"
                              class="
                                block
                                mb-2
                                text-base
                                font-medium
                                text-gray-900
                                dark:text-gray-300
                              "
                              >Peso total (Lb)</label
                            >
                            <input
                              v-model="form.pesoTotal"
                              type="number"
                              id="Peso"
                              class="
                                bg-gray-50
                                text-center
                                border border-gray-300
                                text-gray-900 text-sm
                                rounded-lg
                                focus:ring-yellow-400 focus:border-yellow-400
                                block
                                w-full
                                p-2.5
                                dark:bg-gray-700
                                dark:border-gray-600
                                dark:placeholder-gray-400
                                dark:text-white
                                dark:focus:ring-yellow-400
                                dark:focus:border-yellow-400
                              "
                              min="0"
                              placeholder="0.00"
                              step="0.01"
                              pattern="^\d+(?:\.\d{1,2})?$"
                              required
                            />
                          </div>
                          <div>
                            <label
                              for="Parte"
                              class="
                                block
                                mb-2
                                text-base
                                font-medium
                                text-gray-900
                                dark:text-gray-300
                              "
                              >Número de Parte</label
                            >
                            <input
                              v-model="form.numeroParte"
                              type="text"
                              id="Parte"
                              class="
                                bg-gray-50
                                text-center
                                border border-gray-300
                                text-gray-900 text-sm
                                rounded-lg
                                focus:ring-yellow-400 focus:border-yellow-400
                                block
                                w-full
                                p-2.5
                                dark:bg-gray-700
                                dark:border-gray-600
                                dark:placeholder-gray-400
                                dark:text-white
                                dark:focus:ring-yellow-400
                                dark:focus:border-yellow-400
                              "
                              placeholder=""
                              required
                            />
                          </div>
                          <div>
                            <label
                              for="Cantidad"
                              class="
                                block
                                mb-2
                                text-base
                                font-medium
                                text-gray-900
                                dark:text-gray-300
                              "
                              >Cantidad</label
                            >
                            <input
                              v-model="form.cantidad"
                              type="number"
                              id="Cantidad"
                              class="
                                bg-gray-50
                                text-center
                                border border-gray-300
                                text-gray-900 text-sm
                                rounded-lg
                                focus:ring-yellow-400 focus:border-yellow-400
                                block
                                w-full
                                p-2.5
                                dark:bg-gray-700
                                dark:border-gray-600
                                dark:placeholder-gray-400
                                dark:text-white
                                dark:focus:ring-yellow-400
                                dark:focus:border-yellow-400
                              "
                              min="0"
                              placeholder=""
                              required
                            />
                          </div>
                        </div>
                        <div class="mb-6">
                          <label
                            for="Descripcion"
                            class="
                              block
                              mb-2
                              text-base
                              font-medium
                              text-gray-900
                              dark:text-gray-300
                            "
                            >Descripción</label
                          >
                          <textarea
                            v-model="form.descripcion"
                            type="email"
                            id="Descripcion"
                            class="
                              bg-gray-50
                              border border-gray-300
                              text-gray-900 text-sm
                              rounded-lg
                              focus:ring-yellow-400 focus:border-yellow-400
                              block
                              w-full
                              p-2.5
                              dark:bg-gray-700
                              dark:border-gray-600
                              dark:placeholder-gray-400
                              dark:text-white
                              dark:focus:ring-yellow-400
                              dark:focus:border-yellow-400
                            "
                            required
                          />
                        </div>
                        <div class="grid gap-6 mb-6 lg:grid-cols-2">
                          <div>
                            <label
                              for="Peso_Product"
                              class="
                                block
                                mb-2
                                text-base
                                font-medium
                                text-gray-900
                                dark:text-gray-300
                              "
                              >Peso (Lb)</label
                            >
                            <input
                              v-model="form.pesoUnidad"
                              type="number"
                              id="Peso_Product"
                              class="
                                bg-gray-50
                                text-center
                                border border-gray-300
                                text-gray-900 text-sm
                                rounded-lg
                                focus:ring-yellow-400 focus:border-yellow-400
                                block
                                w-full
                                p-2.5
                                dark:bg-gray-700
                                dark:border-gray-600
                                dark:placeholder-gray-400
                                dark:text-white
                                dark:focus:ring-yellow-400
                                dark:focus:border-yellow-400
                              "
                              min="0"
                              placeholder="0.00"
                              step="0.01"
                              pattern="^\d+(?:\.\d{1,2})?$"
                              required
                            />
                          </div>
                          <div>
                            <label
                              for="Precio_Product"
                              class="
                                block
                                mb-2
                                text-base
                                font-medium
                                text-gray-900
                                dark:text-gray-300
                              "
                              >Precio ($)</label
                            >
                            <input
                              v-model="form.precio"
                              type="number"
                              id="Precio_Product"
                              class="
                                bg-gray-50
                                text-center
                                border border-gray-300
                                text-gray-900 text-sm
                                rounded-lg
                                focus:ring-yellow-400 focus:border-yellow-400
                                block
                                w-full
                                p-2.5
                                dark:bg-gray-700
                                dark:border-gray-600
                                dark:placeholder-gray-400
                                dark:text-white
                                dark:focus:ring-yellow-400
                                dark:focus:border-yellow-400
                              "
                              min="0"
                              placeholder="0.00"
                              step="0.01"
                              pattern="^\d+(?:\.\d{1,2})?$"
                              required
                            />
                          </div>
                        </div>
                        <button
                          type="submit"
                          class="
                            text-white
                            bg-zinc-900
                            hover:bg-yellow-400
                            focus:ring-4 focus:outline-none
                            font-medium
                            rounded-lg
                            text-sm
                            w-full
                            sm:w-auto
                            px-5
                            py-2.5
                            text-center
                            dark:bg-yellow-400 dark:hover:bg-yellow-400
                          "
                        >
                          Guardar
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <IShowCotization
              :cotizations="items"
              @delete="deleteItem($event)"
              @update-item="updateItem($event)"
            />
            <button>guardar</button>
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
