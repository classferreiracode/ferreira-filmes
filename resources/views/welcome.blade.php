@extends('layouts.master')

@section('content')
    <home :popular_movies="{{ json_encode($popularMovies) }}" :popular_tv="{{ json_encode($popularTv) }}"
        :favorites="{{ json_encode(session()->get('favorites')) }}" />
@endsection
