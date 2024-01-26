<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Soa\User\Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class, 
        ]);
    }
}
