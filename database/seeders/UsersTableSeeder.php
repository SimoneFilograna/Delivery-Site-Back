<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    // create a users list for database
    private $listaUtenti = [
        [
            "name" => "Antonio Onore",
            "email" => "antonioonore@gmail.com",
            "password" => "password",
        ],
        [
            "name" => "Franco Amato",
            "email" => "francoamato@gmail.com",
            "password" => "password",
        ], [
            "name" => "Nicola Ancora",
            "email" => "nicolaancora@gmail.com",
            "password" => "password",
        ], [
            "name" => "Pietro Palia",
            "email" => "pietropalia@gmail.com",
            "password" => "password",
        ], [
            "name" => "Gianluca Acceso",
            "email" => "gianlucaacceso@gmail.com",
            "password" => "password",
        ],
        [
            "name" => "demo",
            "email" => "demo@gmail.com",
            "password" => "password",

        ],
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
            $newUser->password = $user["password"];            
            $newUser->save();
        }
    }
}
