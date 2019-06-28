<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // using model factory and faker
        factory(App\User::class, 5)->create();

        // using simple seeder
        // $this->call(UsersTableSeeder::class);
    }
}
