@extends('layouts.master')

@section('content')
    <div class="container mx-auto h-dvh">
        <div class="flex justify-between items-center w-full gap-4">
            <div class="w-1/3 bg-base-300 rounded-xl p-4 min-h-[450px]">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <h3 class="text-2xl font-black">{{ __('Login') }}</h3>

                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <label class="form-control w-full">
                                        <div class="label">
                                            <span class="label-text">E-mail</span>
                                        </div>
                                        <input type="text" placeholder="Digite seu e-mail"
                                            class="input input-primary input-bordered w-full @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email"
                                            autofocus />
                                        @error('email')
                                            <div class="label">
                                                <span class="label-text-alt">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </label>

                                    <label class="form-control w-full ">
                                        <div class="label">
                                            <span class="label-text">Senha</span>
                                        </div>
                                        <input type="password" placeholder="Digite sua senha"
                                            class="input input-primary input-bordered w-full @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="current-password" />
                                        @error('password')
                                            <div class="label">
                                                <span class="label-text-alt">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </label>

                                    <div class="row mb-3">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember_login" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    Lembrar-me
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-secondary btn-block text-white">
                                                Login
                                            </button>

                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Esqueceu sua senha?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="flex justify-center gap-4 mt-4">
                                        <div class="w-1/2">
                                            <button class="btn btn-primary btn-block text-white">Google</button>
                                        </div>
                                        <div class="w-1/2">
                                            <button class="btn btn-secondary btn-block text-white">Facebook</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider divider-horizontal"></div>
            <div class="bg-base-300 rounded-xl flex-1 p-4 min-h-[450px]">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <h3 class="text-2xl font-black">{{ __('Cadastre-se') }}</h3>
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="flex gap-4 mb-3">
                                        <label class="form-control w-full max-w-1/2">
                                            <div class="label">
                                                <span class="label-text">Nome</span>
                                            </div>
                                            <input type="text" placeholder="Digite seu nome"
                                                class="input input-primary input-bordered w-full max-w-1/2 @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}" required autocomplete="name"
                                                autofocus />
                                            @error('name')
                                                <div class="label">
                                                    <span class="label-text-alt">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </label>
                                        <label class="form-control w-full max-w-1/2">
                                            <div class="label">
                                                <span class="label-text">E-mail</span>
                                            </div>
                                            <input type="text" placeholder="Digite seu e-mail"
                                                class="input input-primary input-bordered w-full max-w-1/2 @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required autocomplete="email" />
                                            @error('email')
                                                <div class="label">
                                                    <span class="label-text-alt">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="flex gap-4 my-4">
                                        <label class="form-control w-full max-w-1/2">
                                            <div class="label">
                                                <span class="label-text">Senha</span>
                                            </div>
                                            <input type="password" placeholder="Digite sua senha"
                                                class="input input-primary input-bordered w-full max-w-1/2 @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password" />
                                            @error('password')
                                                <div class="label">
                                                    <span class="label-text-alt">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </label>
                                        <label class="form-control w-full max-w-1/2">
                                            <div class="label">
                                                <span class="label-text">Confirmar Senha</span>
                                            </div>
                                            <input type="password" placeholder="Confirme sua senha"
                                                class="input input-primary input-bordered w-full max-w-1/2"
                                                name="password_confirmation" required autocomplete="new-password" />
                                        </label>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-block btn-secondary text-white">
                                                {{ __('Cadastre-se') }}
                                            </button>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="flex justify-center gap-4 mt-4">
                                        <div class="w-1/2">
                                            <button class="btn btn-primary btn-block text-white">Cadastre-se com
                                                Google</button>
                                        </div>
                                        <div class="w-1/2">
                                            <button class="btn btn-secondary btn-block text-white">Cadastre-se com
                                                Facebook</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
