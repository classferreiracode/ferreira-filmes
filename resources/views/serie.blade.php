@extends('layouts.master')
@section('title', $serie->title . ' - ' . $serie->release_date)
@section('content')
    <serie :serie="{{ json_encode($serie) }}" />
@endsection
