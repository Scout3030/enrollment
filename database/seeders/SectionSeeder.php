<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = [
            'A',
            'B',
            'C',
            'D',
            'E',
        ];

        foreach ($sections as $section){
            $sectionExist = Section::whereName($section)->first();
            if(!$sectionExist){
                Section::create(['name' => $section]);
            }
        }
    }
}
