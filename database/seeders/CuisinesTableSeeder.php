<?php

namespace Database\Seeders;

use App\Models\Cuisine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CuisinesTableSeeder extends Seeder
{

    private $cuisines = [
        "Italiana",
        "Brasiliana",
        "Thailandese",
        "Messicana",
        "Giapponese",
        "Indiana",
        "Cinese",
        "Greca",
        "Coreana",
        "Marocchina",
        "Pizza"
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->cuisines as $cuisine) {
            $newCuisine = new Cuisine();
            $newCuisine->name = $cuisine;
            $newCuisine->save();
        }
    }
}
