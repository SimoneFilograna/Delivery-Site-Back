@extends('layouts.app')

@section("content")
<style>
    body {
        background-image: url('/img/4.jpg'); /* Sostituisci 'path/to/your/image.jpg' con il percorso dell'immagine */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        height: 100vh; /* Imposta l'altezza al 100% della viewport */
        margin: 0; /* Rimuovi il margine per evitare spazi bianchi attorno all'immagine */
    }

    .container {
        z-index: 1; /* Assicura che il contenuto sia sovrapposto all'immagine di sfondo */
        position: relative;
    }

    .card {
        background: rgba(255, 255, 255, 0.8); /* Aggiungi uno sfondo semi-trasparente alla card per rendere il testo più leggibile */
    }
</style>

<div class="container gold-text">
    <div class="row justify-content-end">
        <h1 class="py-2 text-end">Aggiungi un piatto al menu!</h1>
        <div class="card col-md-5 mb-5" style="background-color: transparent;">
            <div class="login-box w-100 gold-text card-body login-body">
                <form id="create-plate" action="{{ route('admin.plates.store') }}" method="POST" enctype="multipart/form-data" id="form">
                    @csrf()

                    <div class="alert alert-danger d-none" id="error">
                        <p id="error-message"></p>
                    </div>

                    {{-- name --}}
                    <div class="mb-3">
                        <label class="form-label">Nome Piatto*</label>
                        <input id="plate_name" type="text" class="form-control form-control-sm" name="plate_name" value="{{ old('plate_name') }}">
                        @error('plate_name')
                            <div class="alert mt-2 alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- image --}}
                    <div class="mb-3">
                        <label class="form-label">Immagine*</label>
                        <input type="file" accept="image/*" class="form-control form-control-sm @error('plate_image') is-invalid @enderror" name="plate_image">
                        @error('plate_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- ingredients --}}
                    <div class="mb-3">
                        <label class="form-label">Ingredienti*</label>
                        <input id="ingredients" type="text" class="form-control form-control-sm @error('ingredients') is-invalid @enderror" name="ingredients" value="{{ old('ingredients') }}">
                        @error('ingredients')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- price --}}
                    <div class="mb-3">
                        <label class="form-label">Prezzo*</label>
                        <input id="price" type="number" step="0.01" class="form-control form-control-sm @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}">
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            const priceInput = document.getElementById("price");

                            priceInput.addEventListener("keydown", function (event) {
                                // Prevent entering negative values
                                if (event.key === "-" || event.key === "e") {
                                    event.preventDefault();
                                }
                            });

                            priceInput.addEventListener("input", function () {
                                // Prevent negative values in the price field
                                if (parseFloat(this.value) < 0) {
                                    this.value = 0;
                                }
                            });
                        });
                    </script>

                    {{-- description --}}
                    <div class="mb-3">
                        <label class="form-label @error('description') is-invalid @enderror">Descrizione*</label>
                        <textarea id="description" class="form-control" name="description">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- visibility --}}
                    <div class="mb-3">
                        <label class="form-label">Visibilità:</label>
                        <div class="form-check">
                            <input class="form-check-input" value="1" type="radio" name="visibility" id="flexRadioDefault1">
                            <label class="form-check-label" for="visibility1">Si</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" value="0" type="radio" name="visibility" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="visibility2">No</label>
                        </div>
                    </div>

                    <div class="mb-3 d-flex gap-3">
                        <button id="btn-submit-plate-create" class="btn my-button signin">Crea</button>
                        <a class="btn my-button-secondary" href="{{ route("admin.plates.index") }}">Annulla</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


