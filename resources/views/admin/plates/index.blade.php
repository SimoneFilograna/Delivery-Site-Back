@extends("layouts.app")

@section("content")
    <div class="container">
        <h3 class="mt-5 mb-3">Piatti</h3>

        <button type="button" class="btn btn-primary btn-aggiungi mb-3"><a href="{{ route('admin.plates.create') }}">Aggiungi</a></button>

        <div class="row">
            @foreach ($plates as $plate)
                <div class="col-4">
                    {{-- <a href="{{ route('admin.plates.show', $plate->id)}}"> --}}
                        <div class="card">
                            <h3>{{ $plate->plate_name }}</h3>
                            <img src={{ asset('storage/' . $plate->plate_image) }} alt="">
                            <p>{{ $plate->price }} € </p>
                            <p>{{ $plate->ingredients }}</p>
                            <p>{{ $plate->description }}</p>
                            <div>
                                <button type="button" class="btn btn-warning btn-aggiungi mb-3"><a href="{{ route('admin.plates.edit', $plate->id) }}">Modifica</a></button>
                            </div>
                            <form action="{{ route('admin.plates.destroy', $plate->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Elimina</button>
                            </form>
                            
                        </div>
                    {{-- </a> --}}
                </div>
            @endforeach

        </div>
    </div>


@endsection