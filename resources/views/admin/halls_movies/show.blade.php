@extends('layouts.admin')

@section('title', 'time_slots')

@section('content')
<div class="container">
    <a href="{{ route('admin.time_slots.index') }}" class="btn btn-primary mt-3"><i><i class="fa-solid fa-arrow-left"></i></a>
    <div class="container d-flex justify-content-center m-4">

      <div class="card" >
          <img src="https://www.repstatic.it/content/nazionale/img/2020/05/07/112203308-19805bf2-2c83-4fdf-9d47-3273349c3847.jpg?webp" class="card-img-top" alt="{{ $time_slot->name }}"> 
          <div class="card-body">
            <h5 class="card-title">{{ $time_slot->author }}</h5>
            <p class="card-text"> Colore Sala: {{ $time_slot->content}}</p>
            <div>Voto: {{ $time_slot->rating }} </div>
            <a href="{{ route('admin.time_slots.edit', $time_slot->id) }}" class="btn btn-primary mt-3">Edit</a>
          </div>
      </div>
  </div>
</div>

   
@endsection