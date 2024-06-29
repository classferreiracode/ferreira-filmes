<script setup>
import { ref, watch, defineProps } from 'vue';

const props = defineProps({
    data: Array
});

const options = ref(props.data);
const genre = ref(null);
const results = ref([]);

const customLabel = (option) => {
    return option.name;
};

const years = [2000, 2001, 2002, 2003, 2004, 2005, 2006, 2007, 2008, 2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020];
const orderBy = [{ id: 'asc', name: 'Mais recente' }, { id: 'desc', name: 'Mais antigo' }, { id: 'popularity.asc', name: 'Mais popular' }, { id: 'popularity.desc', name: 'Menos popular' }];

watch(genre, async (newGenre) => {
    if (newGenre) {
        try {
            const response = await axios.get(`/movie/discover/${newGenre.id}`);
            results.value = response.data;
        } catch (error) {
            console.error('Erro ao buscar filmes:', error);
        }
    }
});
</script>

<template>
    <div>
        <h3>Selecione um dos filtros</h3>
        <div class="flex gap-4">
            <VueMultiselect :options="options" :custom-label="customLabel" :selected="genre" v-model="genre"
                            placeholder="Selecione um dos gêneros" class="w-1/3" />

            <VueMultiselect :options="years" placeholder="Selecione um dos anos" class="w-1/3" />

            <VueMultiselect :options="orderBy" :custom-label="customLabel" placeholder="Ordernar por avaliação"
                            class="w-1/3" />

        </div>
        <div v-if="results.length">
            <h4 class="uppercase tracking-wider text-primary text-lg font-semibold">Resultados:</h4>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 mb-8">
                <div class="mt-8" v-for="result in results" :key="result.id">
                    <poster :data="result" />
                </div>
            </div>
            <hr>
        </div>
    </div>
</template>

<style scoped></style>
