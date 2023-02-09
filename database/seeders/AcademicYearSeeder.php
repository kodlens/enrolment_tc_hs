<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AcademicYearSeeder extends Seeder
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
                'academic_year' => '2020-2021',
                'is_active' => 0
            ],
            [
                'academic_year' => '2021-2022',
                'is_active' => 0
            ],
            [
                'academic_year' => '2022-2023',
                'is_active' => 1
            ],
          

        ];

        \App\Models\AcademicYear::insertOrIgnore($data);
    }
}
