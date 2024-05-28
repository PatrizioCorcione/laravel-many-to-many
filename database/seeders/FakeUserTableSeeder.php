<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class FakeUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $new_user = new User;
        $new_user->name = 'ugo';
        $new_user->email = $new_user->name . '@gmail.com';
        $new_user->password = Hash::make('123123');
        $new_user->save();
    }
}
