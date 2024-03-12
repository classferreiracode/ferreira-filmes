@extends('layouts.master')
@section('title', 'Series Favoritas')

@section('content')
    <div>
        <favorite-movie :series="{{ json_encode($series) }}">
    </div>
@endsection
