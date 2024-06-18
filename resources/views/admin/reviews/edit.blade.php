@extends('layouts.admin')
@section('title', 'Reviews')

@section('content')
<div class="container m-auto">
    <div class="d-flex align-items-center mt-3">
        <a href="{{ route('admin.reviews.index') }}" class="btn btn-primary "><i><i class="fa-solid fa-arrow-left"></i></a>
        <h1 class="mx-3">Edit</h1>
    </div>

<form action="{{route('admin.reviews.update', $review->id)}}" method="POST" >
    @csrf  
    @method('PUT')  
    <div class="mb-3">
        <label for="author" class="form-label">author</label>
        <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author"
            value="{{ old('author', $review->author) }}" >
        @error('author')
            <div class ="alert alert-danger">{{$errors->first('author')}}</div>
        @enderror  
        <div id="authorHelp" class="form-text text-white">Inserire minimo 3 caratteri e massimo 200</div> 
    </div>
    
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control @error('content') is-invalid @enderror" id="content"
            name="content">{{ old('content', $review->content) }}</textarea>
            @error('content')
                <div class ="invalid-feedback">{{$errors->first('content')}}</div>
            @enderror 
    </div> 

    <div class="mb-3">
                <label for="movie_id" class="form-label">Select Movie</label>
                <select name="movie_id" id="movie_id" class="form-control @error('movie_id') is-invalid @enderror">
                    <option value="">Select Movie</option>
                  @foreach ($movies as $movie)
                      <option value="{{ $movie->id }}" {{ $review->movie_id == $movie->id ? 'selected' : '' }} >
                        {{$movie->title}}</option>
                  @endforeach
                </select>
                @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <input type="text" class="form-control @error('rating') is-invalid @enderror" id="rating"
                    name="rating" value="{{ old('rating', $review->rating) }}">
               @error('rating')
                    <div class ="alert alert-danger">{{$errors->first('rating')}}</div>
                @enderror 
            </div>
    
    <div class="mb-3">
        <button type="submit" class="btn btn-primary text-white">Modifica</button>
        <button type="reset"  class="btn btn-danger mx-4">Svuota campi</button>
    </div>
</form>   
</div>
@endsection

