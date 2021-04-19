<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new User();
        $user1->name = 'Tomasas';
        $user1->email = 'admin@a.lt';
        $user1->password = Hash::make('aaaaaaaa');
        $user1->save();
    }
}