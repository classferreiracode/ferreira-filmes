@extends('layouts.master')
@section('title', 'Series Favoritas')

@section('content')
    <div>
        <favorite-serie :series="{{ json_encode($series) }}">
    </div>
@endsection
