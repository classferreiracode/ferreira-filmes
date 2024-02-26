@extends('layouts.master')
@section('title', $person->name)
@section('content')
    <profile :person="{{ json_encode($person) }}" />
@endsection
