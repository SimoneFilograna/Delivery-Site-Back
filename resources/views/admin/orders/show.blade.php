@extends('layouts.app')
@section('content')
<style>
    body {
        background-image: url('/img/13.jpg'); /* Sostituisci 'path/to/your/image.jpg' con il percorso dell'immagine */
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

<div class="container">
    <h1 class="my-3 gold-text">Informazioni ordine</h1>
    <div class="table-responsive">
        <table class="table table-bordered" id="orders-table">
            <thead>
                <tr class="fw-bold">
                    <th>Nome del piatto</th>
                    <th>Q.ta</th>
                    <th class="d-none d-md-table-cell">Prezzo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plates as $plate)
                    <tr>
                        <td>{{$plate->plate_name}}</td>
                        <td class="d-none d-md-table-cell">{{$plate->quantity}}</td>
                        <td>{{$plate->price}} &euro;</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<div class="gold-text">
    <span class="fw-bold gold-text">Totale:</span> {{ $order->amount_paid}} &euro;
</div>
@endsection