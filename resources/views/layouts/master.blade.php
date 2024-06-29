<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full" data-theme="synthwave">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link type="image/png" sizes="32x32" rel="icon" href="{{ asset('img/favicon.png') }}">

    <title>{{ config('app.name') }} | @yield('title', 'Home')</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-white">
    <div id="app" class="">
        @include('layouts.partials.navbar')
        @if (!request()->is('user/*'))
            <div class="flex justify-center flex-col items-center w-full">
                <div class="pt-24 px-32 w-full">
                    <search />
                </div>
                <div class="pt-8 px-32 w-full">
                    <filters :data="{{ json_encode($genres) }}" />
                </div>
            </div>
        @endif

        <main class="pt-16">
            @yield('content')
        </main>
    </div>
    <footer class="footer items-center p-4 bg-neutral text-neutral-content">
        <aside class="items-center grid-flow-col">
            <img src="{{ asset('img/favicon.png') }}" alt="icon" class="w-8" />
            <p>Copyright © 2024 - All right reserved</p>
        </aside>
        <nav class="grid-flow-col gap-4 md:place-self-center md:justify-self-end">
            <a>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    class="fill-current">
                    <path
                        d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
                    </path>
                </svg>
            </a>
            <a>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    class="fill-current">
                    <path
                        d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z">
                    </path>
                </svg>
            </a>
            <a href="https://www.facebook.com/profile.php?id=61560332503346">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    class="fill-current">
                    <path
                        d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z">
                    </path>
                </svg>
            </a>
        </nav>
    </footer>
    <dialog id="modal_login" class="modal bg-black bg-opacity-95">
        <div class="modal-box w-11/12 max-w-sm">
            <form method="dialog">
                <a href="#" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</a>
            </form>
            <h3 class="font-bold text-2xl mb-5 text-center">Login e Cadastro</h3>
            <div role="tablist" class="tabs tabs-lifted">
                <input type="radio" name="my_tabs_2" role="tab" class="tab" aria-label="Login" checked />
                <div role="tabpanel" class="tab-content border-base-300 rounded-box p-6">
                    <div class="container mx-auto">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3 ">
                                <label for="email-login" class="col-md-4 col-form-label text-md-end">E-mail</label>

                                <div class="col-md-6">
                                    <input type="email" id="email-login" placeholder="Email"
                                        class="input input-bordered input-primary w-full max-w-xs form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        autofocus class="" />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password_login" class="col-md-4 col-form-label text-md-end">Senha</label>

                                <div class="col-md-6">
                                    <input type="password" id="password_login" placeholder="Senha"
                                        class="input input-bordered input-primary w-full max-w-xs form-control @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password" />

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            Lembrar-me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Esqueceu a senha?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="flex justify-center gap-4 mt-4">
                                <div class="w-1/2">
                                    <a href="{{ route('google.login') }}"
                                        class="btn btn-primary btn-block text-white">
                                        Google
                                    </a>
                                </div>
                                <div class="w-1/2">
                                    <a href="{{ route('facebook.login') }}"
                                        class="btn btn-secondary btn-block text-white"> Facebook</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <input type="radio" name="my_tabs_2" role="tab" class="tab" aria-label="Cadastro" />
                <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                    <div class="container">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Nome</label>

                                <div class="col-md-6">
                                    <input id="name" name="name" type="text" placeholder="Digite seu ome"
                                        class="@error('name') is-invalid @enderror input input-bordered input-primary w-full max-w-xs"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus />
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" name="email" type="email"
                                        placeholder="Digite seu melhor E-Mail"
                                        class="input input-bordered input-primary w-full max-w-xs @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" required autocomplete="email" />

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Senha</label>

                                <div class="col-md-6">
                                    <input type="password" id="password" name="password"
                                        placeholder="Digite sua senha"
                                        class="@error('password') is-invalid @enderror input input-bordered input-primary w-full max-w-xs"
                                        required autocomplete="new-password" />

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirme sua
                                    senha</label>

                                <div class="col-md-6">
                                    <input type="password" id="password-confirm" name="password_confirmation"
                                        placeholder="Confirme sua senha"
                                        class="input input-bordered input-primary w-full max-w-xs" required
                                        autocomplete="new-password" />
                                </div>
                            </div>

                            <div class="mt-8">
                                <div class="flex items-center justify-center">
                                    <button type="submit" class="btn btn-secondary btn-block">
                                        Cadastre-se
                                    </button>
                                </div>
                            </div>
                            <div class="flex justify-center gap-4 mt-4">
                                <div class="w-1/2">
                                    <a href="{{ route('google.login') }}"
                                        class="btn btn-primary btn-block text-white">Cadastre-se com
                                        Google</a>
                                </div>
                                <div class="w-1/2">
                                    <a href="{{ route('facebook.login') }}"
                                        class="btn btn-secondary btn-block text-white">Cadastre-se com
                                        Facebook</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </dialog>
</body>

</html>
