<script setup>
import { ref, reactive, onMounted } from 'vue';
const page = ref(1);
const num = reactive({ page });
const Movies = ref([]);
const setPage = () => {
    page.value = num.page;

    axios.get('/movies/' + page.value)
        .then((response) => {
            Movies.value = response.data.popularMovies;
        })
        .catch((error) => {
            console.log(error);
        });
}

onMounted(() => {
    axios.get('/movies/' + page.value)
        .then((response) => {
            Movies.value = response.data.popularMovies;
        })
        .catch((error) => {
            console.log(error);
        });
});

</script>

<template>
    <div class="container mx-auto px-4 pt-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            <div v-for="movie in Movies" :key="movie.id">
                <poster :data="movie" />
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
