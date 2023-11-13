<?php

namespace Database\Seeders;

use App\Models\Cuisine;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantsTableSeeder extends Seeder
{
    // create restaurant list
    private $restaurantsList = [
        [
            "restaurant_name" => "Tokyo Fire",
            "restaurant_address" => "Via Brombeis, 2",
            "restaurant_image" => "restaurants/tokyo-fire.jpg",
            "restaurant_phone" => "02 1234567",
            "vat_number" => "12345678901",
            "user_id" => 1,
            "cuisines" => ["Giapponese", "Cinese"]
        ],
        [
            "restaurant_name" => "Mexico Loco",
            "restaurant_address" => "Via lauridis, 23",
            "restaurant_image" => "restaurants/mexico-loco.jpg",
            "restaurant_phone" => "02 4592347",
            "vat_number" => "73497120482",
            "user_id" => 2,
            "cuisines" => ["Messicano"]
        ],
        [
            "restaurant_name" => "Pizza Party",
            "restaurant_address" => "Via Pompadur, 43",
            "restaurant_image" => "restaurants/pizza-partyg.jpg",
            "restaurant_phone" => "02 7284565",
            "vat_number" => "71492120588",
            "user_id" => 3,
            "cuisines" => ["Italiano", "Pizza"]
        ],
        [
            "restaurant_name" => "Indian Family",
            "restaurant_address" => "Via ponticello, 78",
            "restaurant_image" => "restaurants/indian-family.jpg",
            "restaurant_phone" => "02 2392940",
            "vat_number" => "23457129499",
            "user_id" => 4,
            "cuisines" => ["Indiano"]
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {      
        // cycle and save in database
        foreach ($this->restaurantsList as $restaurant) {
            $newRestaurant = new Restaurant();
            $newRestaurant->restaurant_name = $restaurant["restaurant_name"];
            $newRestaurant->restaurant_address = $restaurant["restaurant_address"];
            $newRestaurant->restaurant_image = "/{$restaurant['restaurant_image']}";
            $newRestaurant->restaurant_phone = $restaurant["restaurant_phone"];
            $newRestaurant->vat_number = $restaurant["vat_number"];          
            $newRestaurant->user_id = $restaurant["user_id"];

            $newRestaurant->save();

            if (isset($restaurant['cuisines'])) {
                $cuisines = Cuisine::whereIn('cuisine_name', $restaurant['cuisines'])->get();
                $newRestaurant->cuisines()->attach($cuisines->pluck('id')->toArray());
            }
        }
    }
}
