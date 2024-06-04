@extends('layouts.admin')

@section('title', 'Movies')

@section('content')
<a href="{{ route('admin.movies.index') }}" class="btn btn-primary mt-1"><i><i class="fa-solid fa-arrow-left"></i></a>
<div class="container m-auto m-4">

    <div class="card" >
        <img src="{{ $movie->cover_image }}" class="card-img-top" alt="{{ $movie->title }}">
        <div class="card-body">
          <h5 class="card-title">{{ $movie->title }}</h5>
          <p class="card-text"> {{ $movie->language }}</p>
          <p class="card-text"> {{ $movie->release_date }}</p>
          <p class="card-text"> {{ $movie->duration }}</p>
          <p class="card-text">{{ $movie->overview }}</p>
        </div>
          <a href="{{ route('admin.movies.edit', $movie->id) }}" class="btn btn-primary mt-3">Edit</a>
        </div>
    </div>
</div>
@endsection