@extends('layouts.admin')

@section('title', 'Movies')

@section('content')
<div class="container">
  <a href="{{ route('admin.movies.index') }}" class="btn btn-primary my-4"><i><i class="fa-solid fa-arrow-left"></i></a>
  <div class="container d-flex justify-content-center m-4">
    <div class="card" >
      <img src="https://www.repstatic.it/content/nazionale/img/2020/05/07/112203308-19805bf2-2c83-4fdf-9d47-3273349c3847.jpg?webp"
        class="card-img-top" alt="{{ $movie->title }}">
      <div class="card-body">
        <h5 class="card-title">{{ $movie->title }}</h5>
        <p class="card-text"> {{ $movie->language }}</p>
        <p class="card-text"> {{ $movie->release_date }}</p>
        <p class="card-text"> {{ $movie->duration }}</p>
        <p class="card-text">{{ $movie->overview }}</p>
        <a href="{{ route('admin.movies.edit', $movie->id) }}" class="btn btn-primary mt-3">Edit</a>
      </div>
    </div>
  </div>
  
@if($movie->reviews)
  <table class="table table-striped">
    <thead>
        <tr>
          <th scope="col">Author</th>
          <th scope="col">Content</th>
          <th scope="col">Rating</th>          
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($movie->reviews as $review)
        <tr>
            <td>{{$review->author}}</td>
            <td>{{$review->content}}</td>
            <td>{{$review->rating}}</td>
            <td>
                <a href="{{route('admin.reviews.show', $review->id)}}" title="Show" class="text-black px-2"><i class="fa-solid fa-eye"></i></a>
                <a href="{{route('admin.reviews.edit', $review->id)}}" title="Edit" class="text-black px-2"><i class="fa-solid fa-pen"></i></a>
                <form action="{{route('admin.reviews.destroy', $review->id)}}" method="review" class="d-inline-block">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="delete-button border-0 bg-transparent"  data-item-title="{{ $review->author }}" data-item-id = "{{ $review->id }}">
                    <i class="fa-solid fa-trash"></i>
                  </button>

                </form>
            </td>
          </tr>
        @endforeach
      </tbody>
  </table>
@endif

</div>

@endsection