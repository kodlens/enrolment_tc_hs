<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'username' => 'admin',
                'lname' => 'CAGO',
                'fname' => 'ROFEL',
                'mname' => 'P',
                'sex' => 'MALE',
                'province' => 'MISAMIS OCCIDENTAL',
                'city' => 'TANGUB CITY',
                'barangay' => 'CANIANGAN',
                'street' => 'P-6',
                'email' => 'rofel@dev.com',
                'contact_no' => '1234',
                'role' => 'ADMINISTRATOR',
                'password' => Hash::make('a')
            ],

            [
                'username' => 'jessa',
                'lname' => 'BECHADA',
                'fname' => 'JESSA',
                'mname' => 'P',
                'sex' => 'FEMALE',
                'province' => 'MISAMIS OCCIDENTAL',
                'city' => 'TANGUB CITY',
                'barangay' => 'CANIANGAN',
                'street' => 'P-6',
                'email' => 'jessa@dev.com',
                'contact_no' => '1234',
                'role' => 'ADMINISTRATOR',
                'password' => Hash::make('a')
            ],

        ];

        \App\Models\User::insertOrIgnore($data);
    }
}
