<?php

namespace App\Models;

use App\Models\Plate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Many to many relation to plate
    public function plates() {
        return $this->belongsToMany(Plate::class);
    }
}
