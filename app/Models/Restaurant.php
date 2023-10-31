<?php

namespace App\Models;

use App\Models\User;
use App\Models\Plate;
use App\Models\Cuisine;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    // One to one relation to User
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Many to many relation to cuisines
    public function cuisines() {
        return $this->belongsToMany(Cuisine::class);
    }

    // One to many relation to plates
    public function plates() {
        return $this->hasMany(Plate::class);
    }
}
