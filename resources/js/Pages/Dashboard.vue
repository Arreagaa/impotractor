<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import IDashboard from "../Pages/IDashboard/IShow.vue";
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-6">
            <div class="mx-auto sm:px-6 lg:px-8">
                <IDashboard />
            </div>
        </div>
    </AppLayout>
</template>
