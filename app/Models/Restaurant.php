<?php

namespace App\Models;

use App\Models\User;
use App\Models\Cuisine;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function cuisines() {
        return $this->belongsToMany(Cuisine::class);
    }
}
