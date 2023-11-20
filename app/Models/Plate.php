<?php

namespace App\Models;

use App\Models\Restaurant;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    use HasFactory;

    protected $fillable = [
        "plate_name",
        "ingredients",
        "plate_image",
        "description",
        "price",
        "visibility",
        "restaurant_id",
    ];

    // One to many relation to restaurant
    public function restaurant() {
        return $this->belongsTo(Restaurant::class);
    }

    // Many to many relation to orders
    public function orders() {
        return $this->belongsToMany(Order::class);
    }
}
