@extends('layouts.master')

@section('title', $user->name)

@section('content')
    <user-profile :user="{{ json_encode($user) }}" :movies="{{ json_encode($movies) }}" />
@endsection
