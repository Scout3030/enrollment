<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseType;
use App\Models\Grade;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Common courses
        Course::factory()
            ->count(60)
            ->create([
                'course_type_id' => CourseType::COMMON,
            ]);
          
           
        // Religion and ethical values for all grades
        Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => 'Physical Education',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => ' Geography and History',
                'duration'=>'3',
                'course_type_id' => CourseType::COMMON,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => 'Spanish Language and Literature',
                'duration'=>'5',
                'course_type_id' => CourseType::COMMON,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => 'First Foreign Language: English',
                'duration'=>'4',
                'course_type_id' => CourseType::COMMON,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => 'Mathematics',
                'duration'=>'4',
                'course_type_id' => CourseType::COMMON,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => 'Biology and Geology',
                'duration'=>'4',
                'course_type_id' => CourseType::COMMON,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => 'Visual and Audiovisual Plastic Education',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => 'Music',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => 'Second Foreign Language: French',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON_OPTIONAL,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => 'Asturian Language and Literature',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON_OPTIONAL,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => 'Applied Digitization',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON_OPTIONAL,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => 'Religion',
                'duration'=>'1',
                'course_type_id' => CourseType::COMMON_OPTIONAL,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => 'Educational Attention',
                'duration'=>'1',
                'course_type_id' => CourseType::COMMON_OPTIONAL,
            ]);





            Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'name' => 'Geography and History',
                'duration'=>'3',
                'course_type_id' => CourseType::CORE,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'name' => 'Physics and Chemistry',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'name' => 'First Foreign Language: English',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'name' => 'Spanish Language and Literature',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'name' => 'Mathematics',
                'duration'=>'5',
                'course_type_id' => CourseType::CORE,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'name' => 'Music',
                'duration'=>'2',
                'course_type_id' => CourseType::SPECIFIC,
            ]);

             Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'name' => 'Technology',
                'duration'=>'2',
                'course_type_id' => CourseType::SPECIFIC,
            ]);
             Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'name' => 'Physical Education',
                'duration'=>'2',
                'course_type_id' => CourseType::SPECIFIC,
            ]);
             Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'name' => 'Ethical values',
                'duration'=>'1',
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'name' => 'Religion',
                'duration'=>'1',
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'name' => 'Second Foreign Language: French',
                'duration'=>'2',
                'course_type_id' => CourseType::FREE_CONFIGURATION,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'name' => 'Classic culture',
                'duration'=>'2',
                'course_type_id' => CourseType::FREE_CONFIGURATION,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'name' => 'Asturian language',
                'duration'=>'2',
                'course_type_id' => CourseType::FREE_CONFIGURATION,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'name' => 'center matter',
                'duration'=>'2',
                'course_type_id' => CourseType::FREE_CONFIGURATION,
            ]);
            Course::factory()

            
           
           
           
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL,
                'name' => 'Linguistic and Social Area',
                'duration'=>'7',
                'course_type_id' => CourseType::CORE,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL,
                'name' => 'Foreign Languages Area',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL,
                'name' => 'Scientific and Mathematical Field',
                'duration'=>'9',
                'course_type_id' => CourseType::CORE,
            ]);            
            Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL,
                'name' => 'Music',
                'duration'=>'2',
                'course_type_id' => CourseType::SPECIFIC,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL,
                'name' => 'Technology',
                'duration'=>'2',
                'course_type_id' => CourseType::SPECIFIC,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL,
                'name' => 'Physical education',
                'duration'=>'2',
                'course_type_id' => CourseType::SPECIFIC,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL,
                'name' => 'Ethical values',
                'duration'=>'1',
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL,
                'name' => 'Religion',
                'duration'=>'1',
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL,
                'name' => 'Classic culture',
                'duration'=>'2',
                'course_type_id' => CourseType::FREE_CONFIGURATION,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL,
                'name' => 'Asturian language',
                'duration'=>'2',
                'course_type_id' => CourseType::FREE_CONFIGURATION,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL,
                'name' => 'center matter',
                'duration'=>'2',
                'course_type_id' => CourseType::FREE_CONFIGURATION,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL,
                'name' => 'Second Foreign Language: French',
                'duration'=>'2',
                'course_type_id' => CourseType::FREE_CONFIGURATION,
            ]);





            Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Physical education',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Geography and History',
                'duration'=>'3',
                'course_type_id' => CourseType::COMMON,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Spanish Language and Literature',
                'duration'=>'4',
                'course_type_id' => CourseType::COMMON,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'First Foreign Language: English',
                'duration'=>'3',
                'course_type_id' => CourseType::COMMON,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Math',
                'duration'=>'4',
                'course_type_id' => CourseType::COMMON,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Biology and geology',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Visual and Audiovisual Plastic Education',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Physics and chemistry',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Technology and Digitization',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Education in Civic and Ethical Values',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Second Foreign Language: French',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON_OPTIONAL,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Asturian Language and Literature',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON_OPTIONAL,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Social and Business Entrepreneurship Project',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON_OPTIONAL,
            ]);


            Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Educational Attention',
                'duration'=>'1',
                'course_type_id' => CourseType::COMMON_OPTIONAL,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Religion',
                'duration'=>'1',
                'course_type_id' => CourseType::COMMON_OPTIONAL,
            ]);


            Course::factory()
            ->create([
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'name' => 'Geography and History',
                'duration'=>'3',
                'course_type_id' => CourseType::CORE,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'name' => 'Spanish Language and Literature',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'name' => 'First Foreign Language: English',
                'duration'=>'3',
                'course_type_id' => CourseType::CORE,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'name' => 'Physical education',
                'duration'=>'2',
                'course_type_id' => CourseType::CORE,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'name' => 'Religion',
                'duration'=>'1',
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
            Course::factory()
            ->create([
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'name' => 'Ethical values',
                'duration'=>'1',
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);        
    }
}
