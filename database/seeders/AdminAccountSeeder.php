<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'Admin',
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'birthdate' => Carbon::parse(1970-1-1),
            'phone_number' => '0000000000',
            'email' => 'admin@sofarso.good', // Emain admin@sofarso.good
            'password' => (Hash::make('Admin1234')), // Password Admin1234
            'status'=> 'admin',
            ]);
    }
}