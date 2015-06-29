<?php

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder {

    public function run()
    {
        // Kommentera denna för att inte radera all data i tabellen
        DB::table('rooms')->delete();

        $rooms = array(
            [
                'id' => 1,
                'name' => 'Rumnamn 1',
                'info' => 'Info om rum 1',
                'beds' => 5,
                'rate' => 980,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'id' => 2,
                'name' => 'Rumnamn 2',
                'info' => 'Info om rum 2',
                'beds' => 2,
                'rate' => 450,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
        );

        DB::table('rooms')->insert($rooms);
    }
}