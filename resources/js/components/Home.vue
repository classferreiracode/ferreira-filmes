<template>
    <div class="container mx-auto px-4 pt-8">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-primary text-lg font-semibold">
                Filmes Populares
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <div class="mt-8" v-for="movie in popular_movies" :key="movie.id">
                    <a :href="'/movie/' + movie.id">
                        <img :src="movie.poster_path" alt="{{ movie.title }}" class=" rounded hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray-300 duration-500">
                            {{ movie.title }}
                        </a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { StarIcon } from '@heroicons/vue/24/solid'

const props = defineProps({
    popular_movies: Object
})
</script>
