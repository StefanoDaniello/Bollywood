@extends('layouts.admin')

@section('title', 'Halls')

@section('content')
<a href="{{ route('admin.halls.index') }}" class="btn btn-primary mt-1"><i><i class="fa-solid fa-arrow-left"></i></a>
<div class="container d-flex justify-content-center m-4">

    <div class="card" >
        <img src="https://www.repstatic.it/content/nazionale/img/2020/05/07/112203308-19805bf2-2c83-4fdf-9d47-3273349c3847.jpg?webp" class="card-img-top" alt="{{ $hall->name }}">
        <div class="card-body">
          <h5 class="card-title">{{ $hall->name }}</h5>
          <p class="card-text"> Colore Sala: {{ $hall->color }}</p>
          <div class="card-text">
            @if ($hall->isense == 1)
            <span>Isense Tecnology: Si</span>
            @else
                <span>Isense Tecnology: No</span>
            @endif
          </div>
          <div>
            @if ($hall->availability == 1)
            <span>Disponibile</span>
            @else
                <span>Non Disponibile</span>
            @endif
          </div>
          <div>Numero Posti: {{ $hall->seats_num }}</div>
          <div>Prezzo Base: {{ $hall->base_price }}</div>
          <a href="{{ route('admin.halls.edit', $hall->id) }}" class="btn btn-primary mt-3">Edit</a>
        </div>
    </div>
</div>
   
@endsection