<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::where('email','saadgfx97@gmail.com')->first();

        if (!$user) {
            User::create([
                'name'=>'saad saif',
                'email'=>'saadgfx97@gmail.com',
                'role'=>'admin',
                'password'=>Hash::make('password'),
            ]);
        }
    }
}
