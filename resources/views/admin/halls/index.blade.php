@extends('layouts.admin')
@section('title', 'Halls')

@section('content')
<ul>
    @foreach ($halls as $hall)
    <li>
        <a href="{{route('admin.halls.show', $hall->id)}}">{{ $hall->name }}</a>
    </li>   
    <li><a href="">{{ $hall->color }}</a></li>
    <li><a href="">{{ $hall->seats_num }}</a></li>
    <li><a href="">{{ $hall->isense }}</a></li>
    <li><a href="">{{ $hall->availability }}</a></li>
    <li><a href="">{{ $hall->base_price }}</a></li>
    <a href="{{route('admin.halls.edit', $hall->id)}}" title="Modifica"><i class="fa-solid fa-pen"></i></a>
    <form action="{{route('admin.halls.destroy' , $hall->id)}}" method="POST" class="d-inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" class="delete-button border-0 bg-transparent"  data-item-title="{{ $hall->name }}">
            <i class="fa-solid fa-trash"></i>
        </button>
    </form>
    @endforeach
</ul>
@endsection