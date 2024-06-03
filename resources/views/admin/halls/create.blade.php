@extends('layouts.admin')
@section('title', 'Halls')

@section('content')   
    <h1>Create</h1>
    <form action="{{route('admin.halls.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name') }}" >
            {{-- @if($errors->has('name'))
                <div class ="alert alert-danger">{{$errors->first('name')}}</div>
            @endif  --}}
            {{-- <div id="nameHelp" class="form-text text-white">Inserire minimo 3 caratteri e massimo 200</div> --}}
        </div>
        <div class="mb-3">
            <label for="color" class="form-label">color</label>
            <input type="text" class="form-control @error('color') is-invalid @enderror" id="color"
                name="color" value="{{ old('color') }}">
                {{-- @if($errors->has('color'))
                    <div class ="alert alert-danger">{{$errors->first('color')}}</div>
                @endif  --}}
        </div>
        <div class="mb-3">
            <label for="seats_num" class="form-label">seats_num</label>
            <input type="number" class="form-control @error('seats_num') is-invalid @enderror" id="seats_num"
                name="seats_num" value="{{ old('seats_num') }}">
            {{-- @if($errors->has('seats_num'))
                <div class ="alert alert-danger">{{$errors->first('seats_num')}}</div>
            @endif --}}
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
            <label for="base_price" class="form-label">base_price</label>
            <input type="number" min="1" step="any" id="base_price" name="base_price" value="{{ old('base_price') }}"/>
        </div>
        
        {{-- BOTTONI --}}
        <div class="mb-3">
            <button type="submit" class="btn btn-primary text-white">Create</button>
            <button type="reset"  class="btn btn-danger mx-4">Exit</button>

        </div>
        
    </form>
@endsection