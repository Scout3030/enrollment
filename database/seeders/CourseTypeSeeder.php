<?php

namespace Database\Seeders;

use App\Models\CourseType;
use Illuminate\Database\Seeder;

class CourseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Common',
            'Common areas',
            'Common optional one',
            'Common optional two',
            'Elective',
            'Academic',
            'Applied',
            'Free configuration',
            'Core',
            'Specific',
            'Specific free configuration',
            'Intro high school',
            'Intro professional training',
        ];

        foreach ($types as $type){
            $typeExist = CourseType::whereName($type)
                ->first();
            if(!$typeExist){
                CourseType::create([
                    'name' => $type,
                ]);
            }
        }
    }
}
