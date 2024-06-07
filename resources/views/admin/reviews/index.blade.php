@extends('layouts.admin')
@section('title', 'Reviews')

@section('content')
<div class="container m-4 m-auto" id="halls_table">

<div class="d-flex justify-content-end my-3">

    <button class="btn btn-primary"><a href="{{ route('admin.reviews.create') }}" class="text-white">Create new review</a></button>

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
        @foreach ($reviews as $review)
        <tr>
            <td>{{ $review->author }}</td>
            <td>{{ $review->content }}</td>
            <td>{{ $review->rating }}</td>
            <td>
                <a href="{{ route('admin.reviews.show', $review->id) }}" title="Visualizza"><i class="fa-solid fa-eye"></i></a>
                <a href="{{ route('admin.reviews.edit', $review->id) }}" title="Modifica"><i class="fa-solid fa-pen"></i></a>
                <form action="{{route('admin.reviews.destroy', $review->id)}}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button border-0 bg-transparent" title="Elimina" 
                    data-item-title="{{ $review->author }}" >
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


