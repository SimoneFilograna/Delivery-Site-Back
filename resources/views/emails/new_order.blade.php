<x-mail::message>

# Conferma Nuovo Ordine

Grazie per il tuo ordine!

Piatti ordinati:
@foreach ($dataToSend["cart"] as $item)
- {{ $item['quantity'] }} x {{ $item['plate_name'] }} 
@endforeach
    
</x-mail::message>
