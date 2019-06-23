<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      // using model factory in seeding (multiple data)
      factory(App\User::class, 10)->create();

      // using query builder in seeding (singale data)
      //  $this->call(UsersTableSeeder::class);
    }
}
