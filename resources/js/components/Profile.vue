<script setup>
    import { MapPinIcon, StarIcon } from '@heroicons/vue/24/solid'

    const props = defineProps({
        person: Object
    })

    function getInitials(name) {
        return name.split(' ').map((n) => n[0]).join('');

    }



</script>

<template>
    <div class="person-info border-b border-gray-600">
        <div class="container mx-auto px-4 py-8 flex flex-col md:flex-row">
            <div class="flex-none">
                <img :src="person.profile_path" alt="{{ person.name }}" class="w-96">
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
                <div v-for="cast in person.combined_credits" class="mt-8 flex flex-col items-center text-center justify-center"
                     :key="cast.id">
                    <a :href="cast.media_type == 'movie' ? '/movie/' + cast.id : '/serie/' + cast.id">
                        <div :class="cast.poster_path ? 'avatar' : 'avatar placeholder'">
                            <div class="w-16 rounded-full ring ring-accent ring-offset-warning ring-offset-2 my-4">
                                <img v-if="cast.poster_path"
                                     :src="'https://image.tmdb.org/t/p/w235_and_h235_face/' + cast.poster_path"
                                     :alt="cast.name" class="hover:opacity-75 transition ease-in-out duration-150" />
                            </div>
                        </div>
                    </a>
                    <div class="mt-2">
                        <a :href="cast.media_type == 'movie' ? '/movie/' + cast.id : '/serie/' + cast.id" class="text-md mt-2 hover:text-gray-300 duration-500">
                            <span v-if="cast.media_type=='movie'">
                                {{ cast.title }}
                            </span>
                            <span v-else>
                                {{ cast.name }}
                            </span>
                        </a>
                        <div class="text-gray-400 text-sm mt-1">
                            <span>
                                {{ cast.character }}
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
