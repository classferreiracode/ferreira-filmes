<script setup>
import sidenav from './profile/sidenav.vue';
import HeaderProfile from './profile/HeaderProfile.vue';

const props = defineProps({
    user: Object
})

</script>

<template>
    <div class="movie-info border-b border-gray-600 h-screen">
        <HeaderProfile :user="user.name" />
        <div class="container mx-auto px-4 py-8 flex flex-col md:flex-row">
            <div class="grid grid-flow-row-dense grid-cols-5 grid-rows-3 w-full gap-8">
                <sidenav />
                <div class="col-span-4">
                    <div class="rounded-t-lg text-center py-2 bg-secondary">
                        <h3 class="text-xl font-semibold">Editar Perfil</h3>
                    </div>
                    <div>
                        <div class="rounded-b-lg bg-base-300 p-4">
                            <form id="edit-profile" class="flex flex-col gap-4 px-8">
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Avatar</span>
                                    </label>
                                    <input type="file"
                                        class="file-input file-input-sm file-input-bordered w-full max-w-xs" />
                                </div>
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Nome</span>
                                    </label>
                                    <input type="text" placeholder="Nome" v-model="user.name"
                                        class="input input-sm input-bordered" />
                                </div>
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Email</span>
                                    </label>
                                    <input type="email" placeholder="Email" v-model="user.email"
                                        class="input input-sm input-bordered" disabled />
                                </div>
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Senha</span>
                                    </label>
                                    <input type="password" placeholder="Senha" class="input input-sm input-bordered" />
                                </div>
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Nova Senha</span>
                                    </label>
                                    <input type="password" placeholder="Nova Senha"
                                        class="input input-sm input-bordered" />
                                </div>
                                <div class="form-control mt-6">
                                    <button class="btn btn-primary">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
