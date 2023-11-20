<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Mail\NewOrder;
use App\Mail\NewOrderReceived;
use App\Models\Order;
use App\Models\Plate;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
     // store order data in db
    public function store(StoreOrderRequest $request){
        $data = $request->validated();

        $newOrder = new Order();
        $newOrder->customer_name = $data["customer_name"];
        $newOrder->customer_lastname = $data["customer_lastname"];
        $newOrder->customer_email = $data["customer_email"];
        $newOrder->customer_address = $data["customer_address"];
        $newOrder->customer_phone = $data["customer_phone"];
        $newOrder->amount_paid = $data["amount_paid"];
        $newOrder->save();

        foreach ($data["cart"] as $item) {
            $plate = Plate::find($item['id']); //find ID
    
            // link plate to order with quantity
            $newOrder->plates()->attach($plate, ['quantity' => $item['quantity']]);
        }
        
        
        Mail::to($data['customer_email'])->send(new NewOrder($data));//send email to customer
        //Log::info($newOrderInstance);

        $restaurantId = $data["cart"][0]["restaurant_id"]; // take restaurant id

        $userEmail = Restaurant::where('restaurants.id', $restaurantId) //take userEmail
            ->join('users', 'restaurants.user_id', '=', 'users.id')
            ->value('users.email');
        Mail::to($userEmail)->send(new NewOrderReceived($data)); //send email to user when order is paid

        return response()->json();
    }
}
