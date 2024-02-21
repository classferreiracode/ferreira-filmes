<script setup>
    import { onMounted } from 'vue';
    import { StarIcon } from '@heroicons/vue/24/solid'
    import { Carousel, Slide, Navigation } from 'vue3-carousel'
    import 'vue3-carousel/dist/carousel.css'

    const props = defineProps({
        serie: Object
    })

    onMounted(() => {
        loadSerie();
        function loadSerie() {
            SuperFlixAPIPluginJS(props.serie.external_ids.imdb_id);
        }
    })

    function replaceGenres() {
        return props.serie.genres.map((genre) => genre).join(' | ');
    }

    function getDirectorAndScreenplay() {
        return props.serie.credits.crew.filter((crew) => crew.job === 'Director' || crew.job === 'Screenplay' || crew.job === 'Creator');
    }

    function getRecommendations() {
        return props.serie.recommendations.results;
    }

    function getInitials(name) {
        return name
            .split(' ')
            .map((n) => n[0])
            .join('');
    }


    function getCast() {
        return props.serie.credits.cast.slice(0, 10);
    }

    function SuperFlixAPIPluginJS(imdb) {
        var frame = document.getElementById('SuperFlixAPIContainerVideo');
        frame.innerHTML += '<iframe src="https://superflixapi.top/serie/' + imdb + '/#color:1a103d" scrolling="no" frameborder="0" allowfullscreen class="w-full h-[500px] rounded-xl"></iframe>';
    }
</script>

<template>
    <div class="movie-info border-b border-gray-600">
        <div class="container mx-auto px-4 py-8 flex flex-col md:flex-row">
            <div class="flex-none">
                <img :src="serie.poster_path" alt="{{ serie.title }}" class="w-96">
            </div>
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold mt-4 md:mt-0">
                    {{ serie.title }}
                </h2>
                <div class="flex items-center text-gray-400 text-sm">
                    <StarIcon class="h-5 w-5 fill-yellow-500" />
                    <span class="ml-1">
                        {{ serie.vote_average.toFixed(1) }}
                    </span>
                    <span class="mx-2">|</span>
                    <span>
                        {{ serie.release_date }}
                    </span>
                </div>
                <div class="flex items-center mt-2 text-gray-400 text-sm mb-8">
                    <span>
                        {{ replaceGenres() }}
                    </span>
                </div>
                <div class="text-gray-400 text-sm">
                    {{ serie.overview }}
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
                                {{ crew.job }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center md:justify-start gap-4 w-full">
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
                        <button class="btn btn-block md:btn-wide btn-accent" onclick="my_modal_warning.showModal()">
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

        <dialog id="my_modal_movie" class="modal">
            <div class="modal-box w-11/12 max-w-5xl">
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                </form>
                <h3 class="font-bold text-lg">{{ serie.title }}</h3>
                <div class="mt-4" id="SuperFlixAPIContainerVideo"></div>
            </div>
        </dialog>
    </Teleport>
</template>

<style scoped>

</style>
