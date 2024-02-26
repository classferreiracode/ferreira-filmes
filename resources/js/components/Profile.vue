<script setup>
    import { MapPinIcon, StarIcon } from '@heroicons/vue/24/solid'

    const props = defineProps({
        person: Object
    })
</script>

<template>
    <div class="person-info border-b border-gray-600">
        <div class="container mx-auto px-4 py-8 flex flex-col md:flex-row">
            <div class="flex-none">
                <img :src="person.profile_path" alt="{{ person.name }}" class="w-96 rounded-lg">
            </div>
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold mt-4 md:mt-0">
                    {{ person.name }}
                </h2>
                <div class="flex items-center text-gray-400 text-sm">
                    <StarIcon class="h-5 w-5 fill-yellow-500" />
                    <span class="ml-1">
                        {{ person.birthday }}
                    </span>
                    <span v-if="person.deathday != ''" class="mx-2">|</span>
                    <span v-if="person.deathday != ''">
                        {{ person.deathday }}
                    </span>
                    <span class="mx-2">|</span>
                    <MapPinIcon class="h-5 w-5 fill-sky-400" />
                    <span>
                        {{ person.place_of_birth }}
                    </span>
                </div>

                <div class="text-gray-400 text-sm my-8">
                    {{ person.biography }}
                </div>
            </div>
        </div>
    </div>
    <div class="movie-cast border-b border-gray-600">
        <div class="container mx-auto px-4 py-8">
            <h2 class="text-4xl font-semibold">
                Filmografia - {{ person.name }}
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <div class="mt-8" v-for="movie in person.combined_credits" :key="movie.id">
                    <a v-if="movie.poster_path != null" :href="'/movie/' + movie.id">
                        <img :src="'https://image.tmdb.org/t/p/original/' + movie.poster_path" alt="{{ movie.title }}" class=" rounded hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <a v-else :href="'/movie/' + movie.id">
                        <img src="https://placehold.co/350x528?text=No+image" alt="No image" class=" rounded hover:opacity-75 transition ease-in-out duration-150">
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

<style scoped>
</style>
