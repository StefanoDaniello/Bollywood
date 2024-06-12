@extends('layouts.admin')
@section('title', 'halls_movies')

@section('content')  
<div class="container m-auto">
    

    <div class="d-flex align-items-center mt-3">
        <a href="{{ route('admin.halls_movies.index') }}" class="btn btn-primary "><i><i class="fa-solid fa-arrow-left"></i></a>
        <h1 class="mx-3">Create</h1>
    </div>

    
        <form action="{{route('admin.halls_movies.store')}}" method="POST" >
            @csrf
            
        {{-- SELECT HALL --}}
            <div class="mb-3">
                <label for="hall" class="form-label">Select Hall</label>
                <select name="hall" id="hall" class="form-control @error('hall') is-invalid @enderror">
                    <option value="">Select Hall</option>
                @foreach ($halls as $hall)
                    <option value="{{$hall->id}}" {{ $hall->id == old('hall') ? 'selected' : '' }}>{{$hall->name}}</option>
                @endforeach
                </select>
                @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

        {{-- SELECT MOVIE --}}
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

            {{-- SELECT TIME_SLOT --}}
            <div class="mb-3">
                <label for="time_slot_id" class="form-label">Select Time-Slot</label>
                <select name="time_slot_id" id="time_slot_id" class="form-control @error('time_slot_id') is-invalid @enderror">
                    <option value="">Select Time-Slot</option>
                @foreach ($time_slots as $time_slot)
                    <option value="{{$time_slot->id}}" {{ $time_slot->id == old('time_slot_id') ? 'selected' : '' }}>{{$time_slot->name}}</option>
                @endforeach
                </select>
                @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <button type="submit" class="btn btn-primary text-white">Create</button>
                <button type="reset"  class="btn btn-danger mx-4">Reset</button>
    
            </div>
            
        </form>

</div> 

@endsection