@extends('layouts.app')
@section('content')

<div class="py-5">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="fw-bold">Ordini</h1>
    </div>

    @if ($orders->isEmpty())
        <div class="d-flex align-items-center justify-content-center">
            <div class="alert border border-white text-center m-0" role="alert">
                nessun ordine!
            </div>
        </div>
    @else
    <div class="container">
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
                            <td class="d-table-cell"><a class="btn btn-primary" href="{{route('admin.orders.show', $item->id)}}">Piatti</a></td>
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