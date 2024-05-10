<script setup>
import { ref } from 'vue';
const props = defineProps({
    data: Object
})

const options = ref(props.data);
const customLabel = (option) => {
    return option.name;
}

const years = [2000, 2020];

const orderBy = ['Menos avaliados', 'Mais avaliados'];


const genre = ref([]);

const selectGenre = (value) => {
    console.log(value);
}
</script>

<template>
    <div>
        <h3>Selecione um dos filtros</h3>
        <div class="flex gap-4">
            <VueMultiselect :options="options" :custom-label="customLabel" :selected="genre"
                            @change="selectGenre($event)" v-model="genre" placeholder="Selecione um dos gêneros"
                            class="w-1/3" />

            <VueMultiselect :options="years" placeholder="Selecione um dos anos"
                            class="w-1/3" />

            <VueMultiselect :options="orderBy" placeholder="Ordernar por avaliação"
                            class="w-1/3" />

        </div>
    </div>
</template>

<style scoped></style>
