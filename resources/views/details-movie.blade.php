@extends('layouts.master')
@section('title', $movie->title . ' - ' . $movie->release_date)
@section('content')
    <details-movie :movie="{{ json_encode($movie) }}" />
@endsection
