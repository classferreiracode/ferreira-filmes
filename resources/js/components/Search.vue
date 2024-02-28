<script>
export default {
    data() {
        return {
            selected: null,
            searchQuery: '',
            options: [],
            searching: false,
            result: null,
            select_id: null
        }
    },
    methods: {
        customLabel(option) {
            return `${option.name} - ${option.year}`
        },
        onSearchChange(searchQuery) {
            this.searchQuery = searchQuery;
            if (!this.searching) {
                this.search();
            }
        },
        onInput(selectedOption) {
            if (selectedOption != null || selectedOption != [] || selectedOption != '')
                this.selected = selectedOption;

            this.searching = false;
        },
        search() {
            this.searching = true;
            axios.post('/search', { query: this.searchQuery })
                .then(response => {
                    if (response.data.length > 0) {
                        response.data = response.data.filter(option => option.name !== null);
                        this.options = response.data;
                    }
                })
                .catch(error => {
                    console.error(error);
                })
                .finally(() => {
                    this.searching = false;
                });
        },
        onSelect(selectedOption) {
            this.select_id = selectedOption.id;

        }
    },
}
</script>
<template>
    <div class="form-control">
        <VueMultiselect class=" " v-model="selected" placeholder="Busque um filme/serie por nome" label="name"
                    track-by="id" :options="options" :custom-label="customLabel" :show-labels="false"
                    @search-change="onSearchChange" @input="onInput" @select="onSelect">
                    <template #noResult>
                        Oops! Nenhum resultado encontrado para <b>{{ selected }}</b>
                    </template>
                    <template #noOptions>
                        Digite o nome do filme para iniciar a busca
                    </template>
                    <template #option="{ option }">
                        <div class="flex items-center">
                            <a :href="'/movie/' + option.id ">

                                <img :src="option.image" :alt="option.name" class="h-16 mr-3" v-if="option.image" />
                                <div>
                                    <div class="text-sm">
                                        {{ option.name }}
                                    </div>
                                    <div class="text-xs text-gray-500">
                                        {{ option.year }}
                                    </div>
                                </div>
                            </a>
                        </div>
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
        <!-- <input type="text" id="search" v-model="search" @input="searchMovies" placeholder="Pesquisar"
            class="input input-sm input-bordered w-24 md:w-auto" /> -->
    </div>
</template>
