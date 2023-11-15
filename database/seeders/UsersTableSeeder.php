<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    // create a users list for database
    private $listaUtenti = [
        //1
        [
            "name" => "Antonio Onore",
            "email" => "antonioonore@gmail.com",
            "password" => "password",
        ],
        //2 
        [
            "name" => "Franco Amato",
            "email" => "francoamato@gmail.com",
            "password" => "password",
        ],
        //3
        [
            "name" => "Nicola Ancora",
            "email" => "nicolaancora@gmail.com",
            "password" => "password",
        ],
        //4
        [
            "name" => "Pietro Palia",
            "email" => "pietropalia@gmail.com",
            "password" => "password",
        ],
        //5
         [
            "name" => "Gianluca Acceso",
            "email" => "gianlucaacceso@gmail.com",
            "password" => "password",
        ],
        //6
        [
            "name" => "demo",
            "email" => "demo@gmail.com",
            "password" => "password",

        ],
        //7
        [
            "name" => "Jackie Chan",
            "email" => "Chan@gmail.com",
            "password" => "password",

        ],
        //8
        [
            "name" => "Mario Posso",
            "email" => "marioposso@gmail.com",
            "password" => "password",

        ],
        //9
        [
            "name" => "Ahmed Falafel",
            "email" => "kebap@gmail.com",
            "password" => "password",

        ],
        //10
        [
            "name" => "Ahmed Lino",
            "email" => "ahmed@gmail.com",
            "password" => "password",

        ],
        //1
        [
            "name" => "Ronnie James Dio Khane",
            "email" => "diokhane@gmail.com",
            "password" => "password",

        ]
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        // cycle on userlist and save on database
        foreach($this->listaUtenti as $user){
            $newUser = new User();   
            $newUser->name = $user["name"];
            $newUser->email = $user["email"];
            $newUser->password = Hash::make("password");            
            $newUser->save();
        }
    }
}
