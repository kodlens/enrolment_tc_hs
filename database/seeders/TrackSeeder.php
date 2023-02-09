<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TrackSeeder extends Seeder
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
                'track' => 'SPORTS AND ARTS TRACK',
            ],
          

        ];

        \App\Models\Track::insertOrIgnore($data);


    }
}
