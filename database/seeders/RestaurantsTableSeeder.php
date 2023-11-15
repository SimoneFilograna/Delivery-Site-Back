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
            "restaurant_address" => "Via ponticello, 79",
            "restaurant_image" => "restaurants/indian-family.jpg",
            "restaurant_phone" => "02 2392940",
            "vat_number" => "23457129499",
            "user_id" => 4,
            "cuisines" => ["Indiano"]
        ],       
        [
            "restaurant_name" => "Angus Lovers - Pasion",
            "restaurant_address" => "Via ponticello, 80",
            "restaurant_image" => "restaurants/argentin-restaurant-logo.jpg",
            "restaurant_phone" => "02 5566753",
            "vat_number" => "23112494991",
            "user_id" => 5,
            "cuisines" => ["Argentino", "Cubano"]
        ],
        [
            "restaurant_name" => "Colpo Grosso al drago rosso",
            "restaurant_address" => "Via ponticello, 78",
            "restaurant_image" => "restaurants/chinese-restaurant-logo.jpg",
            "restaurant_phone" => "02 5566340",
            "vat_number" => "23485494991",
            "user_id" => 7,
            "cuisines" => ["Cinese", "Vietnamita"]
        ],  
        [
            "restaurant_name" => "La Rica",
            "restaurant_address" => "Via argentera, 80",
            "restaurant_image" => "restaurants/la_rica.png",
            "restaurant_phone" => "02 4886753",
            "vat_number" => "23235494991",
            "user_id" => 8,
            "cuisines" => ["Spagnolo", "Fritto", "Messicano", "Griglia"]
        ],  
        [
            "restaurant_name" => "Turkish Kebap",
            "restaurant_address" => "Via argentera, 80",
            "restaurant_image" => "restaurants/kebap.jpg",
            "restaurant_phone" => "02 4886753",
            "vat_number" => "23335494997",
            "user_id" => 9,
            "cuisines" => ["Turco", "Kebap", "Burger"]
        ],    
        [
            "restaurant_name" => "Howrang's",
            "restaurant_address" => "Via Corallo, 10",
            "restaurant_image" => "restaurants/corean.png",
            "restaurant_phone" => "02 4884633",
            "vat_number" => "11035494997",
            "user_id" => 10,
            "cuisines" => ["Thailandese", "Coreano"]
        ],    
        [
            "restaurant_name" => "Confusi's",
            "restaurant_address" => "Via indeterminata, 10",
            "restaurant_image" => "restaurants/confusi.webp",
            "restaurant_phone" => "00 00000001",
            "vat_number" => "10000000007",
            "user_id" => 11,
            "cuisines" => ["Brasiliano", "Greco", "Griglia","Kebap"]
        ], 
            
        [
            "restaurant_name" => "Gabbo",
            "restaurant_address" => "Via dei pazi, 9",
            "restaurant_image" => "restaurants/pacos.png",
            "restaurant_phone" => "27 40558001",
            "vat_number" => "10805008107",
            "user_id" => 6,
            "cuisines" => ["Messicano", "Spagnolo", "Cubano"]
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
