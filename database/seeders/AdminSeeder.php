<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminSeeder extends Seeder
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
            'first_name' => 'A',
            'last_name' => '1',
            'birthdate' => Carbon::parse(1970-1-1),
            'phone_number' => '0000000000',
            'email' => 'admin@sfs.good',
            'password' => (Hash::make('sofarsogood')),
            'status'=> 'admin',
            ]);
    }
}