<template>
    <Head title="Movie Table" />
        <div>
            <div class="table w-full">
                <!-- Header and Add Product button -->
                <div class="mt-4 mx-5 mb-5">
                    <div
                        class="flex items-center justify-between px-6 py-3 bg-white border-b border-gray-200"
                    >
                        <h1 class="text-2xl font-bold">Product</h1>
                        <Link
                            :href="route('product.create')"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full flex items-center"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 mr-2"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                />
                            </svg>
                            Add Product
                        </Link>
                    </div>
                    <!-- Movies table -->
                    <div
                        class="overflow-x-auto bg-white border border-gray-200 rounded-lg shadow-md mt-4"
                    >
                        <table
                            class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
                        >
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                            >
                                <tr>
                                    <th scope="col" class="px-6 py-3">Id</th>
                                    <th scope="col" class="px-6 py-3">Name</th>
                                    <th scope="col" class="px-6 py-3">
                                        Price
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(product, index) in products"
                                    :key="index"
                                    :class="{
                                        'bg-gray-100 dark:bg-gray-800':
                                            index % 2 === 0,
                                    }"
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                                >
                                    <td class="px-6 py-4">{{ product.id }}</td>
                                    <td class="px-6 py-4">{{ product.name }}</td>
                                    <td class="px-6 py-4">
                                        {{ product.price }}
                                    </td>
                                    <td class="px-6 py-4 flex space-x-2">
                                        <!-- Show button -->
                                        <Link
                                            :href="
                                                route('product.show', product.id)
                                            "
                                            class="px-2 py-1 text-sm bg-blue-500 text-white rounded inline-flex items-center"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="w-4 h-4 mr-1"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M15 12l4.5 4.5m0 0l-4.5 4.5m4.5-4.5H3"
                                                />
                                            </svg>
                                            Show
                                        </Link>
                                        <!-- Edit button -->
                                        <Link
                                            :href="
                                                route('product.edit', product.id)
                                            "
                                            class="px-2 py-1 text-sm bg-green-500 text-white rounded inline-flex items-center"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="w-4 h-4 mr-1"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M11 17H4a1 1 0 01-1-1v-3a1 1 0 01.293-.707l8-8a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-8 8A1 1 0 0111 17z"
                                                />
                                            </svg>
                                            Edit
                                        </Link>
                                        <!-- Delete button -->
                                        <button
                                            @click="deleteProduct(product.id)"
                                            class="px-2 py-1 text-sm bg-red-500 text-white rounded inline-flex items-center"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="w-4 h-4 mr-1"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"
                                                />
                                            </svg>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</template>

<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";

const form = useForm({});
const props = defineProps({
    products: Array,
});

const deleteProduct = (productId) => {
    if (confirm("Are you sure you want to delete this product?")) {
        form.delete(route('product.destroy', productId));
    }
};
</script>
