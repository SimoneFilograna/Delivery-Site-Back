@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        @include('partials.errors')

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="login-box w-100">
                    <p>{{ __('Registrazione') }}</p>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4 user-box">
                            <label for="name" class="col-form-label text-md-right">{{ __('Nome *') }}</label>

                            <div class="col">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
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
                                    class="form-control @error('email') is-invalid @enderror" name="email"
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
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
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
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mb-4 user-box">
                            <label for="name"
                                class="col-form-label text-md-right">{{ __('Nome del Ristorante *') }}</label>

                            <div class="col">
                                <input id="restaurant_name" type="text"
                                    class="form-control @error('restaurant_name') is-invalid @enderror" name="restaurant_name"
                                    value="{{ old("restaurant_name") }}" required maxlength="100">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 user-box">
                            <label for="address" class="col-form-label text-md-right">{{ __('Indirizzo *') }}</label>

                            <div class="col">
                                <input id="address" type="text"
                                    class="form-control @error('address') is-invalid @enderror" name="address"
                                    value="{{ old('address') }}" required maxlength="255">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 user-box">
                            <label for="name" class="col-form-label text-md-right">{{ __('Numero telefonico *') }}</label>

                            <div class="col">
                                <input id="phone" type="text"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    value="{{ old('phone') }}" required autocomplete="phone">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="col-form-label text-md-right">{{ __('Logo Ristorante') }}</label>
                            <input type="file" name="image"
                                class="form-control  @error('image') is-invalid @enderror" id="image"
                                aria-describedby="imageHelp" value="{{ old('image') }}" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4 user-box">
                            <label for="vat_number" class="col-form-label text-md-right">{{ __('P-IVA *') }}</label>

                            <div class="col">
                                <input id="vat_number" type="text"
                                    class="form-control @error('vat_number') is-invalid @enderror" name="vat_number"
                                    value="{{ old('vat_number') }}" required maxlength="11" minlength="11">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 user-box">
                            <label for="types" class="col-form-label text-md-right">{{ __('Seleziona una o più tipi di cucina *') }}</label>
                        
                            <div class="col">
                                @forelse ($cuisines as $cuisine)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="cuisines[]" id="type{{ $cuisine->id }}" value="{{ $cuisine->id }}" {{ in_array($cuisine->id, old('cuisines', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="type{{ $cuisine->id }}">{{ $cuisine->name }}</label>
                                    </div>
                                @empty
                                    <p>Nessun tipo registrato</p>
                                @endforelse
                            </div>
                        </div>

                        <div class="mb-4 mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrati') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection