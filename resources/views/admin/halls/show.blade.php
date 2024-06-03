@extends('layouts.admin')

@section('title', 'Halls')

@section('content')
    <h1>{{ $hall->name }}</h1>
    <span>
        {{ $hall->color }}
    </span>
    <p>
        {{ $hall->seats_num }}
        <br>
        {{ $hall->isense }}
        <br>
        {{ $hall->availability }}
        <br>
        {{ $hall->base_price }}
    </p>
@endsection