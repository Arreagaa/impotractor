<template>
  <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
    <td class="border-grey-light border hover:bg-gray-100 p-3">
      {{ item.partNumber }}
    </td>
    <td class="border-grey-light border hover:bg-gray-100 p-3">
      {{ item.quantity }}
    </td>
    <td class="border-grey-light border hover:bg-gray-100 p-3">
      {{ item.description }}
    </td>
    <td class="border-grey-light border hover:bg-gray-100 p-3">
      {{ item.weightUnit }}
    </td>
    <td class="border-grey-light border hover:bg-gray-100 p-3">
      {{ item.price }}
    </td>

    <td class="border-grey-light border hover:bg-gray-100 p-3">
      <input
        v-model="itemable.percentage"
        type="text"
        @keydown.enter="upodateItem"
      />
    </td>
    <td class="border-grey-light border hover:bg-gray-100 p-3">
      {{ itemable.total_unit }}
    </td>
    <td class="border-grey-light border hover:bg-gray-100 p-3">
      {{ itemable.total }}
    </td>
  </tr>
</template>

<script>
export default {
  props: {
    item: Object,
    cotization: Object,
  },
  data() {
    return {
      prices: {
        35: {
          unit: 0,
          total: 0,
        },
        30: {
          unit: 0,
          total: 0,
        },
        25: {
          unit: 0,
          total: 0,
        },
      },
      itemable: {
        id: 0,
        percentage: 0,
        total_unit: 0,
        total: 0,
      },
    };
  },
  created() {
    this.calculate();
  },
  methods: {
    upodateItem() {
      this.itemable.total =
        parseFloat(this.itemable.percentage) *
        parseFloat(this.itemable.total_unit);

      console.log(this.itemable);
    },
    calculate() {
      // ac{a}
    },
  },
  watch: {
    itemable: {
      handler: function (val) {
        this.itemable.total = val.total;
        this.itemable.total_unit = val.total_unit;
        this.itemable.total = val.total;
      },
      deep: true,
      immediate: true,
    },
  },
};
</script>

<style>
</style>