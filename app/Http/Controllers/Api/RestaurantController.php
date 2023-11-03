<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;
use Illuminate\Support\Facades\Log;

class RestaurantController extends Controller
{
    public function index(Request $request) {
        $cuisines = $request->all();
        
        if(count($cuisines) <= 0) {
            $restaurants = Restaurant::with("cuisines")->get();

            return response()->json($restaurants);
        }
        else {  
            $query = Restaurant::select('restaurants.*');

            $aliasCounter = 1;

            foreach ($cuisines as $cuisine) {
                $cAlias = 'c' . $aliasCounter;
                $crAlias = 'cr'. $aliasCounter;
 
                $query->join("cuisine_restaurant as $crAlias", 'restaurants.id', '=', "$crAlias.restaurant_id")
                    ->join("cuisines as $cAlias", function ($join) use ($cuisine, $cAlias, $crAlias) {
                        $join->on("$crAlias.cuisine_id", '=', "$cAlias.id")
                            ->where("$cAlias.cuisine_name", '=', $cuisine);
                });

                $aliasCounter++;
            }
    
            $restaurants = $query->distinct()->with('cuisines')->get();     
            
            return response()->json($restaurants);
        }   
    }
}