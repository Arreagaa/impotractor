<template>
  <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
    <td class="border-grey-light border hover:bg-gray-100 p-3">Example</td>
    <td class="border-grey-light border hover:bg-gray-100 p-3">Example</td>
    <td class="border-grey-light border hover:bg-gray-100 p-3">Example</td>
    <td class="border-grey-light border hover:bg-gray-100 p-3">Example</td>
    <td class="border-grey-light border hover:bg-gray-100 p-3">Example</td>
    <td class="border-grey-light border hover:bg-gray-100 p-3">Example</td>
    <td class="border-grey-light border hover:bg-gray-100 p-3">Example</td>
    <td class="border-grey-light border hover:bg-gray-100 p-3">Example</td>
    <td class="border-grey-light border hover:bg-gray-100 p-3">Example</td>
    <td class="border-grey-light border hover:bg-gray-100 p-3">
      <input type="text" @keydown.enter="upodateItem" />
    </td>
    <td class="border-grey-light border hover:bg-gray-100 p-3">Example</td>
    <td
      @click="$emit('delete')"
      class="border-grey-light border hover:bg-gray-100 p-3"
    >
      Example
    </td>
  </tr>
</template>

<script>
export default {
  props: {
    item: Object,
  },
  data() {
    return {
      itemable: null,
    };
  },
  created() {
    this.itemable = this.item;
  },
  methods: {
    upodateItem() {
        this.$emit('update-item', this.itemable);
    },
  },
};
</script>

<style>
</style>