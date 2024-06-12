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
            <th>Nome</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($time_slots as $time_slot)
        <tr>
            <td>{{ $time_slot->name }}</td>
            <td>{{ $time_slot->start_time }}</td>
            <td>{{ $time_slot->end_time }}</td>
            <td>
                <a href="{{ route('admin.time_slots.show', $time_slot->id) }}" title="Visualizza"><i class="fa-solid fa-eye"></i></a>
                <a href="{{ route('admin.time_slots.edit', $time_slot->id) }}" title="Modifica"><i class="fa-solid fa-pen"></i></a>
                <form action="{{route('admin.time_slots.destroy', $time_slot->id)}}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button border-0 bg-transparent" title="Elimina" 
                    data-item-title="{{ $time_slot->author }}" >
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