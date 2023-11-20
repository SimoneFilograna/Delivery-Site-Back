<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cuisine;
use Illuminate\Http\Request;

class CuisineController extends Controller
{
    public function index() {
        $cuisines = Cuisine::all(); 

        return response()->json($cuisines);
    }
}
