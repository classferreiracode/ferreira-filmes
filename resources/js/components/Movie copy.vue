<template>
    <div class="w-full h-[500px] overflow-hidden bg-cover bg-local bg-center bg-no-repeat"  :style="`background-image: url('https://image.tmdb.org/t/p/original/${movie.poster_path}');`">
        <div class="w-full h-full mx-auto flex flex-col items-center justify-center bg-violet-900 bg-opacity-70">
            <h1 class="text-white text-3xl md:text-7xl uppercase font-bold">
                {{ movie.title }}
            </h1>
        </div>
    </div>

    <div class="w-full bg-gray-900">
        <div class="w-full max-w-7xl h-full mx-auto flex flex-col items-center justify-center">
            <h2 class="text-white text-3xl md:text-5xl font-bold mt-8 flex items-center">
                <bookmark-icon class="h-14 w-14 hidden md:block text-violet-600" />
                Sinopse
            </h2>
            <p class="text-white text-justify md:text-center leading-relaxed my-8 flex items-center">
                {{ movie.overview }}
            </p>
        </div>
    </div>

</template>

<script setup>
import { BookmarkIcon } from '@heroicons/vue/24/solid'
const props = defineProps({
    movie: Object
})
</script>
