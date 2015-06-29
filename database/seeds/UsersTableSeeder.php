<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        // Kommentera denna för att inte radera all data i tabellen
        DB::table('users')->delete();

        $users = array(
            [
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@booking.dev',
                'password' => '$2y$10$ClngjLDkImFACJwpO62j5.CMLKp10rBfTwzxvR/6Vo9vaM/dJr2eK', //Password 123123
                'role' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'id' => 2,
                'name' => 'user',
                'email' => 'user@booking.dev',
                'password' => '$2y$10$ClngjLDkImFACJwpO62j5.CMLKp10rBfTwzxvR/6Vo9vaM/dJr2eK', //Password 123123
                'role' => 0,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
        );

        DB::table('users')->insert($users);
    }
}