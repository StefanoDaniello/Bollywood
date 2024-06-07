@extends('layouts.admin')
@section('title', 'Movies')

@section('content')  

<div class="container m-auto">

    
<div class="d-flex align-items-center mt-3">
    <a href="{{ route('admin.movies.index') }}" class="btn btn-primary "><i><i class="fa-solid fa-arrow-left"></i></a>
    <h1 class="mx-3">Create</h1>
</div>
    <form action="{{route('admin.movies.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ old('title') }}" >
            @error('title')
                <div class ="invalid-feedback">{{$errors->first('title')}}</div>
            @enderror  
            <div id="nameHelp" class="form-text text-white">Inserire minimo 3 caratteri e massimo 200</div> 
        </div>
        <div class="mb-3">
            <label for="original_title" class="form-label">original_title</label>
            <input type="text" class="form-control @error('original_title') is-invalid @enderror" id="original_title"
                name="original_title" value="{{ old('original_title') }}">
                @error('original_title')
                    <div class ="invalid-feedback">{{$errors->first('original_title')}}</div>
                @enderror 
        </div>
    
        <div class="mb-3">
            <label for="overview" class="form-label">overview</label>
            <textarea class="form-control @error('overview') is-invalid @enderror" id="overview"
                name="overview">{{ old('overview') }}</textarea>
                @error('overview')
                    <div class ="invalid-feedback">{{$errors->first('overview')}}</div>
                @enderror 
        </div> 
        
            <div class="mb-3">
            <label for="cover_image" class="form-label">cover_image</label>
            <input type="file" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image"
            name="cover_image">
            @error('cover_image')
                <div class ="invalid-feedback">{{$errors->first('cover_image')}}</div>
            @enderror 
            <h4 class="mt-3">Your image</h4>
            <img class="shadow rounded-3" width="150" src="https://img.freepik.com/free-vector/illustration-gallery-icon_53876-27002.jpg" alt="" id="uploadPreview">
        </div> 


    
        <div class="mb-3">
            <label for="release_date" class="form-label">release_date</label>
            <input type="date" class="form-control"  min="1" step="any" id="release_date" name="release_date" 
            value="{{ old('release_date')}}"/>
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
                name="language" value="{{ old('language')}}">
            @error('language')
                <div class ="invalid-feedback">{{$errors->first('language')}}</div>
            @enderror 
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">duration</label>
            <input type="time" step="2" class="form-control @error('duration') is-invalid @enderror" id="duration"
                name="duration" value="{{ old('duration') }}"> 
            @error('duration')
                <div class ="invalid-feedback">{{$errors->first('duration')}}</div>
            @enderror 
        </div>

        <div class="form-group">
            <p>Select  Halls:</p>
            @foreach ($halls as $hall)
                <div>
                    <input class="form-check-input" type="checkbox" value="{{$hall->id}}"  name="halls[]"
                    {{-- per far si che i tag selezionati vengano salvati utilizzo 
                        un array dove veranno inseriti i valori di essi,
                        e tramite old verranno recuperati quando c'e un errore--}}
                    {{in_array($hall->id, old('halls', [])) ? 'checked' : ''}}>
                    <label class="form-check-label" for="">
                        {{$hall->name}}
                    </label>
                </div>
            @endforeach
            @error('halls')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>


        
        <div class="mb-3">
            <button type="submit" class="btn btn-primary text-white">Create</button>
            <button type="reset"  class="btn btn-danger mx-4">Reset</button>
        </div>
        
    </form>
</div>
@endsection