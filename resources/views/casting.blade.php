@extends('layouts.master')
@section('title', 'Casting')

@section('content')
<div>
    <casting
        :casting="{{ json_encode($casting) }}"
        :movie="{{ json_encode($movie) }}"
    />
</div>
@endsection

