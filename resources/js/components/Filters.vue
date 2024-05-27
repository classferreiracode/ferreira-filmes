<script setup>
import { ref, watch, reactive } from 'vue';
const props = defineProps({
    data: Object
})

const options = ref(props.data);
const customLabel = (option) => {
    return option.name;
}

const years = [2000, 2020];

const orderBy = [{ id: 'asc', name: 'Ascending' }, { id: 'desc', name: 'Descending' }, { id: 'popularity.asc', name: 'Popularity Ascending' }, { id: 'popularity.desc', name: 'Popularity Descending' }];

const genre = ref([]);

watch(genre, () => {
    return axios.get('/movie/discover/' + genre.value.id)
})

</script>

<template>
    <div>
        <h3>Selecione um dos filtros</h3>
        <div class="flex gap-4">
            <VueMultiselect :options="options" :custom-label="customLabel" :selected="genre" v-model="genre"
                            placeholder="Selecione um dos gêneros" class="w-1/3" />

            <VueMultiselect :options="years" placeholder="Selecione um dos anos" class="w-1/3" />

            <VueMultiselect :options="orderBy" placeholder="Ordernar por avaliação" class="w-1/3" />

        </div>
    </div>
</template>

<style scoped></style>
