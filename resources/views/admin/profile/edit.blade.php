@extends('layouts.app')
@section('content')

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
        z-index: 0; /* Assicura che il contenuto sia sovrapposto all'immagine di sfondo */
        position: relative;
    }

    .card {
        background: rgba(255, 255, 255, 0.8); /* Aggiungi uno sfondo semi-trasparente alla card per rendere il testo più leggibile */
    }
</style>

<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Profile') }}
    </h2>
    <div class="card p-4 mb-4 bg-white shadow rounded-lg">

        @include('admin.profile.partials.update-profile-information-form')

    </div>

    <div class="card p-4 mb-4 bg-white shadow rounded-lg">


        @include('admin.profile.partials.update-password-form')

    </div>

    <div class="card p-4 mb-4 bg-white shadow rounded-lg">


        @include('admin.profile.partials.delete-user-form')

    </div>
</div>

@endsection
