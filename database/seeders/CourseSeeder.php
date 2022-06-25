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

        /** 1º ESO (LOMLOE)  */
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
                'name' => 'Geography and History',
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
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => 'Asturian Language and Literature',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => 'Applied Digitization',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => 'Religion',
                'duration'=>'1',
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => 'Educational Attention',
                'duration'=>'1',
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);


        /** 2º ESO  */


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

        /** 2º ESO PMAR */

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

        /** 3º ESO (LOMLOE)  */
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
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Asturian Language and Literature',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Social and Business Entrepreneurship Project',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
            ]);

        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Educational Attention',
                'duration'=>'1',
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Religion',
                'duration'=>'1',
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);

        /**  3º ESO PROGRAMA DE DIVERSIFICACIÓN CURRICULAR I */
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_HIGH_SCHOOL,
                'name' => 'Linguistic and Social Area',
                'duration'=>'9',
                'course_type_id' => CourseType::COMMON_AREAS,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_HIGH_SCHOOL,
                'name' => 'Scientific-Technological Field',
                'duration'=>'9',
                'course_type_id' => CourseType::COMMON_AREAS,
            ]);

        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_HIGH_SCHOOL,
                'name' => 'First Foreign Language: English',
                'duration'=>'3',
                'course_type_id' => CourseType::COMMON,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_HIGH_SCHOOL,
                'name' => 'Visual and Audiovisual Plastic Education',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_HIGH_SCHOOL,
                'name' => 'Technology and Digitization',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_HIGH_SCHOOL,
                'name' => 'Physical education',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_HIGH_SCHOOL,
                'name' => 'Second Foreign Language: French',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_HIGH_SCHOOL,
                'name' => 'center matter',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_HIGH_SCHOOL,
                'name' => 'Asturian Language and Literature',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_HIGH_SCHOOL,
                'name' => 'Social or Business Entrepreneurship Project',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
            ]);

        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_HIGH_SCHOOL,
                'name' => 'Religión',
                'duration'=>'1',
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_HIGH_SCHOOL,
                'name' => 'Educational Attention',
                'duration'=>'1',
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);


        /**  4º ESO  */
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
                'name' => 'Religión',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'duration'=>'1',
                'course_type_id' => CourseType::SPECIFIC,
            ]);
        Course::factory()
            ->create([
                'name' => 'Ethical values',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'duration'=>'1',
                'course_type_id' => CourseType::SPECIFIC,
            ]);

        Course::factory()
            ->create([
                'name' => 'Academic Mathematics',
                'duration'=>'4',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::ITINERARY,
            ]);
        Course::factory()
            ->create([
                'name' => 'Biology and geology',
                'duration'=>'3',
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ITINERARY,
            ]);
        Course::factory()
            ->create([
                'name' => 'Physics and chemistry',
                'duration'=>'3',
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ITINERARY,
            ]);
        Course::factory()
            ->create([
                'name' => 'Academic Mathematics',
                'duration'=>'4',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'course_type_id' => CourseType::ITINERARY,
            ]);
        Course::factory()
            ->create([
                'name' => 'Economy',
                'duration'=>'3',
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ITINERARY,
            ]);
        Course::factory()
            ->create([
                'name' => 'Latin',
                'duration'=>'3',
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ITINERARY,
            ]);
        Course::factory()
            ->create([
                'name' => 'Applied mathematics',
                'duration'=>'4',
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ITINERARY,
            ]);
        Course::factory()
            ->create([
                'name' => 'Sciences applied to Professional Activity',
                'duration'=>'3',
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ITINERARY,
            ]);
        Course::factory()
            ->create([
                'name' => 'Technology',
                'duration'=>'3',
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ITINERARY,
            ]);
        Course::factory()
            ->create([
                'name' => 'initiation to business activity',
                'duration'=>'3',
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ITINERARY,
            ]);


        Course::factory()
            ->create([
                'name' => 'Performing Arts and Dance',
                'duration'=>'3',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::SPECIFIC_ITINERARY,
            ]);
        Course::factory()
            ->create([
                'name' => 'TIC',
                'duration'=>'3',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::SPECIFIC_ITINERARY,
            ]);
        Course::factory()
            ->create([
                'name' => 'Second Foreign Language: French',
                'duration'=>'3',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::SPECIFIC_ITINERARY,
            ]);
        Course::factory()
            ->create([
                'name' => 'Visual and Audiovisual Plastic Education',
                'duration'=>'3',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::SPECIFIC_ITINERARY,
            ]);
        Course::factory()
            ->create([
                'duration'=>'3',
                'name' => 'Classic culture',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::SPECIFIC_ITINERARY,
            ]);

        // free configuration fourth
        Course::factory()
            ->create([
                'duration'=>'3',
                'name' => 'Philosophy',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::SPECIFIC_ITINERARY,
            ]);
        Course::factory()
            ->create([
                'duration'=>'3',
                'name' => 'Music',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::SPECIFIC_ITINERARY,
            ]);
        Course::factory()
            ->create([
                'duration'=>'3',
                'name' => 'scientific culture',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::SPECIFIC_ITINERARY,
            ]);
        Course::factory()
            ->create([
                'duration'=>'3',
                'name' => 'Asturian Language and Literature',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::FREE_CONFIGURATION_ITINERARY,
            ]);
        Course::factory()
            ->create([
                'name' => 'Electronics, Robotics and Control',
                'duration'=>'3',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::FREE_CONFIGURATION_ITINERARY,
            ]);
        Course::factory()
            ->create([
                'name' => 'Photography, Video and Digital Creation',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::FREE_CONFIGURATION_ITINERARY,
                'duration'=>'3',
            ]);

        // 1 FPB
        Course::factory()
            ->create([
                'name' => 'Elemental techniques of service',
                'grade_id' => Grade::FIRST_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::ASSOCIATED_UNITS_OF_COMPETENCES,
                'duration' => 6,
            ]);
        Course::factory()
            ->create([
                'name' => 'Basic process to prepare food and drinks',
                'grade_id' => Grade::FIRST_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::ASSOCIATED_UNITS_OF_COMPETENCES,
                'duration' => 5,
            ]);
        Course::factory()
            ->create([
                'name' => 'Preparing and assembling materials for catering',
                'grade_id' => Grade::FIRST_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::ASSOCIATED_UNITS_OF_COMPETENCES,
                'duration' => 4,
            ]);

        Course::factory()
            ->create([
                'name' => 'Applied sciences I',
                'grade_id' => Grade::FIRST_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::ASSOCIATED_COMMON_BLOCKS,
                'duration' => 6,
            ]);
        Course::factory()
            ->create([
                'name' => 'Communication and society',
                'grade_id' => Grade::FIRST_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::ASSOCIATED_COMMON_BLOCKS,
                'duration' => 6,
            ]);

        Course::factory()
            ->create([
                'name' => 'Forming in workspaces',
                'grade_id' => Grade::FIRST_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::FORMATION_WORKSPACE,
                'duration' => 120,
            ]);
        Course::factory()
            ->create([
                'name' => 'Prevention in labor risks',
                'grade_id' => Grade::FIRST_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::FORMATION_WORKSPACE,
                'duration' => 2,
            ]);
        // END 1 FPB

        // 2 FPB
        Course::factory()
            ->create([
                'name' => 'Tecnicas elementales de preelaboracion',
                'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::ASSOCIATED_UNITS_OF_COMPETENCES,
                'duration' => 5,
            ]);
        Course::factory()
            ->create([
                'name' => 'Procesos basicos de produccion culinaria',
                'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::ASSOCIATED_UNITS_OF_COMPETENCES,
                'duration' => 6,
            ]);
        Course::factory()
            ->create([
                'name' => 'Aprovisionamiento y conservacion de materias primas e higiene en la manipulacion',
                'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::ASSOCIATED_UNITS_OF_COMPETENCES,
                'duration' => 4,
            ]);
        Course::factory()
            ->create([
                'name' => 'Atencion al cliente',
                'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::ASSOCIATED_UNITS_OF_COMPETENCES,
                'duration' => 2,
            ]);

        Course::factory()
            ->create([
                'name' => 'Ciencias aplicadas II',
                'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::ASSOCIATED_COMMON_BLOCKS,
                'duration' => 6,
            ]);
        Course::factory()
            ->create([
                'name' => 'Comunicacion y sociedad II',
                'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::ASSOCIATED_COMMON_BLOCKS,
                'duration' => 6,
            ]);

        Course::factory()
            ->create([
                'name' => 'Formacion en centros de trabajo II',
                'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::FORMATION_WORKSPACE,
                'duration' => 120,
            ]);
        // END 2 FPB

        // 1 CFGM
        Course::factory()
            ->create([
                'name' => 'Preelaboracion y conservacion de alimentos',
                'grade_id' => Grade::FIRST_EDUCATIONAL_CYCLE_MEDIUM,
                'course_type_id' => CourseType::CF_COMMON,
                'duration' => 320,
            ]);
        Course::factory()
            ->create([
                'name' => 'Tecnicas culinarias',
                'grade_id' => Grade::FIRST_EDUCATIONAL_CYCLE_MEDIUM,
                'course_type_id' => CourseType::CF_COMMON,
                'duration' => 265,
            ]);
        Course::factory()
            ->create([
                'name' => 'Procesos basicos de pasteleria y reposteria',
                'grade_id' => Grade::FIRST_EDUCATIONAL_CYCLE_MEDIUM,
                'course_type_id' => CourseType::CF_COMMON,
                'duration' => 192,
            ]);
        Course::factory()
            ->create([
                'name' => 'Seguridad e higiene en la manipulacion de alimentos',
                'grade_id' => Grade::FIRST_EDUCATIONAL_CYCLE_MEDIUM,
                'course_type_id' => CourseType::CF_COMMON,
                'duration' => 96,
            ]);
        Course::factory()
            ->create([
                'name' => 'Formacion y orientacion laboral',
                'grade_id' => Grade::FIRST_EDUCATIONAL_CYCLE_MEDIUM,
                'course_type_id' => CourseType::CF_COMMON,
                'duration' => 96,
            ]);
        // END 1 CFGM

        // 2 CFGM
        Course::factory()
            ->create([
                'name' => 'Ofertas gastronomicas',
                'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_MEDIUM,
                'course_type_id' => CourseType::CF_COMMON,
                'duration' => 66,
            ]);
        Course::factory()
            ->create([
                'name' => 'Productos culinarios',
                'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_MEDIUM,
                'course_type_id' => CourseType::CF_COMMON,
                'duration' => 308,
            ]);
        Course::factory()
            ->create([
                'name' => 'Postres en restauracion',
                'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_MEDIUM,
                'course_type_id' => CourseType::CF_COMMON,
                'duration' => 196,
            ]);
        Course::factory()
            ->create([
                'name' => 'Empresa e iniciativa emprendedora',
                'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_MEDIUM,
                'course_type_id' => CourseType::CF_COMMON,
                'duration' => 88,
            ]);
        Course::factory()
            ->create([
                'name' => 'Formacion en centros de trabajo',
                'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_MEDIUM,
                'course_type_id' => CourseType::CF_COMMON,
                'duration' => 380,
            ]);
        // END 2 CFGM
    }
}
