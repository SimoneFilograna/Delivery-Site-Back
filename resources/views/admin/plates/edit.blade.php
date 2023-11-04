@extends('layouts.app')

@section("content")

<div class="container">
    <h1>Modifica Piatto</h1>

    <form id="edit-plate" action="{{ route('admin.plates.update', $plate->id) }}" method="POST" enctype="multipart/form-data" id="form">
        @csrf()
        @method('put')

        <div class="alert alert-danger d-none" id="error">
            <p id="error-message"></p>
        </div>

        {{-- name --}}
        <div class="mb-3">
            <label class="form-label">Nome Piatto</label><input type="text" class="form-control @error('plate_name') is-invalid @enderror" name="plate_name" value="{{ old('plate_name', $plate->plate_name) }}">
            @error('plate_name')
                    <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- image --}}
        <div class="mb-3">
            <label class="form-label">Immagine</label><input type="file" accept="image/*" class="form-control @error('plate_image') is-invalid @enderror" name="plate_image">
            @error('plate_image')
                    <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- ingredients --}}
        <div class="mb-3">
            <label class="form-label">Ingredienti</label><input type="text" class="form-control @error('ingredients') is-invalid @enderror" name="ingredients" value="{{ old('ingredients', $plate->ingredients) }}">
            @error('ingredients')
                    <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- price --}}
        <div class="mb-3">
            <label class="form-label">Prezzo</label><input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $plate->price) }}">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- description --}}
        <div class="mb-3">
            <label class="form-label @error('description') is-invalid @enderror">Description</label>
                <textarea class="form-control" name="description">{{ old('description', $plate->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
        </div>

        {{-- visibility --}}
        Visibilità:
        <div class="form-check">
            <input class="form-check-input" value="1" type="radio" name="visibility" id="flexRadioDefault1">
            <label class="form-check-label" for="visibility">
                Si
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" value="0" type="radio" name="visibility" id="flexRadioDefault2" checked>
            <label class="form-check-label" for="visibility">
                No
            </label>
        </div>
        
        <a class="btn btn-secondary" href="{{ route("admin.plates.index") }}">Annulla</a>
        <button id="btn-submit-plate-edit" class="btn btn-primary signin">Aggiorna</button>
    </form>
</div>

@endsection