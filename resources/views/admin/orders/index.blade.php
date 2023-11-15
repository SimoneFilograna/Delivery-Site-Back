@extends('layouts.app')
@section('content')
<style>
    body {
        background-image: url('/img/14.jpg'); /* Sostituisci 'path/to/your/image.jpg' con il percorso dell'immagine */
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

<div class="py-5">

    @if ($orders->isEmpty())
        <div class="d-flex align-items-center justify-content-center">
            <div class="alert border border-white text-center m-0 gold-text" role="alert">
                nessun ordine!
            </div>
        </div>
    @else
    <div class="container">
        <div class="d-flex justify-content-between align-items-center gold-text mb-3">
            <h1 class="fw-bold">Ordini</h1>
        </div>
        <p class="text-white">Controlla gli ordini ricevuti in tabella. Puoi filtrarli usando freccette e barra di ricerca.</p>
        <div class="table-responsive">
            <table class="table table-bordered" id="orders-table">
                <thead>
                    <tr class="fw-bold">
                        <th>Cliente</th>
                        <th class="d-none d-md-table-cell">Indirizzo</th>
                        <th>Totale ordine</th>
                        <th class="d-none d-md-table-cell">Data ordine</th>
                        <th>Telefono</th>
                        <th class="d-none d-md-table-cell">Mail</th>
                        <th class="d-table-cell">Dettagli</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                        <tr>
                            <td>{{$item->customer_name}} {{$item->customer_lastname}}</td>
                            <td class="d-none d-md-table-cell">{{$item->customer_address}}</td>
                            <td>{{$item->amount_paid}} &euro;</td>
                            <td class="d-none d-md-table-cell">{{$item->created_at}}</td>
                            <td>{{$item->customer_phone}}</td>
                            <td class="d-none d-md-table-cell">{{$item->customer_email}}</td>
                            <td class="d-table-cell"><a class="btn my-button-small" href="{{route('admin.orders.show', $item->id)}}">Piatti</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <script>
            $(document).ready(function () {
                // Ordina la tabella per data ordine in senso decrescente
                $('#orders-table').DataTable({
                    order: [[3, 'desc']]
                });
            });
        </script>

        
    @endif
</div> 
    </div>
        
@endsection