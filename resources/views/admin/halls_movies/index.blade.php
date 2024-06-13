@extends('layouts.admin')
@section('title', 'halls_movies')

@section('content')
<div class="container m-4 m-auto" id="halls_table">

<div class="d-flex justify-content-end my-3">

    <button class="btn btn-primary"><a href="{{ route('admin.halls_movies.create') }}" class="text-white">Create new halls_movies</a></button>

</div>

<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>Movie</th>
            <th>Hall</th>
            <th>Time Slot</th>
            <th>Data</th>
            <th>price_ticket</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($halls_movies as $hall_movie)
        <tr>
            <td>{{ $hall_movie->movie_id}}</td>
            <td>{{ $hall_movie->hall_id}}</td>
            <td>{{ $hall_movie->time_slot_id}}</td>
            <td>{{ $hall_movie->date}}</td>
            <td>{{ $hall_movie->price_ticket}}</td>

            <td>
                <a href="{{ route('admin.halls_movies.show', $hall_movie->id) }}" title="Visualizza"><i class="fa-solid fa-eye"></i></a>
                <a href="{{ route('admin.halls_movies.edit', $hall_movie->id) }}" title="Modifica"><i class="fa-solid fa-pen"></i></a>
                <form action="{{route('admin.halls_movies.destroy', $hall_movie->id)}}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button border-0 bg-transparent" title="Elimina" 
                    data-item-title="{{ $hall_movie->movie_id }}" >
                      <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
</div>
@include('partials.modal-delete')
@endsection