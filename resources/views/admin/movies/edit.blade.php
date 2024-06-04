@extends('layouts.admin')
@section('title', 'Movie')

@section('content')
<div class="container m-auto">
    <div class="d-flex align-items-center">
        <a href="{{ route('admin.movies.index') }}" class="btn btn-primary "><i><i class="fa-solid fa-arrow-left"></i></a>
        <h1 class="mx-3">Edit</h1>
    </div>

<form action="{{route('admin.movies.update', $movie->id)}}" method="POST" enctype="multipart/form-data">
    @csrf  
    @method('PUT')
    
    <div class="mb-3">
        <label for="title" class="form-label">title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
            value="{{ old('title', $movie->title) }}" >
        @error('title')
            <div class ="invalid-feedback">{{$errors->first('title')}}</div>
        @enderror  
        <div id="nameHelp" class="form-text text-white">Inserire minimo 3 caratteri e massimo 200</div> 
    </div>
    <div class="mb-3">
        <label for="original_title" class="form-label">original_title</label>
        <input type="text" class="form-control @error('original_title') is-invalid @enderror" id="original_title"
            name="original_title" value="{{ old('original_title', $movie->original_title) }}">
            @error('original_title')
                <div class ="invalid-feedback">{{$errors->first('original_title')}}</div>
            @enderror 
    </div>

    <div class="mb-3">
        <label for="overview" class="form-label">overview</label>
        <textarea class="form-control @error('overview') is-invalid @enderror" id="overview"
            name="overview">{{ old('overview', $movie->overview) }}</textarea>
            @error('overview')
                <div class ="invalid-feedback">{{$errors->first('overview')}}</div>
            @enderror 
    </div> 
    
    <div class="mb-3">
        <label for="cover_image" class="form-label">cover_image</label>
        <input type="file" accept="image/*" class="form-control @error('cover_image') is-invalid @enderror" 
        id="cover_image"
            name="cover_image">
            @error('cover_image')
                <div class ="invalid-feedback">{{$errors->first('cover_image')}}</div>
            @enderror 
            @if($movie->cover_image)
            <img class="shadow" width="150" src="{{asset('storage/' . $movie->cover_image)}}" alt="{{$movie->title}}" id="uploadPreview">
            @else
            <img class="shadow" width="150" src="{{ old('cover_image', $movie->cover_image) }}" alt="{{$movie->title}}" id="uploadPreview">
            @endif
    </div>

    <div class="mb-3">
        <label for="release_date" class="form-label">release_date</label>
        <input type="date" class="form-control"  min="1" step="any" id="release_date" name="release_date" 
        value="{{ old('release_date', $movie->release_date) }}"/>
        @error('release_date')
            <div class ="invalid-feedback">{{$errors->first('release_date')}}</div>
        @enderror 
    </div>

    <div class="mb-3">
        <label for="trailer" class="form-label">trailer</label>
        <input type="url" class="form-control @error('trailer') is-invalid @enderror" id="trailer"
            name="trailer">
            @error('trailer')
                <div class ="invalid-feedback">{{$errors->first('trailer')}}</div>
            @enderror 
    </div>

    <div class="mb-3">
        <label for="language" class="form-label">language</label>
        <input type="text" class="form-control @error('language') is-invalid @enderror" id="language"
            name="language" value="{{ old('language', $movie->language) }}">
        @error('language')
            <div class ="invalid-feedback">{{$errors->first('language')}}</div>
        @enderror 
    </div>

    <div class="mb-3">
        <label for="duration" class="form-label">duration</label>
        <input type="time" step="2" class="form-control @error('duration') is-invalid @enderror" id="duration"
            name="duration" value="{{ old('duration', $movie->duration) }}"> 
        @error('duration')
            <div class ="invalid-feedback">{{$errors->first('duration')}}</div>
        @enderror 
    </div>
    
    <div class="mb-3">
        <button type="submit" class="btn btn-primary text-white">Modifica</button>
        <button type="reset"  class="btn btn-danger mx-4">Svuota campi</button>
    </div>
</form>   
</div>
@endsection

