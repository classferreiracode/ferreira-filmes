<script setup>
import { ref } from 'vue';
const props = defineProps({
    data: Object
})

const options = ref(props.data);
const customLabel = (option) => {
    return option.name;
}

const genre = ref([]);

const selectGenre = (value) => {
    console.log(value);
}
</script>

<template>
<div>
    <h3>Selecione um dos filtros</h3>
    <div>
        <VueMultiselect
            :options="options"
            :custom-label="customLabel"
            :selected="genre"
            @change="selectGenre($event)"
            v-model="genre"
            placeholder="Selecione um dos gêneros"
            class="w-1/4"/>
    </div>
</div>
</template>

<style scoped>

</style>
