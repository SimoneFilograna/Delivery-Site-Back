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
            "restaurant_image" => "https://www.torinotoday.it/~media/horizontal-hi/46538377512956/umami_ristorante_giapponese_centro_torino-2.jpg",
            "restaurant_phone" => "02 1234567",
            "vat_number" => "12345678901",
            "user_id" => 1
        ],
        [
            "restaurant_name" => "Mexico Loco",
            "restaurant_address" => "Via lauridis, 23",
            "restaurant_image" => "https://www.viaggiaregratis.eu/wp-content/uploads/2020/11/Cucina-Messicana.jpg",
            "restaurant_phone" => "02 4592347",
            "vat_number" => "73497120482",
            "user_id" => 2
        ],
        [
            "restaurant_name" => "Pizza Party",
            "restaurant_address" => "Via Pompadur, 43",
            "restaurant_image" => "https://nepomuk.it/wp-content/uploads/2022/02/pizzeria-sterzing.jpg",
            "restaurant_phone" => "02 7284565",
            "vat_number" => "71492120588",
            "user_id" => 3
        ],
        [
            "restaurant_name" => "Indian Family",
            "restaurant_address" => "Via ponticello, 78",
            "restaurant_image" => "https://media-cdn.tripadvisor.com/media/photo-s/1b/d3/9e/d8/getlstd-property-photo.jpg",
            "restaurant_phone" => "02 2392940",
            "vat_number" => "23457129499",
            "user_id" => 4
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
            $newRestaurant->restaurant_image = $restaurant["restaurant_image"];
            $newRestaurant->restaurant_phone = $restaurant["restaurant_phone"];
            $newRestaurant->vat_number = $restaurant["vat_number"];          
            $newRestaurant->user_id = $restaurant["user_id"];

            $newRestaurant->save();
        }
    }
}
