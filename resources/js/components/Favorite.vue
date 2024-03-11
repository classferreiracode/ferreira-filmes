<script setup>
import { HeartIcon } from '@heroicons/vue/24/solid'
import { HeartIcon as HeartIconOutline } from '@heroicons/vue/24/outline'
import { ref, onMounted } from "vue";

const favorites = ref([]);

onMounted(() => {
    getFavorites();
});

const props = defineProps({
    data: Object,
    size: Number
})

const favoriteMovie = (id, type) => {
    axios.get('/favorite/' + id + '/' + type)
        .then(response => {
            getFavorites()
            if (response.data === 'Favorite Removed') {
                Toast.fire({
                    icon: 'success',
                    title: 'Filme/Serie foi removido dos seus favoritos',
                })
            } else if (response.data === 'Favorite Added') {
                Toast.fire({
                    icon: 'success',
                    title: 'Filme/Serie foi adicionado aos seus favoritos',
                })
            }
        })
        .catch(error => {
            if (error.response.status === 401) {
                Toast.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Faça login para adicionar aos favoritos',
                })
            }
        })
}

const getFavorites = () => {
    axios.get('/favorites')
        .then(response => {
            favorites.value = mapMovieId(response.data) || response.data
        })
        .catch(error => {
            console.log(error)
        })
}

function mapMovieId(movies) {
    return movies.map(item => item.movie_id)
}
</script>

<template>
    <div>

        <a class="cursor-pointer tooltip" data-tip="Adicionar aos Favoritos" @click="favoriteMovie(data.id, data.type)">
            <HeartIcon v-if="favorites.includes(data.id)"
                :class="'h-' + size + ' fill-red-700 hover:fill-white transition ease-in-out duration-150'" />

            <HeartIconOutline v-else
                :class="'h-' + size + ' stroke-white hover:stroke-red-700 transition ease-in-out duration-150'" />
        </a>

    </div>
</template>
