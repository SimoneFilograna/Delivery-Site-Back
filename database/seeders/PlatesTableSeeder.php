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
            "plate_image" => "https://png.pngtree.com/background/20230516/original/pngtree-sushi-platter-with-various-different-kinds-of-sushi-picture-image_2603145.jpg"
        ],
        [
            "plate_name" => "Tempura di verdure",
            "ingredients" => "Verdure varie, pastella leggera",
            "description" => "Verdure fresche immerse in una pastella leggera e croccante, fritte fino alla perfezione.",
            "price" => 10.50,
            "visibility" => 1,
            "restaurant_id" => 1,
            "plate_image" => "https://www.zucchi.com/wp-content/uploads/2017/05/box-medio_tempura.jpg"
        ],
        [
            "plate_name" => "Ramen tradizionale",
            "ingredients" => "Tagliatelle, brodo di carne o pesce, cipolla, uovo, maiale o pollo",
            "description" => "Zuppa giapponese con tagliatelle e una varietà di ingredienti come carne, uovo, cipolla e condimenti.",
            "price" => 12.75,
            "visibility" => 1,
            "restaurant_id" => 1,
            "plate_image" => "https://staticcookist.akamaized.net/wp-content/uploads/sites/21/2020/03/ramen-curiosita%CC%80-storia.jpeg"
        ],

        // mexican plates
        
        [
            "plate_name" => "Tacos al Pastor",
            "ingredients" => "Maiale marinato, ananas, cipolla, coriandolo",
            "description" => "Tortilla di mais farcita con maiale marinato cotto verticalmente, ananas, cipolla e coriandolo.",
            "price" => 9.99,
            "visibility" => 1,
            "restaurant_id" => 2,
            "plate_image" => "https://www.culinaryhill.com/wp-content/uploads/2022/12/Tacos-al-Pastor-Culinary-Hill-1200x800-1.jpg"
        ],
        [
            "plate_name" => "Guacamole",
            "ingredients" => "Avocado, cipolla, pomodoro, lime, coriandolo",
            "description" => "Purè di avocado fresco condito con cipolla, pomodoro, lime e coriandolo, servito con totopos.",
            "price" => 7.50,
            "visibility" => 1,
            "restaurant_id" => 2,
            "plate_image" => "https://www.todis.it/wp-content/uploads/2021/05/come-fare-il-guacamole-in-casa-2.jpg",
        ],
        [
            "plate_name" => "Enchiladas",
            "ingredients" => "Tortilla di mais, pollo, formaggio, salsa di pomodoro",
            "description" => "Tortilla ripiena di pollo, formaggio e salsa di pomodoro, cotta al forno e servita con contorni.",
            "price" => 11.25,
            "visibility" => 1,
            "restaurant_id" => 2,
            "plate_image" => "https://weelicious.com/wp-content/uploads/2021/05/Mexican-Enchiladas-11-1.jpg",
        ],

        // pizza plates

        [
            "plate_name" => "Margherita",
            "ingredients" => "Salsa di pomodoro, mozzarella, basilico",
            "description" => "Classica pizza italiana con salsa di pomodoro, mozzarella di bufala e foglie di basilico fresco.",
            "price" => 8.99,
            "visibility" => 1,
            "restaurant_id" => 3,
            "plate_image" => "https://www.anticaosteriadawalter.it/immagini/pizza-storia.jpg"
        ],
        [
            "plate_name" => "Quattro Stagioni",
            "ingredients" => "Salsa di pomodoro, mozzarella, funghi, prosciutto, carciofi, olive",
            "description" => "Pizza divisa in quattro parti, ciascuna con ingredienti rappresentativi delle quattro stagioni.",
            "price" => 11.50,
            "visibility" => 1,
            "restaurant_id" => 3,
            "plate_image" => "https://i0.wp.com/www.piccolericette.net/piccolericette/wp-content/uploads/2016/07/3017_Pizza.jpg?resize=895%2C616&ssl=1"
        ],
        [
            "plate_name" => "Capricciosa",
            "ingredients" => "Salsa di pomodoro, mozzarella, prosciutto cotto, funghi, carciofi, olive",
            "description" => "Pizza ricca di ingredienti come prosciutto cotto, funghi, carciofi e olive.",
            "price" => 10.75,
            "visibility" => 1,
            "restaurant_id" => 3,
            "plate_image" => "https://www.melarossa.it/wp-content/uploads/2021/02/pizza-capricciosa.jpg",
        ],

        // indian plates

        [
            "plate_name" => "Pollo Tikka Masala",
            "ingredients" => "Pollo, salsa di pomodoro, yogurt, spezie indiane",
            "description" => "Piatto di pollo arrosto e marinato in salsa cremosa di pomodoro, yogurt e spezie indiane.",
            "price" => 14.99,
            "visibility" => 1,
            "restaurant_id" => 4,
            "plate_image" => "https://images.dissapore.com/wp-content/uploads/2023/03/pollo-tikka-masala-ricetta-1200x675.jpg",
        ],
        [
            "plate_name" => "Samosa",
            "ingredients" => "Patate, piselli, spezie, involucro di pasta",
            "description" => "Triangoli fritti ripieni di patate, piselli e spezie aromatiche, serviti con chutney.",
            "price" => 6.50,
            "visibility" => 1,
            "restaurant_id" => 4,
            "plate_image" => "https://staticcookist.akamaized.net/wp-content/uploads/sites/21/2021/09/samosa-di-pollo-1200x675.jpg"
        ],
        [
            "plate_name" => "Paneer Tikka",
            "ingredients" => "Formaggio paneer, peperoni, cipolle, spezie",
            "description" => "Cubetti di paneer marinati e grigliati con peperoni, cipolle e spezie aromatiche.",
            "price" => 11.75,
            "visibility" => 1,
            "restaurant_id" => 4,
            "plate_image" => "https://geekrobocook.com/wp-content/uploads/2021/03/12.-Grilled-Paneer.jpg"
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
            $newPlate->plate_image = $plate["plate_image"];
            $newPlate->save();
        }
    }
}
