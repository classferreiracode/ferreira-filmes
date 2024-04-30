<script setup>
import {StarIcon} from "@heroicons/vue/24/solid/index.js";

const props = defineProps({
    data: Object
});
</script>

<template>
    <div>
        <a :href="'/movie/' + data.id">
            <img :src="data.poster_path" alt="{{ data.title }}"
                 class=" rounded hover:opacity-75 transition ease-in-out duration-150">
        </a>
        <div class="mt-2">
            <a class="text-lg mt-2 hover:text-gray-300 duration-500 cursor-pointer">
                {{ data.title }}
            </a>
            <div class="flex items-center justify-between text-gray-400 text-sm mt-1">
                <div class="flex items-center text-gray-400 text-sm mt-1">
                    <StarIcon class="h-5 w-5 fill-yellow-500" />
                    <span class="ml-1">
                        {{ data.vote_average.toFixed(1) }}
                    </span>
                    <span class="mx-2">|</span>
                    <span>
                        {{ data.release_date }}
                    </span>
                </div>
                <div class="flex items-center  text-gray-400 text-sm mt-1">
                    <Favorite :data="data" :size="5" />
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
