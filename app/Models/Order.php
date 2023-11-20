<?php

namespace App\Models;

use App\Models\Restaurant;
use App\Models\Plate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "customer_name",
        "customer_lastname",
        "customer_email",
        "customer_address",
        "customer_phone",
        "amount_paid",
    ];

    // Many to many relation to plate
    public function plates() {
        return $this->belongsToMany(Plate::class);
    }

}
