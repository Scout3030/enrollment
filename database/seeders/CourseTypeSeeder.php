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
            'Itinerary',
            'Specific itinerary',
            'Free configuration itinerary',
            'Applied',
            'Free configuration',
            'Core',
            'Specific',
            'Specific free configuration',
            'Intro high school',
            'Intro professional training',

            'Modality',
            'Modality_option',
            'Core modality',
            'Core modality option one',
            'Core modality option two',
            'Core modality option third',
            'Core modality option fourth',
            'Core modality option five',
            'Common optional',
            'Itinerary humanities ',
            'Itinerary sciences',
            'Itinerary humanities option',
            'Itinerary sciences option',

            'Modules associated to unit of competences',
            'Modules associated to common blocks',
            'Modules of education in workspace',
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
