@extends('layouts.admin')

@section('title', 'time_slots')

@section('content')
<div class="container">
    <a href="{{ route('admin.halls_movies.index') }}" class="btn btn-primary mt-3"><i><i class="fa-solid fa-arrow-left"></i></a>
    <div class="container d-flex justify-content-center m-4">

      <div class="card" >
          <img src="https://www.repstatic.it/content/nazionale/img/2020/05/07/112203308-19805bf2-2c83-4fdf-9d47-3273349c3847.jpg?webp" class="card-img-top"> 
          <div class="card-body">
            
            <h5 class="card-title">Film: {{$halls_movie->movie->title}}</h5>
            <p class="card-text">Nome Sala: {{ $halls_movie->hall->name}}</p>
            <p class="card-text">Fascia Oraria: {{ $halls_movie->time_slot->name}} ({{ $halls_movie->time_slot->start_time }} - {{ $halls_movie->time_slot->end_time}})</p>
            <p class="card-text">Data Proiezione: {{ $halls_movie->date}}</p>
            <p class="card-text">Prezzo Biglietto: {{  $halls_movie->price_ticket}} €</p>
          </div>
      </div>
  </div>
</div>

@endsection