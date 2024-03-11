@extends('layouts.master')
@section('title', 'FilmesFavoritos')

@section('content')
    <div>
        <favorite-movie :movies="{{ json_encode($movies) }}">
    </div>
@endsection
