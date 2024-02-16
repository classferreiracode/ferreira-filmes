<template>
    <div class="w-full mx-auto max-w-7xl">
        <div>
            <form>
                <VueMultiselect class="" v-model="selected" placeholder="Busque um filme por nome" label="name"
                    track-by="id" :options="options" :custom-label="customLabel" :show-labels="false"
                    @search-change="onSearchChange" @input="onInput" @select="onSelect">
                    <template #noResult>
                        Oops! Nenhum resultado encontrado para <b>{{ search }}</b>
                    </template>
                    <template #noOptions>
                        Digite o nome do filme para iniciar a busca
                    </template>
                    <template #option="{ option }">
                        <a :href="'/movie/' + option.id">
                            <div class="flex items-center" @click="select_id = option.id">
                                <img :src="option.image" :alt="option.name" class="h-16 mr-3" v-if="option.image" />
                                <div>
                                    <div class="text-sm">
                                        {{ option.name }} - {{ option.year }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </template>
                    <template #selectedOption="{ option }">
                        <div>
                            <div class="text-sm">
                                {{ option.name }}
                            </div>
                            <div class="text-xs text-gray-500">
                                {{ option.year }}
                            </div>
                        </div>
                    </template>
                </VueMultiselect>
            </form>
        </div>
        <!-- <div class="mt-8 w-full max-w-7xl mx-auto flex flex-col items-center justify-center">
            <div class="join">
                <button class="join-item btn">«</button>
                <button class="join-item btn">Page 22</button>
                <button class="join-item btn">»</button>
            </div>
        </div> -->
    </div>
</template>

<script setup>
import { ref } from 'vue';
import VueMultiselect from 'vue-multiselect';

const options = ref([]);
const selected = ref(null);
const select_id = ref(null);
const search = ref('');

const onSearchChange = (query) => {
    search.value = query;

    axios.post('search', {
        query: query
    }).then((response) => {
        options.value = response.data;
    })
};
const onInput = (option) => {
    select_id.value = option.id;
    selected.value = option;
};
const onSelect = (option) => {
    select_id.value = option.id;
};
const customLabel = (option) => {
    return `${option.name} (${option.year})`;
};
</script>
