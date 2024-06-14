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
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name') }}" >
            @error('name')
                <div class ="alert alert-danger">{{$errors->first('name')}}</div>
            @enderror  
            <div id="nameHelp" class="form-text text-white">Inserire minimo 3 caratteri e massimo 200</div> 
        </div>
        
        <div class="mb-3">
            <label for="start_time" class="form-label">Start Time</label>
            <input type="time" step="2" class="form-control @error('start_time') is-invalid @enderror" id="start_time" name="start_time"
                value="{{ old('start_time') }}" >
            @error('start_time')
                <div class ="alert alert-danger">{{$errors->first('start_time')}}</div>
            @enderror  
        </div> 

        <div class="mb-3">
            <label for="end_time" class="form-label">End Time</label>
            <input type="time" step="2" class="form-control @error('end_time') is-invalid @enderror" id="end_time" name="end_time"
                value="{{ old('end_time') }}" >
            @error('end_time')
                <div class ="alert alert-danger">{{$errors->first('end_time')}}</div>
            @enderror  
        </div> 
        <div class="mb-3">
            <button type="submit" class="btn btn-primary text-white">Create</button>
            <button type="reset"  class="btn btn-danger mx-4">Reset</button>
        </div>
    </form>
</div> 

@endsection