@extends('layouts.master')

@section('title', 'Series')

@section('content')
    <series :series="{{ json_encode($popularTv) }}" />
@endsection

