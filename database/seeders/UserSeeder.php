<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name'=>'andy',
            'email'=>'moderatorr@mail.ru',
            'password'=> Hash::make('12345Q'),
            'role_id'  =>1,
        ]);
    }
}
