<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'=>'admin',
            'isAdmin'=>true,
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('admin12345'),
        ]);
    }
}