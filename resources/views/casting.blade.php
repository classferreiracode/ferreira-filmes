@extends('layouts.master')
@section('title', 'Casting')

@section('content')
<div>
    @ds($casting)
    <casting :casting="{{ json_encode($casting) }}" />
</div>
@endsection

