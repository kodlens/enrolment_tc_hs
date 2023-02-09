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
                'lname' => 'ABAPO',
                'fname' => 'JADE MARK',
                'mname' => 'P',
                'extension' => '',
                'sex' => 'MALE',
                'email' => 'jademark@dev.com',
                'contact_no' => '1234',
                'role' => 'ADMINISTRATOR',
                'password' => Hash::make('a')
            ],

          

        ];

        \App\Models\User::insertOrIgnore($data);
    }
}
