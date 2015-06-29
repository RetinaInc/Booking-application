<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder {

    public function run()
    {
        // Kommentera denna för att inte radera all data i tabellen
        DB::table('orders')->delete();

        $orders = array(
            [
                'id' => 1,
                'roomid' => 2,
                'arrives' => '2015-08-03',
                'departures' => '2015-08-10',
                'name' => 'Förnamn Efternamn',
                'phone' => '0000000000',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'id' => 2,
                'roomid' => 1,
                'arrives' => '2015-08-08',
                'departures' => '2015-08-12',
                'name' => 'Förnamn Efternamn',
                'phone' => '0000000000',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
        );

        DB::table('orders')->insert($orders);
    }
}