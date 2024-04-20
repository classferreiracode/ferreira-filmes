@extends('errors::minimal')

@section('title', __('Server Error'))
@section('content')
    <section class="flex items-center h-screen p-16 bg-base-300 dark:bg-base-100">
        <div class="container flex flex-col items-center ">
            <div class="flex flex-col gap-6 max-w-md text-center">
                <h2 class="font-extrabold text-9xl text-gray-600 dark:text-gray-100">
                    <span class="sr-only">Error</span>500
                </h2>
                <p class="text-2xl md:text-3xl dark:text-gray-300">Desculpe, houve um erro ao consultar a API do parceiro. Tente novamente!</p>
                <button type="button" onclick="window.location.reload()" class="px-8 py-4 text-xl font-semibold rounded bg-purple-600 text-gray-50 hover:text-gray-200">Recarregar</button>
            </div>
        </div>
    </section>
@endsection
