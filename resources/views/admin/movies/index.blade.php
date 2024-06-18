@extends('layouts.admin')
@section('title', 'Movies')

@section('content')
<div class="container m-auto ">

    <div class="my-3" id="create_movie">
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
                <th class="px-3">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
            <tr>
                <td>{{ str_limit($movie->title, 10) }}</td>
                <td>{{ str_limit($movie->original_title, 10) }}</td>
                <td>{{ str_limit($movie->overview, 20) }}</td>
                <td>{{ $movie->cover_image }}</td>
                <td>{{ $movie->release_date }}</td>
                <td>{{ $movie->trailer }}</td>
                <td>{{ $movie->language }}</td>
                <td>{{ $movie->duration }}</td>
                <td class="actions d-flex">
                    <a href="{{ route('admin.movies.show', $movie->id) }}" title="Visualizza"><i class="fa-solid fa-eye "></i></a>
                    <a href="{{ route('admin.movies.edit', $movie->id) }}" title="Modifica"><i class="fa-solid fa-pen mx-2"></i></a>
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
@php
function str_limit($value, $limit = 100, $end = '...')
{
    if (mb_strwidth($value, 'UTF-8') <= $limit) {
        return $value;
    }
    return rtrim(mb_strimwidth($value, 0, $limit, '', 'UTF-8')).$end;
}

@endphp
<style lang="scss" scoped>
    #create_movie {
        text-align: right;
    }
    .actions{
        padding: 20px 15px !important;
    }
                  
</style>