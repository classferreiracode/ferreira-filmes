@extends('layouts.app')

@section('content')
    <DiscoverMovie :data="{{ json_encode($result) }}" />
@endsection
