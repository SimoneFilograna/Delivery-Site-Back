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
            "name" => "Sushi assortito",
            "ingredients" => "Riso, pesce crudo, alga nori",
            "description" => "Assortimento di sushi tradizionale giapponese, composto da varietà di pesce crudo su letto di riso.",
            "price" => 15.99,
            "visibility" => 1,
            "restaurant_id" => 2,
            "image" => "https://png.pngtree.com/background/20230516/original/pngtree-sushi-platter-with-various-different-kinds-of-sushi-picture-image_2603145.jpg"
        ],
        [
            "name" => "Tempura di verdure",
            "ingredients" => "Verdure varie, pastella leggera",
            "description" => "Verdure fresche immerse in una pastella leggera e croccante, fritte fino alla perfezione.",
            "price" => 10.50,
            "visibility" => 1,
            "restaurant_id" => 2,
            "image" => "https://www.zucchi.com/wp-content/uploads/2017/05/box-medio_tempura.jpg"
        ],
        [
            "name" => "Ramen tradizionale",
            "ingredients" => "Tagliatelle, brodo di carne o pesce, cipolla, uovo, maiale o pollo",
            "description" => "Zuppa giapponese con tagliatelle e una varietà di ingredienti come carne, uovo, cipolla e condimenti.",
            "price" => 12.75,
            "visibility" => 1,
            "restaurant_id" => 2,
            "image" => "https://staticcookist.akamaized.net/wp-content/uploads/sites/21/2020/03/ramen-curiosita%CC%80-storia.jpeg"
        ],

        // mexican plates
        
        [
            "name" => "Tacos al Pastor",
            "ingredients" => "Maiale marinato, ananas, cipolla, coriandolo",
            "description" => "Tortilla di mais farcita con maiale marinato cotto verticalmente, ananas, cipolla e coriandolo.",
            "price" => 9.99,
            "visibility" => 1,
            "restaurant_id" => 3,
            "image" => "https://www.culinaryhill.com/wp-content/uploads/2022/12/Tacos-al-Pastor-Culinary-Hill-1200x800-1.jpg"
        ],
        [
            "name" => "Guacamole",
            "ingredients" => "Avocado, cipolla, pomodoro, lime, coriandolo",
            "description" => "Purè di avocado fresco condito con cipolla, pomodoro, lime e coriandolo, servito con totopos.",
            "price" => 7.50,
            "visibility" => 1,
            "restaurant_id" => 3,
            "image" => "https://www.todis.it/wp-content/uploads/2021/05/come-fare-il-guacamole-in-casa-2.jpg",
        ],
        [
            "name" => "Enchiladas",
            "ingredients" => "Tortilla di mais, pollo, formaggio, salsa di pomodoro",
            "description" => "Tortilla ripiena di pollo, formaggio e salsa di pomodoro, cotta al forno e servita con contorni.",
            "price" => 11.25,
            "visibility" => 1,
            "restaurant_id" => 3,
            "image" => "https://weelicious.com/wp-content/uploads/2021/05/Mexican-Enchiladas-11-1.jpg",
        ],

        // pizza plates

        [
            "name" => "Margherita",
            "ingredients" => "Salsa di pomodoro, mozzarella, basilico",
            "description" => "Classica pizza italiana con salsa di pomodoro, mozzarella di bufala e foglie di basilico fresco.",
            "price" => 8.99,
            "visibility" => 1,
            "restaurant_id" => 4,
            "image" => "https://www.anticaosteriadawalter.it/immagini/pizza-storia.jpg"
        ],
        [
            "name" => "Quattro Stagioni",
            "ingredients" => "Salsa di pomodoro, mozzarella, funghi, prosciutto, carciofi, olive",
            "description" => "Pizza divisa in quattro parti, ciascuna con ingredienti rappresentativi delle quattro stagioni.",
            "price" => 11.50,
            "visibility" => 1,
            "restaurant_id" => 4,
            "image" => "https://i0.wp.com/www.piccolericette.net/piccolericette/wp-content/uploads/2016/07/3017_Pizza.jpg?resize=895%2C616&ssl=1"
        ],
        [
            "name" => "Capricciosa",
            "ingredients" => "Salsa di pomodoro, mozzarella, prosciutto cotto, funghi, carciofi, olive",
            "description" => "Pizza ricca di ingredienti come prosciutto cotto, funghi, carciofi e olive.",
            "price" => 10.75,
            "visibility" => 1,
            "restaurant_id" => 4,
            "image" => "https://www.melarossa.it/wp-content/uploads/2021/02/pizza-capricciosa.jpg",
        ],

        // indian plates

        [
            "name" => "Pollo Tikka Masala",
            "ingredients" => "Pollo, salsa di pomodoro, yogurt, spezie indiane",
            "description" => "Piatto di pollo arrosto e marinato in salsa cremosa di pomodoro, yogurt e spezie indiane.",
            "price" => 14.99,
            "visibility" => 1,
            "restaurant_id" => 5,
            "image" => "https://images.dissapore.com/wp-content/uploads/2023/03/pollo-tikka-masala-ricetta-1200x675.jpg",
        ],
        [
            "name" => "Samosa",
            "ingredients" => "Patate, piselli, spezie, involucro di pasta",
            "description" => "Triangoli fritti ripieni di patate, piselli e spezie aromatiche, serviti con chutney.",
            "price" => 6.50,
            "visibility" => 1,
            "restaurant_id" => 5,
            "image" => "https://staticcookist.akamaized.net/wp-content/uploads/sites/21/2021/09/samosa-di-pollo-1200x675.jpg"
        ],
        [
            "name" => "Paneer Tikka",
            "ingredients" => "Formaggio paneer, peperoni, cipolle, spezie",
            "description" => "Cubetti di paneer marinati e grigliati con peperoni, cipolle e spezie aromatiche.",
            "price" => 11.75,
            "visibility" => 1,
            "restaurant_id" => 5,
            "image" => "https://geekrobocook.com/wp-content/uploads/2021/03/12.-Grilled-Paneer.jpg"
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
            $newPlate->name = $plate["name"];
            $newPlate->ingredients = $plate["ingredients"];
            $newPlate->description = $plate["description"];
            $newPlate->price = $plate["price"];
            $newPlate->visibility = $plate["visibility"];
            $newPlate->restaurant_id = $plate["restaurant_id"];
            $newPlate->image = $plate["image"];
            $newPlate->save();
        }
    }
}
