<template>
    <div class="movie-info border-b border-gray-600">
        <div class="container mx-auto px-4 py-8 flex flex-col md:flex-row">
            <div class="flex-none">
                <img :src="movie.poster_path" alt="{{ movie.title }}" class="w-96">
            </div>
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold mt-4 md:mt-0">
                    {{ movie.title }}
                </h2>
                <div class="flex items-center text-gray-400 text-sm">
                    <StarIcon class="h-5 w-5 fill-yellow-500" />
                    <span class="ml-1">
                        {{ movie.vote_average.toFixed(1) }}
                    </span>
                    <span class="mx-2">|</span>
                    <span>
                        {{ movie.release_date }}
                    </span>
                    <span class="mx-2">|</span>
                    <span>
                        {{ movie.runtime }}
                    </span>
                </div>
                <div class="flex items-center mt-2 text-gray-400 text-sm mb-8">
                    <span>
                        {{ replaceGenres() }}
                    </span>
                </div>
                <div class="text-gray-400 text-sm">
                    {{ movie.overview }}
                </div>
                <div class="mt-12">
                    <h4 class="text-white font-semibold">
                        Equipe
                    </h4>
                    <div class="flex mt-4 gap-4">
                        <div class="flex flex-col items-center justify-center text-center"
                            v-for="crew in getDirectorAndScreenplay()">
                            <div :class="crew.profile_path ? 'avatar' : 'avatar placeholder'">
                                <div class="w-16 rounded-full ring ring-accent ring-offset-warning ring-offset-2 my-4 ml-6">
                                    <img v-if="crew.profile_path"
                                        :src="'https://image.tmdb.org/t/p/w235_and_h235_face/' + crew.profile_path"
                                        :alt="crew.name" />
                                    <span v-else class="text-3xl">
                                        {{ getInitials(crew.name) }}
                                    </span>
                                </div>
                            </div>
                            <div class="text-sm ml-6">
                                {{ crew.name }}
                            </div>
                            <div class="text-xs text-gray-500 ml-6">
                                {{ traslateJob(crew.job) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center gap-4 w-full">
                    <div class="mt-12">
                        <button class="btn btn-block md:btn-wide btn-primary" onclick="my_modal_trailer.showModal()">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M4.5 5.653c0-1.427 1.529-2.33 2.779-1.643l11.54 6.347c1.295.712 1.295 2.573 0 3.286L7.28 19.99c-1.25.687-2.779-.217-2.779-1.643V5.653Z"
                                    clip-rule="evenodd" />
                            </svg>
                            Trailer
                        </button>
                    </div>
                    <div class="mt-12">
                        <button class="btn btn-block md:btn-wide btn-accent" onclick="my_modal_movie.showModal()">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M4.5 5.653c0-1.427 1.529-2.33 2.779-1.643l11.54 6.347c1.295.712 1.295 2.573 0 3.286L7.28 19.99c-1.25.687-2.779-.217-2.779-1.643V5.653Z"
                                    clip-rule="evenodd" />
                            </svg>
                            Assistir Online
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Movie Info -->

    <!-- Cast -->
    <div class="movie-cast border-b border-gray-600">
        <div class="container mx-auto px-4 py-8">
            <h2 class="text-4xl font-semibold">
                Elenco
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <div class="mt-8 flex flex-col items-center text-center justify-center" v-for="cast in movie.credits.cast"
                    :key="cast.id">
                    <a :href="'/actor/' + cast.id">
                        <div :class="cast.profile_path ? 'avatar' : 'avatar placeholder'">
                            <div class="w-16 rounded-full ring ring-accent ring-offset-warning ring-offset-2 my-4 ml-6">
                                <img v-if="cast.profile_path"
                                    :src="'https://image.tmdb.org/t/p/w235_and_h235_face/' + cast.profile_path"
                                    :alt="cast.name" class="hover:opacity-75 transition ease-in-out duration-150" />
                                <span v-else class="text-3xl">
                                    {{ getInitials(cast.name) }}
                                </span>
                            </div>
                        </div>
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-md mt-2 hover:text-gray-300 duration-500">
                            {{ cast.name }}
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

    <!-- Modals -->
    <Teleport to='body'>
        <dialog id="my_modal_trailer" class="modal">
            <div class="modal-box w-11/12 max-w-5xl">
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                </form>
                <h3 class="font-bold text-lg">{{ movie.videos.results[0].name }}</h3>
                <object class="w-full overflow-hidden rounded-lg mt-4">
                    <embed :src="'https://www.youtube.com/embed/' + movie.videos.results[0].key" autoplay
                        class="w-full h-[500px]">
                </object>
            </div>
        </dialog>
        <dialog id="my_modal_movie" class="modal">
            <div class="modal-box w-11/12 max-w-5xl">
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                </form>
                <h3 class="font-bold text-lg">{{ movie.videos.results[0].name }}</h3>
                <div class="mt-4" id="SuperFlixAPIContainerVideo"></div>
            </div>
        </dialog>
    </Teleport>
</template>


<script setup>
import { onMounted } from 'vue';
import { StarIcon } from '@heroicons/vue/24/solid'
const props = defineProps({
    movie: Object
})

onMounted(() => {
    loadMovie();
    function loadMovie() {
        SuperFlixAPIPluginJS(props.movie.imdb_id);
    }
})

function replaceGenres() {
    return props.movie.genres.map((genre) => genre).join(', ');
}

function getDirectorAndScreenplay() {
    return props.movie.credits.crew.filter((crew) => crew.job === 'Director' || crew.job === 'Screenplay');
}

function getInitials(name) {
    return name
        .split(' ')
        .map((n) => n[0])
        .join('');
}

function traslateJob(job) {
    switch (job) {
        case 'Director':
            return 'Diretor';
        case 'Screenplay':
            return 'Roteirista';
        default:
            return job;
    }
}

function SuperFlixAPIPluginJS(imdb) {
    var frame = document.getElementById('SuperFlixAPIContainerVideo');
    frame.innerHTML += '<iframe src="https://superflixapi.top/filme/' + imdb + '" scrolling="no" frameborder="0" allowfullscreen="" webkitallowfullscreen="" mozallowfullscreen="" class="w-full h-[500px]"></iframe>';
}
</script>
