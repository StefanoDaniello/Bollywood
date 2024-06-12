@extends('layouts.admin')
@section('title', 'time_slots')

@section('content')  
<div class="container m-auto">
    

    <div class="d-flex align-items-center mt-3">
        <a href="{{ route('admin.time_slots.index') }}" class="btn btn-primary "><i><i class="fa-solid fa-arrow-left"></i></a>
        <h1 class="mx-3">Create</h1>
    </div>

    
        <form action="{{route('admin.time_slots.store')}}" method="POST" >
            @csrf
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author"
                    value="{{ old('author') }}" >
               @error('author')
                    <div class ="alert alert-danger">{{$errors->first('author')}}</div>
                @enderror 
               <div id="authorHelp" class="form-text text-white">Inserire minimo 3 caratteri e massimo 200</div> 
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content"
                name="content">{{ old('content') }}</textarea>
                   @error('content')
                        <div class ="alert alert-danger">{{$errors->first('content')}}</div>
                    @enderror  
            </div>



            <div class="mb-3">
                <label for="movie_id" class="form-label">Select Movie</label>
                <select name="movie_id" id="movie_id" class="form-control @error('movie_id') is-invalid @enderror">
                    <option value="">Select Movie</option>
                  @foreach ($movies as $movie)
                      <option value="{{$movie->id}}" {{ $movie->id == old('movie_id') ? 'selected' : '' }}>{{$movie->title}}</option>
                  @endforeach
                </select>
                @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <input type="number" min="1"max="10" step="0.1" class="form-control @error('rating') is-invalid @enderror" id="rating"
                    name="rating" value="{{ old('rating') }}">
               @error('rating')
                    <div class ="alert alert-danger">{{$errors->first('rating')}}</div>
                @enderror 
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary text-white">Create</button>
                <button type="reset"  class="btn btn-danger mx-4">Reset</button>
    
            </div>
            
        </form>

</div> 

@endsection