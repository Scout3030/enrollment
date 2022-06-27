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
                'bilingual' => true,
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
                'bilingual' => true,
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
                'bilingual' => true,
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
                'bilingual' => true,
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
                'name' => 'Religión',
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
                'name' => 'Center matter',
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
                'name' => 'Center matter',
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
                'bilingual' => true,
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
                'name' => 'Latín',
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






        /*********************** FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY  ***********************/




        Course::factory()
            ->create([
                'name' => 'Physical education',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::COMMON,
                'duration'=>'2',
            ]);
        Course::factory()
            ->create([
                'name' => 'Philosophy',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::COMMON,
                'duration'=>'3',
            ]);
        Course::factory()
            ->create([
                'name' => 'Spanish Language and Literature',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::COMMON,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'First Foreign Language: English',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::COMMON,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Physics and Chemistry',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::MODALITY,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Math',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::MODALITY,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Biology, Geology and Environmental Sciences',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::MODALITY_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Technical drawing I',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::MODALITY_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'technology and engineering',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::MODALITY_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Technical drawing I',
                'duration'=>'4',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
            ]);
        Course::factory()
            ->create([
                'name' => 'technology and engineering',
                'duration'=>'4',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
            ]);Course::factory()
        ->create([
            'name' => 'Sciences applied to Professional Activity',
            'duration'=>'4',
            'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
            'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
        ]);
        Course::factory()
            ->create([
                'name' => 'Applied anatomy',
                'duration'=>'3',
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);Course::factory()
        ->create([
            'name' => 'The classic legacy',
            'duration'=>'3',
            'group_one'=>Course::GROUP_COURSES_ONE_B,
            'group_two'=>Course::GROUP_COURSES_TWO_A,
            'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
            'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
        ]);Course::factory()
        ->create([
            'name' => 'Applied digital technology',
            'duration'=>'3',
            'group_one'=>Course::GROUP_COURSES_ONE_B,
            'group_two'=>Course::GROUP_COURSES_TWO_A,
            'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
            'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
        ]);
        Course::factory()
            ->create([
                'name' => 'Asturian Language and Literature',
                'duration'=>'3',
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);
        Course::factory()
            ->create([
                'name' => 'Second Foreign Language: French',
                'duration'=>'3',
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);
        Course::factory()
            ->create([
                'name' => 'Integrated research project',
                'duration'=>'1',
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);
        Course::factory()
            ->create([
                'name' => 'Energy resources and sustainability',
                'duration'=>'1',
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);

        Course::factory()
            ->create([
                'name' => 'Religion',
                'duration'=>'1',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::COMMON_OPTIONAL,
            ]);



        /*****************  FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES  **************/

        Course::factory()
            ->create([
                'name' => 'Physical education',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::COMMON,
                'duration'=>'2',
            ]);
        Course::factory()
            ->create([
                'name' => 'Philosophy',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::COMMON,
                'duration'=>'3',
            ]);
        Course::factory()
            ->create([
                'name' => 'Spanish Language and Literature',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::COMMON,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'First Foreign Language: English',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::COMMON,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Latín I',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_HUMANITIES,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'History of the contemporary world',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_HUMANITIES,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Applied mathematics to social sciences',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_SCIENCES,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Economy',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_SCIENCES,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Economy',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_HUMANITIES_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Greek',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_HUMANITIES_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'world literature',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_HUMANITIES_OPTION,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'History of the contemporary world',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_SCIENCES_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'world literature',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_SCIENCES_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Greek',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_SCIENCES_OPTION,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Applied anatomy',
                'duration'=>'3',
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);Course::factory()
        ->create([
            'name' => 'The classic legacy',
            'duration'=>'3',
            'group_one'=>Course::GROUP_COURSES_ONE_B,
            'group_two'=>Course::GROUP_COURSES_TWO_A,
            'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
            'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
        ]);Course::factory()
        ->create([
            'name' => 'Asturian Language and Literature',
            'duration'=>'3',
            'group_one'=>Course::GROUP_COURSES_ONE_B,
            'group_two'=>Course::GROUP_COURSES_TWO_A,
            'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
            'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
        ]);
        Course::factory()
            ->create([
                'name' => 'Second Foreign Language: French',
                'duration'=>'3',
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);
        Course::factory()
            ->create([
                'name' => 'Applied digital technology',
                'duration'=>'3',
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);

        Course::factory()
            ->create([
                'name' => 'Integrated research project',
                'duration'=>'1',
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);
        Course::factory()
            ->create([
                'name' => 'Energy resources and sustainability',
                'duration'=>'1',
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);
        Course::factory()
            ->create([
                'name' => 'Economy',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Greek',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'world literature',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'History of the contemporary world',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Religion',
                'duration'=>'1',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::COMMON_OPTIONAL,
            ]);






        /*****************  FIRST_HIGH_SCHOOL_GENERAL  **************/

        Course::factory()
            ->create([
                'name' => 'Physical education',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON,
                'duration'=>'2',
            ]);
        Course::factory()
            ->create([
                'name' => 'Philosophy',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON,
                'duration'=>'3',
            ]);
        Course::factory()
            ->create([
                'name' => 'Spanish Language and Literature',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'First Foreign Language: English',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'general math',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::MODALITY,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'world literature',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::MODALITY_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Biology, Geology and Environmental Sciences',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::MODALITY_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Technical drawing I',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::MODALITY_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Physics and Chemistry',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::MODALITY_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'technology and engineering',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::MODALITY_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Latín',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::MODALITY_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Greek',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::MODALITY_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'History of the contemporary world',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::MODALITY_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Economy, Entrepreneurship and business activity',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::MODALITY_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'world literature',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Biology, Geology and Environmental Sciences',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Physics and Chemistry',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'technology and engineering',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Latín',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Technical drawing I',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Greek',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'History of the contemporary world',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Applied anatomy',
                'duration'=>'3',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);Course::factory()
        ->create([
            'name' => 'The classic legacy',
            'duration'=>'3',
            'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
            'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            'group_one'=>Course::GROUP_COURSES_ONE_B,
            'group_two'=>Course::GROUP_COURSES_TWO_A,
        ]);Course::factory()
        ->create([
            'name' => 'Applied digital technology',
            'duration'=>'3',
            'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
            'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            'group_one'=>Course::GROUP_COURSES_ONE_B,
            'group_two'=>Course::GROUP_COURSES_TWO_A,
        ]);
        Course::factory()
            ->create([
                'name' => 'Asturian Language and Literature',
                'duration'=>'3',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
            ]);
        Course::factory()
            ->create([
                'name' => 'Second Foreign Language: French',
                'duration'=>'3',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
            ]);
        Course::factory()
            ->create([
                'name' => 'Integrated research project',
                'duration'=>'1',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
            ]);
        Course::factory()
            ->create([
                'name' => 'Energy resources and sustainability',
                'duration'=>'1',
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);

        Course::factory()
            ->create([
                'name' => 'Religion',
                'duration'=>'1',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON_OPTIONAL,
            ]);



        /************* SECOND_HIGH_SCHOOL_SCIENCE ******************************/

        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'name' => 'History of Philosophy',
                'duration'=>'3',
                'course_type_id' => CourseType::CORE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'name' => 'Math II',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'name' => 'History of Spain',
                'duration'=>'3',
                'course_type_id' => CourseType::CORE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'name' => 'Spanish Language and Literature II',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'name' => 'First Foreign Language II: English II',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'name' => 'Biology',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE_MODALITY_OPTION_ONE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'name' => 'Chemistry',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE_MODALITY_OPTION_ONE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'name' => 'Physics',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE_MODALITY_OPTION_TWO,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'name' => 'Technical drawing II',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE_MODALITY_OPTION_TWO,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'name' => 'Geology',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE_MODALITY_OPTION_THIRD,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'name' => 'Technical drawing II',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE_MODALITY_OPTION_THIRD,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'name' => 'Physics',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE_MODALITY_OPTION_FOURTH,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'name' => 'Chemistry',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE_MODALITY_OPTION_FOURTH,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'name' => 'Physics',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE_MODALITY_OPTION_FIVE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'name' => 'Biology',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE_MODALITY_OPTION_FIVE,
            ]);

        Course::factory()
            ->create([
                'name' => 'Industrial Technology II',
                'duration'=>'4',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);

        Course::factory()
            ->create([
                'name' => 'Earth and environmental sciences',
                'duration'=>'4',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Geology',
                'duration'=>'4',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Technical drawing II',
                'duration'=>'4',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Biology',
                'duration'=>'4',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Image and sound',
                'duration'=>'3',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'TIC II',
                'duration'=>'3',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Psychology',
                'duration'=>'3',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Second Foreign Language II: French II',
                'duration'=>'3',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Asturian language II',
                'duration'=>'1',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Research project II',
                'duration'=>'1',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'active lifestyle',
                'duration'=>'1',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Religion',
                'duration'=>'1',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);


        /************* SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES ******************************/

        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'name' => 'History of Philosophy',
                'duration'=>'3',
                'course_type_id' => CourseType::CORE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'name' => 'First Foreign Language II: English II',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'name' => 'History of Spain',
                'duration'=>'3',
                'course_type_id' => CourseType::CORE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'name' => 'Spanish Language and Literature II',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE,
            ]);

        Course::factory()
            ->create([
                'name' => 'Latin II',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_HUMANITIES,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Applied mathematics to social sciences II',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_SCIENCES,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Greek II',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_HUMANITIES,
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Geography',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'course_type_id' => CourseType::ITINERARY_HUMANITIES,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'business Economics',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_HUMANITIES,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'History of art',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'course_type_id' => CourseType::ITINERARY_HUMANITIES,
                'duration'=>'4',
            ]);


        Course::factory()
            ->create([
                'name' => 'Greek II',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_TWO_A,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Geography',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::ITINERARY_SCIENCES,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'business Economics',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_TWO_B,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'History of art',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_TWO_B,
                'course_type_id' => CourseType::ITINERARY_SCIENCES,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Image and sound',
                'duration'=>'3',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'TIC II',
                'duration'=>'3',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Psychology',
                'duration'=>'3',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Second Foreign Language II: French II',
                'duration'=>'3',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Asturian language II',
                'duration'=>'1',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Research project II',
                'duration'=>'1',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'active lifestyle',
                'duration'=>'1',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Religion',
                'duration'=>'1',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);


        Course::factory()
            ->create([
                'name' => 'Foundation of administration and management',
                'duration'=>'4',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);

        Course::factory()
            ->create([
                'name' => 'History of music and dance',
                'duration'=>'4',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Geography',
                'duration'=>'4',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Economy',
                'duration'=>'4',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Greek II',
                'duration'=>'4',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'History of art',
                'duration'=>'4',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
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
                'name' => 'Técnicas elementales de preelaboración',
                'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::ASSOCIATED_UNITS_OF_COMPETENCES,
                'duration' => 5,
            ]);
        Course::factory()
            ->create([
                'name' => 'Procesos básicos de produccion culinaria',
                'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::ASSOCIATED_UNITS_OF_COMPETENCES,
                'duration' => 6,
            ]);
        Course::factory()
            ->create([
                'name' => 'Aprovisionamiento y conservacion de materias primas e higiene en la manipulación',
                'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::ASSOCIATED_UNITS_OF_COMPETENCES,
                'duration' => 4,
            ]);
        Course::factory()
            ->create([
                'name' => 'Atención al cliente',
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
                'name' => 'Comunicación y sociedad II',
                'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::ASSOCIATED_COMMON_BLOCKS,
                'duration' => 6,
            ]);

        Course::factory()
            ->create([
                'name' => 'Formación en centros de trabajo II',
                'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::FORMATION_WORKSPACE,
                'duration' => 120,
            ]);
        // END 2 FPB

        // 1 CFGM
        Course::factory()
            ->create([
                'name' => 'Preelaboración y conservación de alimentos',
                'grade_id' => Grade::FIRST_EDUCATIONAL_CYCLE_MEDIUM,
                'course_type_id' => CourseType::CF_COMMON,
                'duration' => 320,
            ]);
        Course::factory()
            ->create([
                'name' => 'Técnicas culinarias',
                'grade_id' => Grade::FIRST_EDUCATIONAL_CYCLE_MEDIUM,
                'course_type_id' => CourseType::CF_COMMON,
                'duration' => 256,
            ]);
        Course::factory()
            ->create([
                'name' => 'Procesos básicos de pastelería y repostería',
                'grade_id' => Grade::FIRST_EDUCATIONAL_CYCLE_MEDIUM,
                'course_type_id' => CourseType::CF_COMMON,
                'duration' => 192,
            ]);
        Course::factory()
            ->create([
                'name' => 'Seguridad e higiene en la manipulación de alimentos',
                'grade_id' => Grade::FIRST_EDUCATIONAL_CYCLE_MEDIUM,
                'course_type_id' => CourseType::CF_COMMON,
                'duration' => 96,
            ]);
        Course::factory()
            ->create([
                'name' => 'Formación y orientación laboral',
                'grade_id' => Grade::FIRST_EDUCATIONAL_CYCLE_MEDIUM,
                'course_type_id' => CourseType::CF_COMMON,
                'duration' => 96,
            ]);
        // END 1 CFGM

        // 2 CFGM
        Course::factory()
            ->create([
                'name' => 'Ofertas gastrónomicas',
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
                'name' => 'Postres en restauración',
                'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_MEDIUM,
                'course_type_id' => CourseType::CF_COMMON,
                'duration' => 198,
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
                'name' => 'Formación en centros de trabajo',
                'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_MEDIUM,
                'course_type_id' => CourseType::CF_COMMON,
                'duration' => 380,
            ]);
        // END 2 CFGM
    }
}
