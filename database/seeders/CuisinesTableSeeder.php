<?php

namespace Database\Seeders;

use App\Models\Cuisine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CuisinesTableSeeder extends Seeder
{
    // create cuisines list
    private $cuisines = [
        "Italiano",
        "Brasiliano",
        "Thailandese",
        "Messicano",
        "Giapponese",
        "Indiano",
        "Cinese",
        "Greco",
        "Coreano",
        "Pizza",
        "Spagnolo",
        "Turco",
        "Vietnamita",
        "Kebap",
        "Burger",
        "Fritto",
        "Argentino",
        "Cubano",
        "Griglia"
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // cycle and save on database
        foreach ($this->cuisines as $cuisine) {
            $newCuisine = new Cuisine();
            $newCuisine->cuisine_name = $cuisine;
            $newCuisine->save();
        }
    }
}
