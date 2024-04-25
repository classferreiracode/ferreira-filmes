<template>
    <div class="container mx-auto px-4 pt-8">
        <div class="popular-movies mb-8 border-b border-gray-600 pb-8">
            <h2 class="uppercase tracking-wider text-primary text-lg font-semibold">
                Filmes Populares
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <div class="mt-8" v-for="movie in popular_movies" :key="movie.id">
                    <poster :data="movie" />
                </div>
            </div>
        </div>

        <div class="popular-movies mb-8 border-b border-gray-600">
            <h2 class="uppercase tracking-wider text-primary text-lg font-semibold">
                Series Populares
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <div class="mt-8" v-for="serie in popular_tv" :key="serie.id">
                    <poster :data="serie" />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { HeartIcon, StarIcon } from '@heroicons/vue/24/solid'
import { HeartIcon as HeartIconOutline } from '@heroicons/vue/24/outline'
import Swal from 'sweetalert2';

const props = defineProps({
    popular_movies: Object,
    popular_tv: Object,
})

</script>
