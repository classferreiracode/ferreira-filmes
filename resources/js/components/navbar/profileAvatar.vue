<script setup>
const props = defineProps(
    {
        user_avatar: String
    }
)
</script>

<template>
    <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
        <div class="w-8 rounded-full">
            <img alt="Avatar"
                :src="props.user_avatar !== null ? '../storage/img/profile/' + props.user_avatar : 'https://placehold.co/600x600?text=FF'" />
        </div>
    </div>
    <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
        <li>
            <a href="/user/profile" class="justify-between">
                Perfil
            </a>
        </li>
        <li>
            <details>
                <summary>
                    Favoritos
                </summary>
                <ul class="p-2 bg-base-100 rounded-t-none">
                    <li><a href="/user/favorites/movie">Filmes</a></li>
                    <li><a href="/user/favorites/serie">Series</a></li>
                </ul>
            </details>
        </li>
        <li>
            <a class="dropdown-item" href="/logout">
                Logout
            </a>
        </li>
    </ul>
</template>
