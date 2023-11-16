@extends('layouts.app')

@section('content')
<style>
    body {
        background-image: url('/img/2.jpg'); /* Sostituisci 'path/to/your/image.jpg' con il percorso dell'immagine */
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
    <div class="container mt-4">
        <div class="row justify-content-start">
            <div class="col-md-6">
                <div class="card">
                    <div class="login-box w-100 gold-text card-body login-body">
                        <h1 class="card-header gold-text login-head text-center">{{ __('Registrazione Utente') }}</h1>
                        <form id="register-form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="alert alert-danger d-none" id="error">
                                <p id="error-message"></p>
                            </div>

                            <div class="mb-4 user-box">
                                <label for="name" class="col-form-label text-md-right">{{ __('Nome e Cognome *') }}</label>

                                <div class="col">
                                    <input id="name" type="text"
                                        class="form-control form-control-sm @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 user-box">
                                <label for="email" class=" col-form-label text-md-right">{{ __('Indirizzo E-Mail *') }}</label>

                                <div class="col">
                                    <input id="email" type="email"
                                        class="form-control form-control-sm @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 user-box">
                                <label for="password" class="col-form-label text-md-right">{{ __('Password *') }}</label>

                                <div class="col">
                                    <input id="password" type="password"
                                        class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" required
                                        autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 user-box">
                                <label for="password-confirm"
                                    class="col-form-label text-md-right">{{ __('Conferma Password *') }}</label>

                                <div class="col">
                                    <input id="password-confirm" type="password" class="form-control form-control-sm"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <h2 class="card-header gold-text login-head text-center">{{ __('Dati del ristorante') }}</h2>

                            <div class="mb-4 user-box">
                                <label for="name"
                                    class="col-form-label text-md-right">{{ __('Nome del Ristorante *') }}</label>

                                <div class="col">
                                    <input id="restaurant_name" type="text"
                                        class="form-control form-control-sm @error('restaurant_name') is-invalid @enderror" name="restaurant_name"
                                        value="{{ old("restaurant_name") }}" required maxlength="100">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 user-box">
                                <label for="restaurant_address" class="col-form-label text-md-right">{{ __('Indirizzo *') }}</label>

                                <div class="col">
                                    <input id="restaurant_address" type="text"
                                        class="form-control form-control-sm @error('restaurant_address') is-invalid @enderror" name="restaurant_address"
                                        value="{{ old('restaurant_address') }}" required maxlength="255">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 user-box">
                                <label for="restaurant_phone" class="col-form-label text-md-right">{{ __('Numero telefonico *') }}</label>

                                <div class="col">
                                    <input id="restaurant_phone" type="text"
                                        class="form-control form-control-sm @error('restaurant_phone') is-invalid @enderror" name="restaurant_phone"
                                        value="{{ old('restaurant_phone') }}">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="restaurant_image" class="col-form-label text-md-right">{{ __('Logo Ristorante') }}</label>
                                <input type="file" name="restaurant_image"
                                    class="form-control form-control-sm @error('restaurant_image') is-invalid @enderror" id="restaurant_image"
                                    aria-describedby="imageHelp" value="{{ old('restaurant_image') }}" accept="image/*">
                                @error('restaurant_image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-4 user-box">
                                <label for="vat_number" class="col-form-label text-md-right">{{ __('P-IVA *') }}</label>
                                <div class="col">
                                    <input id="vat_number" type="text"
                                        class="form-control form-control-sm @error('vat_number') is-invalid @enderror" name="vat_number"
                                        value="{{ old('vat_number') }}" required maxlength="11" minlength="11">
                                    @error('vat_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 user-box">
                                <label for="types" class="col-form-label text-md-right">{{ __('Seleziona una o più tipi di cucina *') }}</label>
                                <div class="col d-flex gap-3 flex-wrap max-width-400">
                                    @foreach ($cuisines as $cuisine)
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="cuisines[]" id="type{{ $cuisine->id }}" value="{{ $cuisine->id }}" {{ in_array($cuisine->id, old('cuisines', [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="type{{ $cuisine->id }}">{{ $cuisine->cuisine_name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mb-4 mb-0">
                                <div class="col-md-8">
                                    <button id="btn-submit-plate-register" type="submit" class="btn my-button">
                                        {{ __('Registrati') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

