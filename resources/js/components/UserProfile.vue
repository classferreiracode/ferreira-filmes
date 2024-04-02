<script setup>
import sidenav from '../components/profile/Sidenav.vue';
import HeaderProfile from '../components/profile/HeaderProfile.vue';
import { reactive } from 'vue';

const props = defineProps({
    user: Object
})

const state = reactive(
    {
        user: props.user
    }
);

function onFileChange(e) {
    const file = e.target.files

    if (file === null) {
        console.log('null na image')
        return;
    }

    state.user.avatar = file[0]
}
function updateProfile() {
    var fd = new FormData();
    fd.append('avatar', state.user.avatar);
    fd.append('name', state.user.name);
    fd.append('email', state.user.email);
    axios({
        method: 'post',
        url: './profile/update',
        headers: {
            'Content-Type': 'multipart/form-data'
        },
        data: fd

    })
        .then((response) => {
            console.log("🚀 ~ .then ~ response.data:", response.data)
            if (response.data === "Formato") {
                Toast.fire({
                    icon: 'warning',
                    title: 'Perfil atualizado, porém avatar não enviado ou com formato inválido',
                    timer: 6000
                })
            } else {
                Toast.fire({
                    icon: 'success',
                    title: 'Seu perfil foi atualizado'
                })
            }
        })
        .catch((error) => {
            console.log(error)
            // Toast.fire({
            //     icon: 'error',
            //     title: 'Algo deu errado'
            // })
        })
}
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
                            <form @submit.prevent="updateProfile" id="edit-profile" class="flex flex-col gap-4 px-8">
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Avatar</span>
                                    </label>
                                    <input type="file" placeholder="Avatar" @change="onFileChange($event)"
                                        accept="image/*" name="avatar"
                                        class="file-input file-input-sm file-input-bordered w-full max-w-xs" />
                                </div>
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Nome</span>
                                    </label>
                                    <input type="text" placeholder="Nome" v-model="state.user.name"
                                        class="input input-sm input-bordered" />
                                </div>
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Email</span>
                                    </label>
                                    <input type="email" placeholder="Email" v-model="state.user.email"
                                        class="input input-sm input-bordered" disabled />

                                </div>
                                <div class="form-control mt-6">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
