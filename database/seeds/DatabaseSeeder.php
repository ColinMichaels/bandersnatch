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
        // $this->call(UsersTableSeeder::class);
        $this->call(PlayersTableSeeder::class);
        $this->call(ResponsesTableSeeder::class);
        $this->call(ResponseTypesTableSeeder::class);
        $this->call(ChoicesTableSeeder::class);
        $this->call(ChoiceTypesTableSeeder::class);
        $this->call(ScenesTableSeeder::class);
        $this->call(SoundsTableSeeder::class);
    }
}
