<template>
    <Head title="Edit Product" />
        <div class="mt-4 m-10 mb-5">
            <div class="flex items-center justify-between px-6 py-3 m-5 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-bold">Show Product</h1>
                <Link 
                    :href="route('product.index')"
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full"
                >
                    Back
                </Link>
            </div>
            <div class="flex items-center justify-between px-6 py-3 m-5 bg-white">
                <h2>Name: {{ product.name }}</h2>
            </div>
            <div class="flex flex-col space-y-4">
                <h2>Price: {{ product.price }}</h2>
            </div>
        </div>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    product:Object
})

</script>
