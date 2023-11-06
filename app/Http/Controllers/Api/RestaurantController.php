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
        //take cuisines data from HTTP request
        $cuisines = $request->all();
        
        //check if there is any cuisines coming from HTTP request 
        if(count($cuisines) <= 0) {
            //get all restaurants from DB
            $restaurants = Restaurant::with("cuisines")->get();

            //return JSON of them to frontend
            return response()->json($restaurants);
        }
        else {  
            //select of right model
            $query = Restaurant::select('restaurants.*');

            //alias counter used in the foreach query
            $aliasCounter = 1;

            //loop on every cuisine selected by Client frontend
            foreach ($cuisines as $cuisine) {
                //aliases changes for every iteration
                $cAlias = 'c' . $aliasCounter;
                $crAlias = 'cr'. $aliasCounter;
 
                //query for retriving the restaurants with the different cuisine selected
                $query->join("cuisine_restaurant as $crAlias", 'restaurants.id', '=', "$crAlias.restaurant_id")
                    ->join("cuisines as $cAlias", function ($join) use ($cuisine, $cAlias, $crAlias) {
                        $join->on("$crAlias.cuisine_id", '=', "$cAlias.id")
                            ->where("$cAlias.cuisine_name", '=', $cuisine);
                });

                //counter add every iteration
                $aliasCounter++;
            }
    
            //clean the results of the query of duplicates and save them
            $restaurants = $query->distinct()->with('cuisines')->get();     
            
            //return JSON of them to frontend
            return response()->json($restaurants);
        }   
    }

    public function show($id){
        //use id for trace correct restaurant
        $restaurant= Restaurant::where("id", $id)
        ->with("cuisines", "user")
        ->firstOrFail();

        //add error when restaurant is not present
        if(!$restaurant) {
            abort(404);
        }
    }
}