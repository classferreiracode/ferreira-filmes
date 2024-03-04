<template>
    <div class="movie-info border-b border-gray-600">
        <div class="container mx-auto px-4 py-8 flex flex-col md:flex-row">
            <div class="flex-none">
                <img :src="movie.poster_path" alt="{{ movie.title }}" class="w-96 rounded-lg">
            </div>
            <div class="md:ml-24">
                <div class="flex items-center justify-between text-gray-400 text-sm">
                    <h2 class="text-4xl font-semibold mt-4 md:mt-0">
                        {{ movie.title }}
                    </h2>
                    <a class="btn btn-circle btn-secondary cursor-pointer" @click="favoriteMovie(movie.id)">
                        <HeartIcon :class="favorites.includes(movie.id) ? 'h-5 fill-white hover:fill-red-700 transition ease-in-out duration-150' : 'h-5 fill-red-700 hover:fill-white transition ease-in-out duration-150'"/>
                    </a>
                </div>
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
                                <div class="w-16 rounded-full my-4 ml-6">
                                    <a :href="'/person/' + crew.id">
                                        <img v-if="crew.profile_path"
                                            :src="'https://image.tmdb.org/t/p/w235_and_h235_face/' + crew.profile_path"
                                            :alt="crew.name" />
                                        <span v-else class="text-3xl">
                                            {{ getInitials(crew.name) }}
                                        </span>
                                    </a>
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
                <div class="flex items-center justify-center md:justify-start gap-4 w-full">
                    <div class="mt-12">
                        <button class="btn btn-wide btn-primary text-purple-950" onclick="my_modal_trailer.showModal()">
                            Ver Trailer
                        </button>
                    </div>
                    <div class="mt-12">
                        <div class="tooltip" data-tip="Assistir Online">
                            <button class="btn btn-circle btn-accent text-purple-950" onclick="my_modal_warning.showModal()">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 fill-purple-950">
                                    <path fill-rule="evenodd"
                                        d="M4.5 5.653c0-1.427 1.529-2.33 2.779-1.643l11.54 6.347c1.295.712 1.295 2.573 0 3.286L7.28 19.99c-1.25.687-2.779-.217-2.779-1.643V5.653Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
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
                <div v-for="cast in getCast()" class="mt-8 flex flex-col items-center text-center justify-center"
                    :key="cast.id">
                    <a :href="'/person/' + cast.id">
                        <div :class="cast.profile_path ? 'avatar' : 'avatar placeholder'">
                            <div class="w-16 rounded-full my-4">
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
                        <a :href="'/person/' + cast.id" class="text-md mt-2 hover:text-gray-300 duration-500">
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
            <div class="w-full px-4 py-8 flex justify-center">
                <a :href="'/movie/casting/' + movie.id" class="btn btn-block btn-secondary">
                    VER ELENCO COMPLETO
                </a>
            </div>
        </div>
    </div>

    <!-- End Cast -->
    <div class="movie-recommendations border-b border-gray-600">
        <div class="container mx-auto px-4 py-8">
            <h2 class="text-4xl font-semibold">
                Recomendados
            </h2>
            <carousel :items-to-show="5" autoplay="2000" :wrap-around="true" :transition="500">
                <slide v-for="recommend in getRecommendations()" class="mt-8" :key="recommend.id">
                    <a :href="'/movie/' + recommend.id">
                        <img :src="'https://image.tmdb.org/t/p/original/' + recommend.poster_path"
                            alt="{{ recommend.title }}"
                            class="rounded hover:opacity-75 transition ease-in-out duration-150 carousel__item">
                    </a>
                </slide>
                <template #addons>
                    <navigation />
                </template>
            </carousel>
        </div>
    </div>

    <Teleport to='body'>
        <dialog id="my_modal_warning" class="modal">
            <div class="modal-box">
                <h3 class="font-bold text-lg">Aviso Importante</h3>
                <p class="py-4">
                    Não armazenamos nenhum arquivo em nossos servidores.
                </p>
                <div role="alert" class="alert alert-warning">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <span>
                        Alguns filmes/séries podem conter anúncios ou conteúdos inapropriados. Caso uma janela de anúncio
                        seja aberta, você pode clicar no botão de fechar.
                    </span>
                </div>
                <div class="modal-action">
                    <form method="dialog">
                        <button class="btn" onclick="my_modal_movie.showModal()">Close</button>
                    </form>
                </div>
            </div>
        </dialog>
        <dialog id="my_modal_trailer" class="modal" v-if="movie.videos !== '' || movie.videos !== null">
            <div class="modal-box w-11/12 max-w-5xl">
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                </form>
                <h3 class="font-bold text-lg">{{ movie.title }}</h3>
                <object class="w-full overflow-hidden rounded-lg mt-4">
                    <embed v-if="movie.videos.results.length > 0"
                        :src="'https://www.youtube.com/embed/' + movie.videos.results[0].key" autoplay controls
                        allowfullscreen class="w-full h-[500px]">
                    <h4 v-else class="text-center mt-4 text-3xl">
                        Nenhum Trailer encontrado
                    </h4>
                </object>
            </div>
        </dialog>
        <dialog id="my_modal_movie" class="modal">
            <div class="modal-box w-11/12 max-w-5xl">
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                </form>
                <h3 class="font-bold text-lg">{{ movie.title }}</h3>
                <div class="mt-4" id="SuperFlixAPIContainerVideo"></div>
            </div>
        </dialog>
    </Teleport>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import { StarIcon, HeartIcon } from '@heroicons/vue/24/solid'
import { Carousel, Slide, Navigation } from 'vue3-carousel'
import 'vue3-carousel/dist/carousel.css'

const props = defineProps({
    movie: Object
})

onMounted(() => {
    getFavorites();
    loadMovie();
    function loadMovie() {
        SuperFlixAPIPluginJS(props.movie.imdb_id);
    }
})

const favorites = ref([]);

const favoriteMovie = (id) => {
    axios.get('/favorite/' + id)
        .then(response => {
            console.log(response.data)
            getFavorites()
        })
        .catch(error => {
            console.log(error)
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

function replaceGenres() {
    return props.movie.genres.map((genre) => genre).join(', ');
}

function getDirectorAndScreenplay() {
    return props.movie.credits.crew.filter((crew) => crew.job === 'Director' || crew.job === 'Screenplay');
}

function getRecommendations() {
    return props.movie.recommendations.results;
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
            return 'Diretor(a)';
        case 'Screenplay':
            return 'Roteirista';
        default:
            return job;
    }
}

function getCast() {
    return props.movie.credits.cast.slice(0, 10);
}

function SuperFlixAPIPluginJS(imdb) {
    var frame = document.getElementById('SuperFlixAPIContainerVideo');
    frame.innerHTML += '<iframe src="https://superflixapi.top/filme/' + imdb + '/#color:1a103d" scrolling="no" frameborder="0" allowfullscreen class="w-full h-[500px] rounded-xl"></iframe>';
}
</script>
<style scoped>
.carousel__slide {
    padding: 5px;
}

.carousel__viewport {
    perspective: 2000px;
}

.carousel__track {
    transform-style: preserve-3d;
}

.carousel__slide--sliding {
    transition: 0.5s;
}

.carousel__slide {
    opacity: 0.9;
    transform: rotateY(-20deg) scale(0.9);
}

.carousel__slide--active~.carousel__slide {
    transform: rotateY(20deg) scale(0.9);
}

.carousel__slide--prev {
    opacity: 1;
    transform: rotateY(-10deg) scale(0.95);
}

.carousel__slide--next {
    opacity: 1;
    transform: rotateY(10deg) scale(0.95);
}

.carousel__slide--active {
    opacity: 1;
    transform: rotateY(0) scale(1.1);
}
</style>
