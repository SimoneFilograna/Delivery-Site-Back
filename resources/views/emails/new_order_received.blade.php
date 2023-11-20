<x-mail::message>

# Conferma Nuovo Ordine

L'utente {{ $dataToSend["customer_name"] }} {{ $dataToSend["customer_lastname"] }} ha fatto un ordine!
- Indirizzo: {{ $dataToSend["customer_address"] }}
- Telefono: {{ $dataToSend["customer_phone"] }}

Piatti ordinati:
@foreach ($dataToSend["cart"] as $item)
- {{ $item['quantity'] }} x {{ $item['plate_name'] }} 
@endforeach
</x-mail::message>

