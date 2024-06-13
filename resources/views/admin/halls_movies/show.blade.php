@extends('layouts.admin')

@section('title', 'time_slots')

@section('content')
<div class="container">
    <a href="{{ route('admin.time_slots.index') }}" class="btn btn-primary mt-3"><i><i class="fa-solid fa-arrow-left"></i></a>
    <div class="container d-flex justify-content-center m-4">

      <div class="card" >
          <img src="https://www.repstatic.it/content/nazionale/img/2020/05/07/112203308-19805bf2-2c83-4fdf-9d47-3273349c3847.jpg?webp" class="card-img-top"> 
          <div class="card-body">
            <h5 class="card-title">{{ $HallMovie->movie_id}}</h5>
            <p class="card-text"> {{ $HallMovie->hall_id}}</p>
            <p class="card-text"> {{ $HallMovie->time_slot_id}}</p>
            <p class="card-text"> {{ $HallMovie->date}}</p>
            <p class="card-text">{{ $HallMovie->price_ticket}}</p>
            @if($HallMovie->halls)
                {{-- $post->tags esso e un array di tags--}}
                @foreach ($HallMovie->halls as $hall)
                    <p>Sala: {{$hall->name}}</p>
                @endforeach
              @endif
          </div>
      </div>
  </div>
</div>

   
@endsection