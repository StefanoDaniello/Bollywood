@extends('layouts.admin')

@section('title', 'Halls')

@section('content')
<div class="container">
  <a href="{{ route('admin.halls.index') }}" class="btn btn-primary mt-3"><i><i class="fa-solid fa-arrow-left"></i></a>
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
      <div>Prezzo Base: {{ $hall->base_price }} €</div>
      <a href="{{ route('admin.halls.edit', $hall->id) }}" class="btn btn-primary mt-3">Edit</a>
    </div>
  </div>

</div>
@if($hall->movies)
  <div class="container">
    <table class="table table-striped">
      <thead>
          <tr>
            <th scope="col">Titolo</th>
            <th scope="col">Titolo originale</th>
            <th scope="col">release_date</th>
            <th scope="col">lenguage</th>
            <th scope="col">duration</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($hall->movies as $movie)
          <tr>
              <td>{{$movie->title}}</td>
              <td>{{$movie->original_title}}</td>
              <td>{{$movie->release_date}}</td>
              <td>{{$movie->lenguage}}</td>
              <td>{{$movie->duration}}</td>
              <td>
                  <a href="{{route('admin.movies.show', $movie->id)}}" title="Show" class="text-black px-2"><i class="fa-solid fa-eye"></i></a>
                  <a href="{{route('admin.movies.edit', $movie->id)}}" title="Edit" class="text-black px-2"><i class="fa-solid fa-pen"></i></a>
                  <form action="{{route('admin.movies.destroy', $movie->id)}}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button border-0 bg-transparent"  data-item-title="{{ $movie->title }}" 
                      data-item-id = "{{ $movie->id }}">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                  </form>
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
  </div>
@endif



   
@endsection