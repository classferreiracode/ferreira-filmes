<script setup>
const props = defineProps({
    user: Object
})
</script>

<template>
    <div class="movie-info border-b border-gray-600">
        <div class="container mx-auto px-4 py-8 flex flex-col md:flex-row">
            <div class="flex-none">
                <h1 class="text-4xl font-semibold">
                    {{ user.name }}
                </h1>
            </div>
        </div>
        <div class="container w-full mx-auto px-4 py-8 flex flex-col md:flex-row">
            <div class="overflow-x-auto w-full">
                <table class="table w-full">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>
                                <label>
                                    <input type="checkbox" class="checkbox" />
                                </label>
                            </th>
                            <th></th>
                            <th>Filme</th>
                            <th>Equipe</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        <tr>
                            <th>
                                <label>
                                    <input type="checkbox" class="checkbox" />
                                </label>
                            </th>
                            <td>
                                <div class="flex items-center gap-3">
                                    <div class="avatar">
                                        <div class="mask mask-squircle w-12 h-12">
                                            <img src="https://placehold.co/600x400?text=Hello+World"
                                                alt="Avatar Tailwind CSS Component" />
                                        </div>
                                    </div>

                                </div>
                            </td>
                            <td>
                                <div>
                                    <div class="font-bold">Aquaman 2</div>
                                    <div class="text-sm opacity-50">2023</div>
                                </div>
                            </td>
                            <td>DIRETOR | ROTEIRO </td>
                            <th>
                                <button class="btn btn-ghost btn-xs">details</button>
                            </th>
                        </tr>
                    </tbody>


                </table>
            </div>
        </div>
    </div>
</template>
