<script setup>
defineProps({
  title: {
    type: String,
    required: true
  },
});
</script>
<template>
  <div class="w-full flex justify-center top-6 py-8 right-0 left-0 uppercase">
    <div class="section-title">
        <h1 class="card-title">{{ title }}</h1>
    </div>
  </div>
</template>

<style>
.section-title {
  text-align: center;
  padding-bottom: 40px;
}

.section-title {
    text-align: justify;
    padding-bottom: 5px;
  }
  .section-title h1 {
    font-size: 30px;
    font-weight: bold;
    position: relative;
    color: black;
    margin-bottom: 20px;
    padding-bottom: 20px;
  }
  .section-title h1::before {
    content: "";
    position: absolute;
    display: block;
    width: 120px;
    height: 1px;
    background: #ddd;
    bottom: 1px;
    left: calc(50% - 60px);
  }
  .section-title h1::after {
    content: "";
    position: absolute;
    display: block;
    width: 40px;
    height: 3px;
    background: #F1C40F;
    bottom: 0;
    left: calc(50% - 20px);
  }
</style>
