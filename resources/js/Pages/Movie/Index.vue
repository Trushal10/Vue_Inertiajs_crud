<template>
    <div class="bg-blue-200">
        <!-- Form -->
            <form
                 @submit.prevent="saveMovie"
                 class="max-w-3xl mx-auto mb-10 bg-white p-8 rounded-xl shadow-xl transition-all duration-300 ease-in-out transform hover:scale-105"
             >
                 <!-- Form Title -->
                 <h2 class="text-3xl font-semibold text-gray-900 text-center mb-8">
                     Create Movie
                 </h2>
     
                 <div class="relative mb-6">
                     <label
                         for="name"
                         class="block text-sm font-medium text-gray-700 mb-2"
                     >
                         Movie Name
                     </label>
                     <input
                         type="text"
                         id="name"
                         class="block w-full py-3 px-4 border-2 border-gray-300 rounded-xl text-sm text-gray-900 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 transition-all duration-300"
                         v-model="form.name"
                         placeholder="Enter movie name"
                         :class="{
                             'border-red-500 focus:ring-red-500': errors.name,
                         }"
                     />
                     <div v-if="errors.name" class="text-sm text-red-500 mt-2 pl-2">
                         {{ errors.name }}
                     </div>
                 </div>
     
                 <!-- Director Field -->
                 <div class="relative mb-6">
                     <label
                         for="director"
                         class="block text-sm font-medium text-gray-700 mb-2"
                         >Director</label
                     >
                     <select
                         v-model="form.director"
                         id="director"
                         class="block w-full py-3 px-4 border-2 border-gray-300 rounded-xl text-sm text-gray-900 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 transition-all duration-300"
                         :class="{
                             'border-red-500 focus:ring-red-500': errors.name,
                         }"
                     >
                         <option value="">Select Director</option>
                         <option value="Sagar Ambre">Sagar Ambre</option>
                         <option value="Pushkar Ojha">Pushkar Ojha</option>
                     </select>
                     <div
                         v-if="errors.director"
                         class="text-sm text-red-500 mt-2 pl-2"
                     >
                         {{ errors.director }}
                     </div>
                 </div>
     
                 <!-- Producer Field -->
                 <div class="relative mb-6">
                     <label
                         for="producer"
                         class="block text-sm font-medium text-gray-700 mb-2"
                         >Producer</label
                     >
                     <select
                         v-model="form.producer"
                         id="producer"
                         class="block w-full py-3 px-4 border-2 border-gray-300 rounded-xl text-sm text-gray-900 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 transition-all duration-300"
                         :class="{
                             'border-red-500 focus:ring-red-500': errors.name,
                         }"
                     >
                         <option value="">Select Producer</option>
                         <option value="Shashank Khaitan">Shashank Khaitan</option>
                         <option value="Karan Johar">Karan Johar</option>
                     </select>
                     <div
                         v-if="errors.producer"
                         class="text-sm text-red-500 mt-2 pl-2"
                     >
                         {{ errors.producer }}
                     </div>
                 </div>
     
                 <!-- Release Date Field -->
                 <div class="relative mb-6">
                     <label
                         for="releaseDate"
                         class="block text-sm font-medium text-gray-700 mb-2"
                         >Release Date</label
                     >
                     <input
                         type="date"
                         id="releaseDate"
                         v-model="form.releaseDate"
                         class="block w-full py-3 px-4 border-2 border-gray-300 rounded-xl text-sm text-gray-900 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 transition-all duration-300"
                         :class="{
                             'border-red-500 focus:ring-red-500': errors.name,
                         }"
                     />
                     <div
                         v-if="errors.releaseDate"
                         class="text-sm text-red-500 mt-2 pl-2"
                     >
                         {{ errors.releaseDate }}
                     </div>
                 </div>
     
                 <!-- Genre Field -->
                 <div class="relative mb-6">
                     <label class="block text-sm font-medium text-gray-700 mb-2"
                         >Genres</label
                     >
                     <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                         <div class="flex items-center">
                             <input
                                 id="action"
                                 type="checkbox"
                                 value="action"
                                 v-model="form.genre"
                                 class="w-5 h-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                             />
                             <label for="action" class="ml-2 text-sm text-gray-800"
                                 >Action</label
                             >
                         </div>
                         <div class="flex items-center">
                             <input
                                 id="drama"
                                 type="checkbox"
                                 value="drama"
                                 v-model="form.genre"
                                 class="w-5 h-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                             />
                             <label for="drama" class="ml-2 text-sm text-gray-800"
                                 >Drama</label
                             >
                         </div>
                         <div class="flex items-center">
                             <input
                                 id="thriller"
                                 type="checkbox"
                                 value="thriller"
                                 v-model="form.genre"
                                 :checked="form.genre == 'thriller'"
                                 class="w-5 h-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                             />
                             <label for="thriller" class="ml-2 text-sm text-gray-800"
                                 >Thriller</label
                             >
                         </div>
                     </div>
                     <div v-if="errors.genre" class="text-sm text-red-500 mt-2 pl-2">
                         {{ errors.genre }}
                     </div>
                 </div>
     
                 <!-- Verdict Field -->
                 <div class="relative mb-6">
                     <label class="block text-sm font-medium text-gray-700 mb-2"
                         >Verdict</label
                     >
                     <div class="flex items-center space-x-6 mt-2">
                         <div class="flex items-center">
                             <input
                                 id="hit"
                                 type="radio"
                                 value="hit"
                                 name="verdict-radio"
                                 v-model="form.verdict"
                                 class="w-5 h-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                             />
                             <label for="hit" class="ml-2 text-sm text-gray-800"
                                 >Hit</label
                             >
                         </div>
                         <div class="flex items-center">
                             <input
                                 id="flop"
                                 type="radio"
                                 value="flop"
                                 v-model="form.verdict"
                                 name="verdict-radio"
                                 class="w-5 h-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                             />
                             <label for="flop" class="ml-2 text-sm text-gray-800"
                                 >Flop</label
                             >
                         </div>
                     </div>
                     <div
                         v-if="errors.verdict"
                         class="text-sm text-red-500 mt-2 pl-2"
                     >
                         {{ errors.verdict }}
                     </div>
                 </div>
                 <button
                     type="submit"
                     class="px-4 py-2 text-white bg-blue-500 rounded-md"
                 >
                     {{ form.id ? "Update" : "Add" }} Movie
                 </button>
                 <button
                     v-if="form.id"
                     type="button"
                     @click="resetForm"
                     class="px-4 py-2 text-white bg-gray-500 rounded-md ml-2"
                 >
                     Cancel
                 </button>
            </form>
        <!-- Table -->
        <div class="table w-full">
            <div
                class="overflow-x-auto m-5 bg-white border border-gray-200 rounded-lg shadow-md mt-4"
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
                            <th scope="col" class="px-6 py-3">Director</th>
                            <th scope="col" class="px-6 py-3">Producer</th>
                            <th scope="col" class="px-6 py-3">Release Date</th>
                            <th scope="col" class="px-6 py-3">Genre</th>
                            <th scope="col" class="px-6 py-3">Verdict</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="movie in movies"
                            :key="movie.id"
                            :class="{
                                'bg-gray-100 dark:bg-gray-800':
                                    movie.id % 2 === 0,
                            }"
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                        >
                            <td class="px-6 py-4">{{ movie.id }}</td>
                            <td class="px-6 py-4">{{ movie.name }}</td>
                            <td class="px-6 py-4">
                                {{ movie.director }}
                            </td>
                            <td class="px-6 py-4">
                                {{ movie.producer }}
                            </td>
                            <td class="px-6 py-4">
                                {{ movie.releaseDate }}
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    v-for="(genre, index) in movie.genres"
                                    :key="genre.id"
                                >
                                    {{ genre.genre }}
                                    {{
                                        index < genre.genre.length - 1
                                            ? ","
                                            : " "
                                    }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                {{ movie.verdict }}
                            </td>
                            <td class="px-6 py-4 flex space-x-2">
                                <!-- Show button -->
                                <!-- <button
                                    @click="showdata(movie)"
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
                                </button> -->
                                <!-- Edit button -->
                                <button
                                    @click="editMovie(movie)"
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
                                </button>
                                <!-- Delete button -->
                                <button
                                    @click="deleteMovie(movie)"
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
</template>

<script>
import { useForm } from "@inertiajs/vue3";

export default {
    props: {
        movies: Object,
        errors: Object,
    },
    setup(props) {
        const form = useForm({
            id: null,
            name: "",
            director: "",
            producer: "",
            releaseDate: "",
            genre: [],
            verdict: "",
        });

        const saveMovie = () => {
            if (form.id) {
                // console.log(form.id);
                form.put(route("movies.update", form.id), {
                    onSuccess: () => resetForm(),
                });
            } else {
                form.post(route("movies.store"), {
                    onSuccess: () => resetForm(),
                });
            }
        };
        // const showdata = (movie) => {
        //     console.log(movie);
        // };
        const editMovie = (movie) => {
            // console.log(movie.genres);

            form.id = movie.id;
            form.name = movie.name;
            form.director = movie.director;
            form.producer = movie.producer;
            form.releaseDate = movie.releaseDate;

            const gen = [];
            movie.genres.forEach((genre) => {
                gen.push(genre.genre);
                // console.log(genre.genre);
            });

            form.genre = gen;
            // console.log(gen);
            form.verdict = movie.verdict;
        };

        const deleteMovie = (movie) => {
            // Confirm deletion
            if (confirm(`Are you sure you want to delete`)) {
                form.delete(route("movies.destroy", movie.id), {
                    onError: (error) => {
                        console.error("Error deleting movie:", error);
                        alert("Failed to delete the movie.");
                    },
                });
            }
        };
        const resetForm = () => {
            form.reset();
        };
        return {
            form,
            saveMovie,
            editMovie,
            // showdata,
            deleteMovie,
            resetForm,
        };
    },
};
</script>
