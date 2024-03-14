<script setup>
import { EyeIcon, TrashIcon } from '@heroicons/vue/24/solid';

const props = defineProps({
    movies: Object
})

function deleteFavorite(id, type) {
    axios.get('/favorite/' + id + '/' + type)
        .then(function (response) {
            Swal.fire({
                icon: 'success',
                title: 'O filme foi removido dos seus favoritos',
            })
        })
        .catch(function (error) {
            console.log(error);
        });
}
</script>

<template>
    <div class="flex flex-row">
        <div class="container mx-auto px-4 py-8 flex flex-col md:flex-row">
            <div class="grid grid-flow-row-dense grid-cols-4 grid-rows-3 w-full gap-8">
                <sidenav />
                <div class="col-span-3">
                    <div class="overflow-x-auto w-full">
                        <div class="rounded-t-lg text-center py-4 bg-secondary">
                            <h3 class="text-2xl font-semibold">Filmes Favoritos</h3>
                        </div>
                        <div class="rounded-b-lg bg-base-300 p-4">
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
                                                    <div class="rounded h-16">
                                                        <img :src="movie.poster_path" alt="{{ movie.title }}"
                                                            class="cover " />
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
                                        <th>
                                            <div class="flex items-center gap-3">
                                                <a :href="'/movie/' + movie.id" class="btn btn-primary btn-sm">
                                                    <EyeIcon
                                                        class="h-6 w-6 fill-base-100 hover:fill-white transition ease-in-out duration-150" />
                                                </a>
                                                <button @click="deleteFavorite(movie.id, movie.type)"
                                                    class="btn btn-secondary btn-sm">
                                                    <TrashIcon class="h-6 w-6" />
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
            </div>

        </div>
    </div>
</template>
