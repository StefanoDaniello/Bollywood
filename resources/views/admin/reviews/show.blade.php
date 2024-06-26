@extends('layouts.admin')

@section('title', 'reviews')

@section('content')
<div class="container">
    <a href="{{ route('admin.reviews.index') }}" class="btn btn-primary mt-3"><i><i class="fa-solid fa-arrow-left"></i></a>
    <div class="container d-flex justify-content-center m-4">

      <div class="card" >
          <img src="" class="card-img-top" alt="{{ $review->name }}"> 
          <div class="card-body">
            <h5 class="card-title">{{ $review->author }}</h5>
            <p class="card-text">Contenuto Recensione: {{ $review->content}}</p>
            <div>Voto: {{ $review->rating }} </div>
            <a href="{{ route('admin.reviews.edit', $review->id) }}" class="btn btn-primary mt-3">Edit</a>
          </div>
      </div>
  </div>
</div>

   
@endsection