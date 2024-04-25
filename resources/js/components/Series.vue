<script setup>
import { ref, reactive, onMounted } from 'vue';
const page = ref(1);
const num = reactive({ page });
const Series = ref([]);
const setPage = () => {
    page.value = num.page;

    axios.get('/series/' + page.value)
        .then((response) => {
            Series.value = response.data.popularTv;
        })
        .catch((error) => {
            console.log(error);
        });
}

onMounted(() => {
    axios.get('/series/' + page.value)
        .then((response) => {
            Series.value = response.data.popularTv;
        })
        .catch((error) => {
            console.log(error);
        });
});

</script>

<template>
    <div class="container mx-auto px-4 pt-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            <div v-for="serie in Series" :key="serie.id">
                <poster :data="serie" />
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
