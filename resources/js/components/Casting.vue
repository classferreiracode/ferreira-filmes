<script setup>
const props = defineProps({
    casting: Object
})

function getInitials(name) {
    return name
        .split(' ')
        .map((n) => n[0])
        .join('');
}
</script>
<template>
    <div class="container mx-auto px-4 pt-8">
        <div class="casting-info my-16">
            <!-- Elenco -->
            <h2 class="uppercase tracking-wider text-primary text-lg font-semibold">
                Elenco
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 mb-16">
                <div v-for="cast in casting.cast" class="mt-8 flex flex-col items-center text-center justify-center"
                    :key="cast.id">
                    <a :href="'/person/' + cast.id">
                        <div :class="cast.profile_path ? 'avatar' : 'avatar placeholder'">
                            <div class="w-16 rounded-full ring ring-accent ring-offset-warning ring-offset-2 my-4">
                                <img v-if="cast.profile_path"
                                    :src="'https://image.tmdb.org/t/p/w235_and_h235_face/' + cast.profile_path"
                                    :alt="cast.name" class="hover:opacity-75 transition ease-in-out duration-150" />
                                <span v-else class="text-3xl">
                                    {{ cast.name }}
                                </span>
                            </div>
                        </div>
                    </a>
                    <div class="mt-2">
                        <a :href="'/person/' + cast.id" class="text-md mt-2 hover:text-gray-300 duration-500">
                            {{ cast.name }}
                        </a>
                        <div class="text-gray-400 text-sm mt-1">
                            <span>
                                {{ cast.character }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Equipe -->
            <h2 class="uppercase tracking-wider text-primary text-lg font-semibold">
                Equipe
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <div v-for="cast in casting.crew" class="mt-8 flex flex-col items-center text-center justify-center"
                    :key="cast.id">
                    <a :href="'/person/' + cast.id">
                        <div :class="cast.profile_path ? 'avatar' : 'avatar placeholder'">
                            <div class="w-16 rounded-full ring ring-accent ring-offset-warning ring-offset-2 my-4">
                                <img v-if="cast.profile_path"
                                    :src="'https://image.tmdb.org/t/p/w235_and_h235_face/' + cast.profile_path"
                                    :alt="cast.name" class="hover:opacity-75 transition ease-in-out duration-150" />
                                <span v-else class="text-3xl">
                                    {{ cast.name }}
                                </span>
                            </div>
                        </div>
                    </a>
                    <div class="mt-2">
                        <a :href="'/person/' + cast.id" class="text-md mt-2 hover:text-gray-300 duration-500">
                            {{ cast.name }}
                        </a>
                        <div class="text-gray-400 text-sm mt-1">
                            <span>
                                {{ cast.job }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
