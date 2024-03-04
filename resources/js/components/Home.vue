<template>
    <div class="container mx-auto px-4 pt-8">
        <div class="popular-movies mb-8 border-b border-gray-600 pb-8">
            <h2 class="uppercase tracking-wider text-primary text-lg font-semibold">
                Filmes Populares
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <div class="mt-8" v-for="movie in popular_movies" :key="movie.id">
                    <a :href="'/movie/' + movie.id">
                        <img :src="movie.poster_path" alt="{{ movie.title }}" class=" rounded hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a  class="text-lg mt-2 hover:text-gray-300 duration-500 cursor-pointer">
                            {{ movie.title }}
                        </a>
                        <div class="flex items-center justify-between text-gray-400 text-sm mt-1">
                            <div class="flex items-center text-gray-400 text-sm mt-1">
                                <StarIcon class="h-5 w-5 fill-yellow-500" />
                                <span class="ml-1">
                                    {{ movie.vote_average.toFixed(1) }}
                                </span>
                                <span class="mx-2">|</span>
                                <span>
                                    {{ movie.release_date }}
                                </span>
                            </div>
                            <div class="flex items-center  text-gray-400 text-sm mt-1">
                                <a class="cursor-pointer" @click="favoriteMovie(movie.id)">
                                    <HeartIcon :class=" favorites.includes(movie.id) ? 'h-5 fill-white hover:fill-red-700 transition ease-in-out duration-150' : 'h-5 fill-red-700 hover:fill-white transition ease-in-out duration-150'"/>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="popular-movies mb-8 border-b border-gray-600">
            <h2 class="uppercase tracking-wider text-primary text-lg font-semibold">
                Series Populares
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <div class="mt-8" v-for="serie in popular_tv" :key="serie.id">
                    <a :href="'/serie/' + serie.id">
                        <img :src="serie.poster_path" alt="{{ serie.title }}" class=" rounded hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a class="text-lg mt-2 hover:text-gray-300 duration-500 cursor-pointer">
                            {{ serie.title }}
                        </a>
                        <div class="flex items-center justify-between text-gray-400 text-sm mt-1">
                            <div class="flex items-center text-gray-400 text-sm mt-1">
                                <StarIcon class="h-5 w-5 fill-yellow-500" />
                                <span class="ml-1">
                                    {{ serie.vote_average.toFixed(1) }}
                                </span>
                                <span class="mx-2">|</span>
                                <span>
                                    {{ serie.release_date }}
                                </span>
                            </div>
                            <div class="flex items-center  text-gray-400 text-sm mt-1">
                                <a class="cursor-pointer" @click="favoriteMovie(serie.id)">
                                    <HeartIcon :class="favorites.includes(serie.id) ? 'h-5 fill-white hover:fill-red-700 transition ease-in-out duration-150' : 'h-5 fill-red-700 hover:fill-white transition ease-in-out duration-150'"/>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { HeartIcon, StarIcon } from '@heroicons/vue/24/solid'
import { onMounted, defineProps, ref } from 'vue';

const props = defineProps({
    popular_movies: Object,
    popular_tv: Object,
})

onMounted(() => {
    getFavorites()
})

const favorites = ref([]);

const favoriteMovie = (id) => {
    axios.get('/favorite/' + id)
        .then(response => {
            console.log(response.data)
            getFavorites()
            if (response.data === 'Favorite Removed') {
                Swal.fire({
                    icon: 'success',
                    title: 'Filme/Serie foi removido dos seus favoritos',
                })
            } else if (response.data === 'Favorite Added') {
                Swal.fire({
                    icon: 'success',
                    title: 'Filme/Serie foi adicionado aos seus favoritos',
                })
            }
        })
        .catch(error => {
            console.log(error)
            if (error.response.data === 'Unauthorized') {
                Swal.fire({
                    icon: 'error',
                    title: 'Por favor, realize o login',
                })
            }
        })
}

const getFavorites = () => {
    axios.get('/favorites')
        .then(response => {
            favorites.value = response.data
        })
        .catch(error => {
            console.log(error)
        })
}
</script>
