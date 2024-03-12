@extends('layouts.master')

@section('title', $user->name)

@section('content')
    <user-profile :user="{{ json_encode($user) }}" />
@endsection
