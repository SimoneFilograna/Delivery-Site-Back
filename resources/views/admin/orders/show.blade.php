@extends('layouts.app')
@section('content')
<h3 class="my-3">Informazioni ordine</h3>
<div class="container">
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
<div>
    <span class="fw-bold">Totale:</span> {{ $order->amount_paid}} &euro;
</div>
@endsection