@extends('layouts.master')
@section('title', 'Pessoas Populares')

@section('content')
    <persons :persons="{{ json_encode($persons) }}" />
@endsection
