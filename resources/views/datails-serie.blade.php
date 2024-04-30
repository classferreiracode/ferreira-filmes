@extends('layouts.master')
@section('title', $serie->title . ' - ' . $serie->release_date)
@section('content')
    <details-serie :serie="{{ json_encode($serie) }}" />
@endsection
