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
    cotization: {
      type: Object,
      default: () => ({
        id: 0,
        reference: "",
        is_ordered: false,
        provider_code: "",
        rate: 0.0,
        transport: "",
        extra_shipping: 0,
        total_weight: 0,
        items: [],
      }),
    },
  },
  data() {
    return {
      items: [],
      itemsUpdate: [],
      form: {
        cotizationId: 0,
        reference: "",
        is_ordered: false,
        provider_code: "",
        rate: 0.0,
        transport: "",
        extra_shipping: 0,
        total_weight: 0,
        /*ITEMS*/
        partNumber: "",
        quantity: 2,
        description: "",
        weightUnit: 0,
        price: 0,
      },
      formOrder: {
        cotizationId: 0,
      },
      alertSuccess: false,
    };
  },
  mounted() {
    this.form = useForm(this.form);
    this.getCotization();
  },
  watch: {
    cotization() {
      this.getCotization();
    },
  },
  methods: {
    getCotization() {
      if (this.cotization) {
        this.form.cotizationId = this.cotization.id;
        this.form.reference = this.cotization.reference;
        this.form.is_ordered = this.cotization.is_ordered;
        this.form.provider_code = this.cotization.provider_code;
        this.form.rate = this.cotization.rate;
        this.form.transport = this.cotization.transport;
        this.form.extra_shipping = this.cotization.extra_shipping;
        this.form.total_weight = this.cotization.items_sum_weight_unit;
        this.items = this.cotization.items;
      }
    },
    submit() {
      this.form.post(route("cotizations.store"), {
        errorBag: "processForm",
        forceFormData: true,
        preserveScroll: true,
        onSuccess: (e) => {
          console.log("success", e);
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
      axios
        .post(route("cotization.update-items"), {
          items: this.itemsUpdate,
          cotizationId: this.form.cotizationId,
        })
        .then((response) => {
          console.log(response);
          this.alertSuccess = true;
        })
        .catch((error) => {
          console.log(error);
        })
        .finally(() => {
          this.itemsUpdate = [];
        });
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
                    <span v-if="alertSuccess">ALertaaaaaaa</span>
                    <div class="max-w-full mx-auto bg-white pt-6 pr-6 pl-6">
                      <form @submit.prevent="submit">
                        <div class="grid gap-6 mb-6 lg:grid-cols-4">
                          <div>
                            <label
                              for="reference"
                              class="
                                block
                                mb-2
                                text-base
                                font-medium
                                text-gray-900
                              "
                              >Referencia de la Cotización</label
                            >
                            <input
                              v-model="form.reference"
                              type="text"
                              id="reference"
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
                              "
                              >Código del proveedor</label
                            >
                            <input
                              v-model="form.provider_code"
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
                              for="rate"
                              class="
                                block
                                mb-2
                                text-base
                                font-medium
                                text-gray-900
                              "
                              >Tipo de Cambio</label
                            >
                            <input
                              v-model="form.rate"
                              type="number"
                              id="rate"
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
                              for="transport"
                              class="
                                block
                                mb-2
                                text-base
                                font-medium
                                text-gray-900
                              "
                              >Tipo de Transporte
                            </label>
                            <select
                              v-model="form.transport"
                              id="transport"
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
                              <option selected>Elegir un transport</option>
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
                              "
                              >Flete Extra ($)</label
                            >
                            <input
                              v-model="form.extra_shipping"
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
                              "
                              >Peso total (Lb)</label
                            >
                            <input
                              v-model="form.total_weight"
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
                            />
                          </div>
                          <div></div>
                          <div></div>
                          <div>
                            <label
                              for="Parte"
                              class="
                                block
                                mb-2
                                text-base
                                font-medium
                                text-gray-900
                              "
                              >Número de Parte</label
                            >
                            <input
                              v-model="form.partNumber"
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
                              for="quantity"
                              class="
                                block
                                mb-2
                                text-base
                                font-medium
                                text-gray-900
                              "
                              >Cantidad</label
                            >
                            <input
                              v-model="form.quantity"
                              type="number"
                              id="quantity"
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
                            for="description"
                            class="
                              block
                              mb-2
                              text-base
                              font-medium
                              text-gray-900
                            "
                            >Descripción</label
                          >
                          <textarea
                            v-model="form.description"
                            type="email"
                            id="description"
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
                              "
                              >Peso (Lb)</label
                            >
                            <input
                              v-model="form.weightUnit"
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
                              for="price_Product"
                              class="
                                block
                                mb-2
                                text-base
                                font-medium
                                text-gray-900
                              "
                              >Precio ($)</label
                            >
                            <input
                              v-model="form.price"
                              type="number"
                              id="price_Product"
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
            <div v-if="cotization">
              <IShowCotization
                :cotization-items="cotization.items"
                :cotization="cotization"
                @delete="deleteItem($event)"
                @update-item="updateItem($event)"
              />
            </div>

            <button @click="saveItems" class="btn btn-primary">Guardar</button>
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
