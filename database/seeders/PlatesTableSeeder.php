<?php

namespace Database\Seeders;

use App\Models\Plate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlatesTableSeeder extends Seeder
{
    // create plates list
    private $plates = [

        // japan plates

        [
            "plate_name" => "Sushi assortito",
            "ingredients" => "Riso, pesce crudo, alga nori",
            "description" => "Assortimento di sushi tradizionale giapponese, composto da varietà di pesce crudo su letto di riso.",
            "price" => 15.99,
            "visibility" => 1,
            "restaurant_id" => 1,
            "plate_image" => "plates/sushi.jpg"
        ],
        [
            "plate_name" => "Tempura di verdure",
            "ingredients" => "Verdure varie, pastella leggera",
            "description" => "Verdure fresche immerse in una pastella leggera e croccante, fritte fino alla perfezione.",
            "price" => 10.50,
            "visibility" => 1,
            "restaurant_id" => 1,
            "plate_image" => "plates/tempura.jpg"
        ],
        [
            "plate_name" => "Ramen tradizionale",
            "ingredients" => "Tagliatelle, brodo di carne o pesce, cipolla, uovo, maiale o pollo",
            "description" => "Zuppa giapponese con tagliatelle e una varietà di ingredienti come carne, uovo, cipolla e condimenti.",
            "price" => 12.75,
            "visibility" => 1,
            "restaurant_id" => 1,
            "plate_image" => "plates/ramen.jpg"
        ],

        // mexican plates
        
        [
            "plate_name" => "Tacos al Pastor",
            "ingredients" => "Maiale marinato, ananas, cipolla, coriandolo",
            "description" => "Tortilla di mais farcita con maiale marinato cotto verticalmente, ananas, cipolla e coriandolo.",
            "price" => 9.99,
            "visibility" => 1,
            "restaurant_id" => 2,
            "plate_image" => "plates/tacos.webp"
        ],
        [
            "plate_name" => "Guacamole",
            "ingredients" => "Avocado, cipolla, pomodoro, lime, coriandolo",
            "description" => "Purè di avocado fresco condito con cipolla, pomodoro, lime e coriandolo, servito con totopos.",
            "price" => 7.50,
            "visibility" => 1,
            "restaurant_id" => 2,
            "plate_image" => "plates/guacamole.jpg",
        ],
        [
            "plate_name" => "Enchiladas",
            "ingredients" => "Tortilla di mais, pollo, formaggio, salsa di pomodoro",
            "description" => "Tortilla ripiena di pollo, formaggio e salsa di pomodoro, cotta al forno e servita con contorni.",
            "price" => 11.25,
            "visibility" => 1,
            "restaurant_id" => 2,
            "plate_image" => "plates/tortilla.webp",
        ],

        // pizza plates

        [
            "plate_name" => "Margherita",
            "ingredients" => "Salsa di pomodoro, mozzarella, basilico",
            "description" => "Classica pizza italiana con salsa di pomodoro, mozzarella di bufala e foglie di basilico fresco.",
            "price" => 8.99,
            "visibility" => 1,
            "restaurant_id" => 3,
            "plate_image" => "plates/margherita.jpg"
        ],       
        [
            "plate_name" => "Bismarck",
            "ingredients" => "Salsa di pomodoro, mozzarella, prosiutto, uovo",
            "description" => "Classica pizza italiana con salsa di pomodoro, mozzarella di bufala, prosciutto e un uovo all'occhio di bue.",
            "price" => 8.99,
            "visibility" => 1,
            "restaurant_id" => 3,
            "plate_image" => "plates/pizza_bismarck.jpg"
        ],
        [
            "plate_name" => "Diavola",
            "ingredients" => "Salsa di pomodoro, mozzarella, salame piccante, pepe",
            "description" => "Classica pizza italiana con salsa di pomodoro, mozzarella di bufala, salamino piccante, pepe e un filo di olio di oliva",
            "price" => 8.99,
            "visibility" => 1,
            "restaurant_id" => 3,
            "plate_image" => "plates/pizza_diavola.jpg"
        ],

        [
            "plate_name" => "Quattro Stagioni",
            "ingredients" => "Salsa di pomodoro, mozzarella, funghi, prosciutto, carciofi, olive",
            "description" => "Pizza divisa in quattro parti, ciascuna con ingredienti rappresentativi delle quattro stagioni.",
            "price" => 11.50,
            "visibility" => 1,
            "restaurant_id" => 3,
            "plate_image" => "plates/4-stagioni.webp"
        ],
        [
            "plate_name" => "Capricciosa",
            "ingredients" => "Salsa di pomodoro, mozzarella, prosciutto cotto, funghi, carciofi, olive",
            "description" => "Pizza ricca di ingredienti come prosciutto cotto, funghi, carciofi e olive.",
            "price" => 10.75,
            "visibility" => 1,
            "restaurant_id" => 3,
            "plate_image" => "plates/capricciosa.jpg",
        ],
        [
            "plate_name" => "Napoli",
            "ingredients" => "Salsa di pomodoro, mozzarella, acciughe",
            "description" => "Pizza napoletana con salsa di pomodoro, mozzarella e acciughe.",
            "price" => 9.25,
            "visibility" => 1,
            "restaurant_id" => 3,
            "plate_image" => "plates/pizza_napoli.webp",
        ],
        [
            "plate_name" => "Quattro Formaggi",
            "ingredients" => "Salsa di pomodoro, mozzarella, gorgonzola, fontina, provolone",
            "description" => "Pizza con quattro formaggi: mozzarella, gorgonzola, fontina e provolone.",
            "price" => 11.00,
            "visibility" => 1,
            "restaurant_id" => 3,
            "plate_image" => "plates/quattro_formaggi.jpg",
        ],
        [
            "plate_name" => "Vegetariana",
            "ingredients" => "Salsa di pomodoro, mozzarella, melanzane, zucchine, peperoni",
            "description" => "Pizza vegetariana con melanzane, zucchine e peperoni.",
            "price" => 10.50,
            "visibility" => 1,
            "restaurant_id" => 3,
            "plate_image" => "plates/pizza_vegetariana.jpg",
        ],
        [
            "plate_name" => "Pesce",
            "ingredients" => "Salsa di pomodoro, mozzarella, tonno, acciughe, olive",
            "description" => "Pizza con tonno, acciughe e olive.",
            "price" => 11.25,
            "visibility" => 1,
            "restaurant_id" => 3,
            "plate_image" => "plates/pizza_pesce.jpg",
        ],
        [
            "plate_name" => "Salame",
            "ingredients" => "Salsa di pomodoro, mozzarella, salame",
            "description" => "Pizza con salame.",
            "price" => 10.00,
            "visibility" => 1,
            "restaurant_id" => 3,
            "plate_image" => "plates/pizza_salame.webp",
        ],
        [
            "plate_name" => "Prosciutto e Funghi",
            "ingredients" => "Salsa di pomodoro, mozzarella, prosciutto cotto, funghi",
            "description" => "Pizza con prosciutto cotto e funghi.",
            "price" => 10.75,
            "visibility" => 1,
            "restaurant_id" => 3,
            "plate_image" => "plates/pizza_prosciutto_funghi.webp",
        ],

        // indian plates

        [
            "plate_name" => "Pollo Tikka Masala",
            "ingredients" => "Pollo, salsa di pomodoro, yogurt, spezie indiane",
            "description" => "Piatto di pollo arrosto e marinato in salsa cremosa di pomodoro, yogurt e spezie indiane.",
            "price" => 14.99,
            "visibility" => 1,
            "restaurant_id" => 4,
            "plate_image" => "plates/pollo-tikka.jpg",
        ],
        [
            "plate_name" => "Samosa",
            "ingredients" => "Patate, piselli, spezie, involucro di pasta",
            "description" => "Triangoli fritti ripieni di patate, piselli e spezie aromatiche, serviti con chutney.",
            "price" => 6.50,
            "visibility" => 1,
            "restaurant_id" => 4,
            "plate_image" => "plates/samosa.jpg"
        ],
        [
            "plate_name" => "Paneer Tikka",
            "ingredients" => "Formaggio paneer, peperoni, cipolle, spezie",
            "description" => "Cubetti di paneer marinati e grigliati con peperoni, cipolle e spezie aromatiche.",
            "price" => 11.75,
            "visibility" => 1,
            "restaurant_id" => 4,
            "plate_image" => "plates/paneer.jpg"
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // cycle for populate database
        foreach ($this->plates as $plate) {
            $newPlate = new Plate();
            $newPlate->plate_name = $plate["plate_name"];
            $newPlate->ingredients = $plate["ingredients"];
            $newPlate->description = $plate["description"];
            $newPlate->price = $plate["price"];
            $newPlate->visibility = $plate["visibility"];
            $newPlate->restaurant_id = $plate["restaurant_id"];
            $newPlate->plate_image = "/{$plate['plate_image']}";
            $newPlate->save();
        }
    }
}
