@extends('layouts.master')
@section('title', $person->name)
@section('content')
    @ds($person)
    <profile :person="{{ json_encode($person) }}" />
@endsection
