@extends("layouts.app")

@section("content")
    <div class="container">
        <h3>{{ $plates->name }}</h3>
        <img src="{{ asset('storage/' . $plates->image) }}" alt="">
        <p>{{ $plates->price }} € </p>
        <p>{{ $plates->ingredients }}</p>
        <p>{{ $plates->description }}</p>
        <button type="button" class="btn btn-warning btn-aggiungi mb-3"><a href="{{ route('admin.plates.edit', $plates->id) }}">Modifica</a></button>

        <form action="{{ route('admin.plates.destroy', $plates->slug) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Elimina</button>
        </form>
    </div>
@endsection