@extends('layouts.admin')
@section('title', 'Movies')

@section('content')
<div class="container m-auto ">

<div class="d-flex justify-content-end my-3">

    <button class="btn btn-primary"><a href="{{ route('admin.movies.create') }}" class="text-white">Create new movie</a></button>

</div>

<table class="table table-dark table-striped ">
    <thead>
        <tr>
            <th>Titolo</th>
            <th>Titolo Originale</th>
            <th>Trama</th>
            <th>Copertina</th>
            <th>Data di uscita</th>
            <th>Trailer</th>
            <th>Lingua</th>
            <th>Durata</th>
            <th>Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($movies as $movie)
        <tr>
            <td>{{ $movie->title }}</td>
            <td>{{ $movie->original_title }}</td>
            <td>{{ $movie->overview }}</td>
            <td>{{ $movie->cover_image }}</td>
            <td>{{ $movie->release_date }}</td>
            <td>{{ $movie->trailer }}</td>
            <td>{{ $movie->language }}</td>
            <td>{{ $movie->duration }}</td>
            <td>
                <a href="{{ route('admin.movies.show', $movie->id) }}" title="Visualizza"><i class="fa-solid fa-eye"></i></a>
                <a href="{{ route('admin.movies.edit', $movie->id) }}" title="Modifica"><i class="fa-solid fa-pen"></i></a>
                <form action="{{route('admin.movies.destroy', $movie->id)}}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button border-0 bg-transparent" title="Elimina" 
                    data-item-title="{{ $movie->title }}" >
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