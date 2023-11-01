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
            "name" => "Tokyo Fire",
            "address" => "Via Brombeis, 2",
            "image" => "https://www.torinotoday.it/~media/horizontal-hi/46538377512956/umami_ristorante_giapponese_centro_torino-2.jpg",
            "phone" => "02 1234567",
            "vat_number" => "12345678901",
            "user_id" => 1
        ],
        [
            "name" => "Mexico Loco",
            "address" => "Via lauridis, 23",
            "image" => "https://www.viaggiaregratis.eu/wp-content/uploads/2020/11/Cucina-Messicana.jpg",
            "phone" => "02 4592347",
            "vat_number" => "73497120482",
            "user_id" => 2
        ],
        [
            "name" => "Pizza Party",
            "address" => "Via Pompadur, 43",
            "image" => "https://nepomuk.it/wp-content/uploads/2022/02/pizzeria-sterzing.jpg",
            "phone" => "02 7284565",
            "vat_number" => "71492120588",
            "user_id" => 3
        ],
        [
            "name" => "Indian Family",
            "address" => "Via ponticello, 78",
            "image" => "https://media-cdn.tripadvisor.com/media/photo-s/1b/d3/9e/d8/getlstd-property-photo.jpg",
            "phone" => "02 2392940",
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
            $newRestaurant->name = $restaurant["name"];
            $newRestaurant->address = $restaurant["address"];
            $newRestaurant->image = $restaurant["image"];
            $newRestaurant->phone = $restaurant["phone"];
            $newRestaurant->vat_number = $restaurant["vat_number"];          
            $newRestaurant->user_id = $restaurant["user_id"];

            $newRestaurant->save();
        }
    }
}
