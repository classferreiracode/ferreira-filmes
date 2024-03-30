<script setup>
import { UserCircleIcon } from '@heroicons/vue/24/solid'

const props = defineProps({
    user: String
})
</script>
<template>
    <div>
        <div class="container mx-auto px-4 py-8 flex flex-col md:flex-row">
            <div class="flex items-center gap-4">
                <UserCircleIcon class="h-12 w-12 fill-sky-400" />
                <h1 class="text-4xl font-semibold">
                    {{ user }}
                </h1>
            </div>
        </div>
    </div>
</template>
