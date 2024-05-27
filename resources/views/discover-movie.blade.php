@extends('layouts.app')

@section('content')
    <h1>Discover Movie</h1>
    @dd(json_encode($result))
@endsection
