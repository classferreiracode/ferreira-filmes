@extends('layouts.master')

@section('content')

    <movie :movie="{{ json_encode($movie) }}" />
@endsection
