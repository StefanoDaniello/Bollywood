@extends('layouts.admin')
@section('title', 'Halls')

@section('content')
<div class="container m-4 m-auto" id="halls_table">

<div class="d-flex justify-content-end my-3">

    <button class="btn btn-primary"><a href="{{ route('admin.halls.create') }}" class="text-white">Create new hall</a></button>

</div>

<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Colore</th>
            <th>Numero di posti</th>
            <th>Isense</th>
            <th>Disponibilità</th>
            <th>Prezzo base</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($halls as $hall)
        <tr>
            <td>{{ $hall->name }}</td>
            <td>{{ $hall->color }}</td>
            <td>{{ $hall->seats_num }}</td>
            @if ($hall->isense == 1)
                <td>Si</td>
            @else
                <td>No</td>
            @endif
            @if ($hall->availability == 1)
                <td>Disponibile</td>
            @else
                <td>Non Disponibile</td>
            @endif
            <td>{{ $hall->base_price }} €</td>
            <td>
                <a href="{{ route('admin.halls.show', $hall->id) }}" title="Visualizza"><i class="fa-solid fa-eye"></i></a>
                <a href="{{ route('admin.halls.edit', $hall->id) }}" title="Modifica"><i class="fa-solid fa-pen"></i></a>
                <form action="{{route('admin.halls.destroy', $hall->id)}}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button border-0 bg-transparent" title="Elimina" 
                    data-item-title="{{ $hall->name }}" >
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


