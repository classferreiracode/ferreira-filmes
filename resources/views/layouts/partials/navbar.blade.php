<nav class="bg-base-300 w-full fixed z-10">
    <div class="navbar w-full container mx-auto">
        <div class="flex-1">
            <a class="btn btn-ghost text-xl" href="{{ route('home') }}">
                <img src="{{ asset('img/favicon.png') }}" alt="icon" class="w-8" />
                F. Filmes
            </a>
        </div>
        <div class="">
            <ul class="menu menu-horizontal p-0">
                <li><a href="">Filmes</a></li>
                <li><a href="">Séries</a></li>
                <li><a href="{{ route('persons') }}">Pessoas</a></li>
            </ul>
        </div>
        <div class="flex-none gap-2">
            @auth
                <div class="dropdown dropdown-end">
                    <profile-avatar :user_avatar="{{ json_encode(auth()->user()->avatar) }}" />

                </div>
            @endauth
            @guest
                <a href="#modal_login" class="btn btn-sm btn-outline btn-primary">Login</a>
            @endguest
        </div>
    </div>
</nav>
