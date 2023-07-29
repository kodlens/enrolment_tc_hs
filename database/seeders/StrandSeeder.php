<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StrandSeeder extends Seeder
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
                'track' => 'ACADEMIC TRACK',
            ],
            [
                'track' => 'TVL TRACK',
            ],
            [
                'track' => 'ARTS AND DESIGN TRACK',
            ],
            [
                'track' => 'SPORTS TRACK',
            ],
          

        ];

        \App\Models\Strand::insertOrIgnore($data);
    }
}
