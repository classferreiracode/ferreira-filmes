<script>
export default {
    data() {
        return {
            selected: null,
            searchQuery: '',
            options: [],
            searching: false,
            result: null,
            select_id: null,
            media_type: null
        }
    },
    methods: {
        customLabel(option) {
            return option.name + ' (' + option.year + ') - ' + option.media_type;
        },
        translateMediaType(media_type) {
            switch (media_type) {
                case 'movie':
                    return 'Filme';
                case 'tv':
                    return 'Serie';
                case 'person':
                    return 'Personagem';
                default:
                    return media_type
            }
        },
        onSearchChange(searchQuery) {
            this.searchQuery = searchQuery;
            this.search();
        },
        onInput(selectedOption) {
            if (selectedOption != null || selectedOption != [] || selectedOption != '')
                this.selected = selectedOption;
        },
        search() {
            this.searching = true;
            axios.post('/search', {
                query: this.searchQuery,
                media_type: this.media_type
            })
                .then(response => {
                    console.log(response.data);
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
        <VueMultiselect
            v-debounce:300="onSearchChange"
            v-model="selected"
            placeholder="Busque um filme/serie por nome"
            label="name"
            track-by="id"
            :options="options"
            :custom-label="customLabel"
            :show-labels="false"
            :searchable="true"
            :loading="searching"
            :delay="300"
            @search-change="search"
            @input="onInput"
            :close-on-select="true">

            <template #noOptions>
                Digite o nome do filme/serie para iniciar a busca
            </template>

            <template #option="{ option }">
                <a :href="option.media_type == 'movie' ? '/movie/' + option.id : '/serie/' + option.id" :key="option">
                    <div class="flex items-center">
                        <img :src="option.image" :alt="option.name" class="h-16 mr-3" />
                        <div>
                            <div class="text-sm">
                                {{ option.id }} | {{ option.name }} - {{ translateMediaType(option.media_type) }}
                            </div>
                            <div class="text-xs text-gray-500">
                                {{ option.year }}
                            </div>
                        </div>
                    </div>
                </a>
            </template>
        </VueMultiselect>
    </div>
</template>
