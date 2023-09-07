<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserInitSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'email' => 'dummy@gmail.com'
        ], [
            'name'              => "Dummy User",
            'password'          => Hash::make('dummy'),
            'email_verified_at' => date("Y-m-d H:i:s")
        ]);
    }
}
