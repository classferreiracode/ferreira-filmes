@extends('layouts.master')

@section('title', 'Filmes')

@section('content')
    <movies :movies="{{ json_encode($popularMovies) }}" />
@endsection
