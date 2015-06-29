<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

        $this->call('RoomsTableSeeder');
        $this->call('UsersTableSeeder');
        $this->call('OrdersTableSeeder');
        $this->command->info('Tables seeded!');

	}

}
