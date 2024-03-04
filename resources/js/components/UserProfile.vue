<script setup>
import { EyeIcon, UserCircleIcon, TrashIcon } from '@heroicons/vue/24/solid';

const props = defineProps({
    user: Object,
    movies: Object
})

function deleteFavorite(id) {
    axios.get('/favorite/' + id)
        .then(function (response) {
            console.log(response);
        })
        .catch(function (error) {
            console.log(error);
        });
}

</script>

<template>
    <div class="movie-info border-b border-gray-600 h-screen">
        <div class="container mx-auto px-4 py-8 flex flex-col md:flex-row">
            <div class="flex items-center gap-4">
                <UserCircleIcon class="h-12 w-12 fill-sky-400"/>
                <h1 class="text-4xl font-semibold">
                    {{ user.name }}
                </h1>
            </div>
        </div>
        <div class="container w-full mx-auto px-4 py-8 flex flex-col md:flex-row">
            <div class="overflow-x-auto w-full">
                <h4 class="text-white font-semibold text-2xl flex gap-4 items-center">
                    <!-- <HeartIcon class="h-6 w-6 fill-red-700"/> -->
                    Lista de favoritos
                </h4>
                <table class="table w-full">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>
                                <label>
                                    <input type="checkbox" class="checkbox" />
                                </label>
                            </th>
                            <th></th>
                            <th>Filme</th>
                            <th>Produção</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody v-if="movies.length > 0">
                        <!-- row 1 -->
                        <tr v-for="movie in movies" :key="movie.id" class="hover">
                            <th>
                                <label>
                                    <input type="checkbox" class="checkbox" />
                                </label>
                            </th>
                            <td>
                                <div class="flex items-center gap-3">
                                    <div class="avatar">
                                        <div class="mask mask-squircle w-16">
                                            <img :src="movie.poster_path"
                                                alt="{{ movie.title }}" />
                                        </div>
                                    </div>

                                </div>
                            </td>
                            <td>
                                <div>
                                    <div class="font-bold">{{ movie.title }}</div>
                                    <div class="text-md opacity-50">{{ movie.release_date }}</div>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <div class="font-bold">{{movie.production_companies[0].name}}</div>
                                    <div class="text-sm opacity-50">{{movie.production_companies[0].origin_country}}</div>
                                </div>
                            </td>
                            <th>
                                <div class="flex items-center gap-3">
                                    <a :href="'/movie/' + movie.id" class="btn btn-primary btn-sm">
                                        <EyeIcon class="h-6 w-6 fill-base-100 hover:fill-white transition ease-in-out duration-150"/>
                                    </a>
                                    <button @click="deleteFavorite(movie.id)" class="btn btn-secondary btn-sm">
                                        <TrashIcon class="h-6 w-6"/>
                                    </button>
                                </div>
                            </th>
                        </tr>
                    </tbody>
                    <tbody v-else>
                        <tr>
                            <td class="text-center" colspan="5">Nenhum filme adicionado aos favoritos</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
