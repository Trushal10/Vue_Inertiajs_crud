<template>
    <Head title="create Product" />
        <div class="mt-4 m-10 mb-5">
            <div class="flex items-center justify-between px-6 py-3 m-5 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-bold">Update Product</h1>
                <Link 
                    :href="route('product.index')"
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full"
                >
                    Back
                </Link>
            </div>
            <div class="flex items-center justify-between px-6 py-3 m-5 bg-white">
                <form @submit.prevent="updateProduct">
                <div class="grid grid-cols-12 gap-4">
                    <!-- Left column for product details -->
                    <div class="col-span-6">
                        <!-- Product Name -->
                        <div class="mb-3">
                            <label>Product Name</label>
                            <input
                                type="text"
                                v-model="form.name"
                                class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                            />
                        </div>
                        <div v-if="errors.name">{{ errors.name }}</div>
    
                        <!-- Product Price -->
                        <div class="mb-3">
                            <label>Product Price</label>
                            <input
                                type="text"
                                v-model="form.price"
                                class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                            />
                        </div>
                        <div 
                            class="" 
                            v-if="errors.price">{{ errors.price }}</div>
    
                        <Link 
                            :href="route('product.index')"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 m-1 rounded-full"
                        >
                            Cancel
                        </Link
                        >
                        <!-- Submit button -->
                        <button
                            @click="useForm"
                            :disabled="form.processing"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"
                        >
                            <span v-if="form.processing">Update...</span>
                            <span v-else>Update</span>
                        </button>
                    </div>
                </div>
            </form>
            </div>
        </div>
</template>

<script setup>
import { Link, Head, useForm } from "@inertiajs/vue3";
const props = defineProps({
     errors: Object,
     product: Object
});
const form = useForm({
    name: props.product.name,
    price: props.product.price,
});
const updateProduct = () => {
    const res = form.put(route('product.update',props.product.id));
    if(res) {
        form.reset();
    }
};
</script>

<style scoped>

</style>
