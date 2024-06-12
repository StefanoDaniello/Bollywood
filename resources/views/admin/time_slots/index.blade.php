@extends('layouts.admin')
@section('title', 'time_slots')

@section('content')
<div class="container m-4 m-auto" id="halls_table">

<div class="d-flex justify-content-end my-3">

    <button class="btn btn-primary"><a href="{{ route('admin.time_slots.create') }}" class="text-white">Create new time_slots</a></button>

</div>

<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>Autore</th>
            <th>Contenuto</th>
            <th>Voto</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($time_slots as $time_slots)
        <tr>
            <td>{{ $time_slots->name }}</td>
            <td>{{ $time_slots->start_time }}</td>
            <td>{{ $time_slots->end_time }}</td>
            <td>
                <a href="{{ route('admin.time_slots.show', $time_slots->id) }}" title="Visualizza"><i class="fa-solid fa-eye"></i></a>
                <a href="{{ route('admin.time_slots.edit', $time_slots->id) }}" title="Modifica"><i class="fa-solid fa-pen"></i></a>
                <form action="{{route('admin.time_slots.destroy', $time_slots->id)}}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button border-0 bg-transparent" title="Elimina" 
                    data-item-title="{{ $time_slots->author }}" >
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


