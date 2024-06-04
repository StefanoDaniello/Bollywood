@extends('layouts.admin')
@section('title', 'Halls')

@section('content')   
<div class="d-flex align-items-center">
    <a href="{{ route('admin.halls.index') }}" class="btn btn-primary "><i><i class="fa-solid fa-arrow-left"></i></a>
    <h1 class="mx-3">Create</h1>
</div>
    <form action="{{route('admin.halls.store')}}" method="POST" enctype="multipart/form-data">
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
            <label for="color" class="form-label">color</label>
            <input type="text" class="form-control @error('color') is-invalid @enderror" id="color"
                name="color" value="{{ old('color') }}">
               @error('color')
                    <div class ="alert alert-danger">{{$errors->first('color')}}</div>
                @enderror  
        </div>
        <div class="mb-3">
            <label for="seats_num" class="form-label">seats_num</label>
            <input type="number" class="form-control @error('seats_num') is-invalid @enderror" id="seats_num"
                name="seats_num" value="{{ old('seats_num') }}">
           @error('seats_num')
                <div class ="alert alert-danger">{{$errors->first('seats_num')}}</div>
            @enderror 
        </div>
        <div class="mb-3">
            <div>
                iSense technology?
            </div>
            <label for="isense" class="form-label">Yes</label>
            <input type="checkbox" id="isense" name="isense" value="1" />
            <label for="isense" class="form-label">No</label>
            <input type="checkbox" id="isense" name="isense" value="0" checked />
        </div>
        <div class="mb-3">
            <div class="mb-3">
                <div>
                    Available?
                </div>
                <label for="isense" class="form-label">Yes</label>
                <input type="checkbox" id="isense" name="isense" value="1" checked/>
                <label for="isense" class="form-label">No</label>
                <input type="checkbox" id="isense" name="isense" value="0"/>
            </div>
        </div>
        <div class="mb-3">
            <label for="base_price" class="form-label">Base Price</label>
            <input type="number" class="form-control w-25" min="1"  id="base_price" name="base_price" value="{{ old('base_price') }}"/>
            @error('base_price')
                <div class ="alert alert-danger">{{$errors->first('seats_num')}}</div>
            @enderror 
        </div>
        
        <div class="mb-3">
            <button type="submit" class="btn btn-primary text-white">Create</button>
            <button type="reset"  class="btn btn-danger mx-4">Reset</button>

        </div>
        
    </form>
@endsection