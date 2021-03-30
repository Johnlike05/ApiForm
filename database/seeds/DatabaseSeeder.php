<?php
use App\User;
use App\Address;
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
       User::truncate();
       Address::truncate();
       factory(User::class, 10)->create();
       factory(Address::class, 10)->create();

    }
}
