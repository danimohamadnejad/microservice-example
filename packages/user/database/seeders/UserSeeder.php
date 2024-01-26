<?php
namespace Soa\User\Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Soa\User\Models\User;
use \Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      User::create([
        'name'=>'dani', 'password'=>Hash::make('dani'), 'email'=>'danimohamadnejad@gmail.com',
        'mobile'=>'09218653900'
      ]);       
    }
}
