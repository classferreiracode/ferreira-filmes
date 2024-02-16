@extends('layouts.master')

@section('content')
    <home :popular_movies="{{ json_encode($popularMovies) }}" />
@endsection
