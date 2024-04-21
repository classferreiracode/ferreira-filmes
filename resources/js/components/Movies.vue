<script setup>
import { ref, reactive, onMounted } from 'vue';
import { StarIcon } from "@heroicons/vue/24/solid/index.js";
const page = ref(1);
const num = reactive({ page });
const Movies = ref([]);
const setPage = () => {
    page.value = num.page;

    axios.get('/movies/' + page.value).then((response) => {
        Movies.value = response.data.popularMovies;
    });
}

onMounted(() => {
    axios.get('/movies/' + page.value).then((response) => {
        Movies.value = response.data.popularMovies;
        console.log(Movies);
    });
});

</script>

<template>
    <div class="container mx-auto px-4 pt-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            <div v-for="movie in Movies" :key="movie.id">

                <a :href="'/movie/' + movie.id">
                    <img :src="movie.poster_path" alt="{{ movie.title }}"
                         class=" rounded hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="mt-2">
                    <a class="text-lg mt-2 hover:text-gray-300 duration-500 cursor-pointer">
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
                            <Favorite :data="movie" :size="5" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-8 w-full flex justify-center items-center">
            <div class="join">
                <button @click="setPage(page--)" :disabled="page === 1" class="join-item btn">«</button>
                <button class="join-item btn">Página {{ page }}</button>
                <button @click="setPage(page++)" :disabled="page === 500" class="join-item btn">»</button>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
