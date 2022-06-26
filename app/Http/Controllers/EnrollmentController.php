<?php

namespace App\Http\Controllers;

use App\DataTables\EnrollmentDataTable;
use App\Http\Requests\EnrollmentRequest;
use App\Models\Course;
use App\Models\CourseType;
use App\Models\Enrollment;
use App\Models\AcademicPeriod;
use App\Models\Grade;
use App\Models\Level;
use Str;
use Storage;

class EnrollmentController extends Controller
{
    /**
     * @param EnrollmentDataTable $dataTable
     * @return mixed
     */
    public function index(EnrollmentDataTable $dataTable)
    {
        $academicPeriod = AcademicPeriod::latest()->first();
        $enrollmentsInPeriod = Enrollment::whereAcademicPeriodId($academicPeriod->id)->get();
        return $dataTable->render('enrollment.index', compact('academicPeriod', 'enrollmentsInPeriod'));
    }

    public function create()
    {
        $student = auth()->user()->student;

        $student->load(['grade.level'])->get();
        $gradeId = $student->grade->id;
        $levelId = $student->grade->level->id;
        $courses = [];

        switch ($levelId) {
            case Level::MIDDLE_SCHOOL: {
                switch ($gradeId) {
                    case Grade::FIRST_MIDDLE_SCHOOL: {

                        $commonCourses = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::COMMON)
                            ->get();

                        $commonOptionalOneCourses = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::COMMON_OPTIONAL_ONE)
                            ->get();

                        $commonOptionalTwoCourses = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::COMMON_OPTIONAL_TWO)
                            ->get();
                        return view('enrollment.create.first-third-middle-school',
                            compact('commonCourses', 'commonOptionalOneCourses', 'commonOptionalTwoCourses'));
                    }
                    case Grade::SECOND_MIDDLE_SCHOOL: {

                        $commonCoursesCore = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::CORE)
                            ->get();

                        $commonCoursesSpecific = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::SPECIFIC)
                            ->get();

                        $commonOptionalOneCourses = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::SPECIFIC_FREE_CONFIGURATION)
                            ->get();

                        $commonOptionalTwoCourses = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::FREE_CONFIGURATION)
                            ->get();
                        return view('enrollment.create.second-school',
                            compact('commonCoursesCore','commonCoursesSpecific', 'commonOptionalOneCourses', 'commonOptionalTwoCourses'));
                    }
                    case Grade::THIRD_MIDDLE_SCHOOL: {

                        $commonCourses = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::COMMON)
                            ->get();

                        $commonOptionalOneCourses = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::COMMON_OPTIONAL_ONE)
                            ->get();

                        $commonOptionalTwoCourses = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::COMMON_OPTIONAL_TWO)
                            ->get();
                        return view('enrollment.create.first-third-middle-school',
                            compact('commonCourses', 'commonOptionalOneCourses', 'commonOptionalTwoCourses'));
                    }
                    case Grade::FOURTH_MIDDLE_SCHOOL: {

                        $commonCoursesCore = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::CORE)
                            ->get();

                        $commonCoursesSpecific = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::SPECIFIC)
                            ->get();

                        $coursesItineraryA = Course::whereGradeId($gradeId)
                            ->whereGroupOne(Course::GROUP_COURSES_ONE_A)
                            ->whereGroupTwo(Course::GROUP_COURSES_TWO_A)
                            ->whereCourseTypeId(CourseType::ITINERARY)
                            ->get();

                        $coursesItineraryB = Course::whereGradeId($gradeId)
                            ->whereGroupOne(Course::GROUP_COURSES_ONE_A)
                            ->whereGroupTwo(Course::GROUP_COURSES_TWO_B)
                            ->whereCourseTypeId(CourseType::ITINERARY)
                            ->get();

                        $coursesItineraryC = Course::whereGradeId($gradeId)
                            ->whereGroupOne(Course::GROUP_COURSES_ONE_B)
                            ->whereGroupTwo(Course::GROUP_COURSES_TWO_A)
                            ->whereCourseTypeId(CourseType::ITINERARY)
                            ->get();

                        $coursesItineraryD = Course::whereGradeId($gradeId)
                            ->whereGroupOne(Course::GROUP_COURSES_ONE_B)
                            ->whereGroupTwo(Course::GROUP_COURSES_TWO_B)
                            ->whereCourseTypeId(CourseType::ITINERARY)
                            ->get();

                        $coursesSpecific = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::SPECIFIC_ITINERARY)
                            ->get();

                        $coursesfree = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::FREE_CONFIGURATION_ITINERARY)
                            ->get();
                        return view('enrollment.create.high-school',
                            compact('commonCoursesCore','commonCoursesSpecific','coursesItineraryA','coursesItineraryB',
                                'coursesItineraryC','coursesItineraryD','coursesfree','coursesSpecific'));
                    }
                }
            }
            case Level::HIGH_SCHOOL: {
                switch ($gradeId) {
                    case Grade::SECOND_HIGH_SCHOOL: {
                        $commonCoursesCore = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::CORE)
                            ->get();

                        $commonCoursesSpecific = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::SPECIFIC)
                            ->get();

                        $commonOptionalOneCourses = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::SPECIFIC_FREE_CONFIGURATION)
                            ->get();

                        $commonOptionalTwoCourses = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::FREE_CONFIGURATION)
                            ->get();

                        return view('enrollment.create.second-school',
                            compact('commonCoursesCore','commonCoursesSpecific', 'commonOptionalOneCourses', 'commonOptionalTwoCourses'));
                    }
                    case Grade::THIRD_HIGH_SCHOOL: {
                        $commonCourses = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::COMMON)
                            ->get();

                        $commonCoursesAreas = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::COMMON_AREAS)
                            ->get();

                        $commonOptionalOneCourses = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::COMMON_OPTIONAL_ONE)
                            ->get();

                        $commonOptionalTwoCourses = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::COMMON_OPTIONAL_TWO)
                            ->get();

                        return view('enrollment.create.third-high-school',
                            compact('commonCourses','commonCoursesAreas', 'commonOptionalOneCourses', 'commonOptionalTwoCourses'));
                    }
                    case Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY: {

                        $commonCourses = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::COMMON)
                            ->get();

                        $modalitiesCourses = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::MODALITY)
                            ->get();                           

                        $modalityOption = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::MODALITY_OPTION)
                            ->get();

                        $coursesItineraryA = Course::whereGradeId($gradeId)
                              ->whereCourseTypeId(CourseType::COMMON_OPTIONAL_ONE)
                            ->get();

                        $coursesItineraryB = Course::whereGradeId($gradeId)
                            ->whereGroupOne(Course::GROUP_COURSES_ONE_B)
                            ->whereGroupTwo(Course::GROUP_COURSES_TWO_A)
                            ->whereCourseTypeId(CourseType::COMMON_OPTIONAL_TWO)
                            ->get();

                        $coursesItineraryC = Course::whereGradeId($gradeId)
                            ->whereGroupOne(Course::GROUP_COURSES_ONE_B)
                            ->whereGroupTwo(Course::GROUP_COURSES_TWO_B)
                            ->whereCourseTypeId(CourseType::COMMON_OPTIONAL_TWO)
                            ->get();

                        $coursesItineraryD = Course::whereGradeId($gradeId)
                            ->whereGroupOne(Course::GROUP_COURSES_ONE_B)
                            ->whereGroupTwo(Course::GROUP_COURSES_TWO_B)
                            ->whereCourseTypeId(CourseType::ITINERARY)
                            ->get();

                        $coursesSpecific = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::COMMON_OPTIONAL)
                            ->get();

                        return view('enrollment.create.high-school-science-technology',
                            compact('commonCourses','modalitiesCourses','modalityOption','coursesItineraryA','coursesItineraryB',
                                'coursesItineraryC','coursesItineraryD','coursesSpecific'));
                    }

                    case Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES: {

                        $commonCourses = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::COMMON)
                            ->get();

                        $modalitiesCourses = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::ITINERARY_HUMANITIES)
                            ->get();                           

                        $modalityOption = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::ITINERARY_SCIENCES)
                            ->get();

                        $coursesItineraryA = Course::whereGradeId($gradeId)
                              ->whereCourseTypeId(CourseType::ITINERARY_HUMANITIES_OPTION)
                            ->get();
                        
                        $coursesItinerarySciences = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::ITINERARY_SCIENCES_OPTION)
                             ->get();

                        $coursesItineraryB = Course::whereGradeId($gradeId)
                            ->whereGroupOne(Course::GROUP_COURSES_ONE_B)
                            ->whereGroupTwo(Course::GROUP_COURSES_TWO_A)
                            ->whereCourseTypeId(CourseType::COMMON_OPTIONAL_TWO)
                            ->get();

                        $coursesItineraryC = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::COMMON_OPTIONAL_ONE)
                            ->get();

                        $coursesItineraryD = Course::whereGradeId($gradeId)
                            ->whereGroupOne(Course::GROUP_COURSES_ONE_B)
                            ->whereGroupTwo(Course::GROUP_COURSES_TWO_B)
                            ->whereCourseTypeId(CourseType::COMMON_OPTIONAL_TWO)
                            ->get();

                        $coursesSpecific = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::COMMON_OPTIONAL)
                            ->get();

                        return view('enrollment.create.high-school-humanities-science',
                            compact('commonCourses','modalitiesCourses','modalityOption','coursesItinerarySciences','coursesItineraryA','coursesItineraryB',
                                'coursesItineraryC','coursesItineraryD','coursesSpecific'));
                    }
                    case Grade::FIRST_HIGH_SCHOOL_GENERAL: {

                        $commonCourses = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::COMMON)
                            ->get();

                        $modalitiesCourses = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::MODALITY)
                            ->get();                           

                        $modalityOption = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::MODALITY_OPTION)
                            ->get();

                        $coursesItineraryA = Course::whereGradeId($gradeId)
                              ->whereCourseTypeId(CourseType::COMMON_OPTIONAL_ONE)
                            ->get();

                        $coursesItineraryB = Course::whereGradeId($gradeId)
                            ->whereGroupOne(Course::GROUP_COURSES_ONE_B)
                            ->whereGroupTwo(Course::GROUP_COURSES_TWO_A)
                            ->whereCourseTypeId(CourseType::COMMON_OPTIONAL_TWO)
                            ->get();

                        $coursesItineraryC = Course::whereGradeId($gradeId)
                            ->whereGroupOne(Course::GROUP_COURSES_ONE_B)
                            ->whereGroupTwo(Course::GROUP_COURSES_TWO_B)
                            ->whereCourseTypeId(CourseType::COMMON_OPTIONAL_TWO)
                            ->get();

                        $coursesItineraryD = Course::whereGradeId($gradeId)
                            ->whereGroupOne(Course::GROUP_COURSES_ONE_B)
                            ->whereGroupTwo(Course::GROUP_COURSES_TWO_B)
                            ->whereCourseTypeId(CourseType::ITINERARY)
                            ->get();

                        $coursesSpecific = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::COMMON_OPTIONAL)
                            ->get();

                        return view('enrollment.create.high-school-general',
                            compact('commonCourses','modalitiesCourses','modalityOption','coursesItineraryA','coursesItineraryB',
                                'coursesItineraryC','coursesItineraryD','coursesSpecific'));
                    }
                    case Grade::SECOND_HIGH_SCHOOL_SCIENCE: {

                        $commonCourses = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::CORE)
                            ->get();

                        $modalitiesCourses = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::CORE_MODALITY_OPTION_ONE)
                            ->get();   
                        
                        $modalitiesCourses2 = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::CORE_MODALITY_OPTION_TWO)
                            ->get();
                        
                        $modalitiesCourses3 = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::CORE_MODALITY_OPTION_THIRD)
                            ->get();  
                        
                        $modalitiesCourses4 = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::CORE_MODALITY_OPTION_FOURTH)
                            ->get();  
                           
                        $modalitiesCourses5 = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::CORE_MODALITY_OPTION_FIVE)
                            ->get();   
                            

                        $modalityOption = Course::whereGradeId($gradeId)
                            ->whereCourseTypeId(CourseType::MODALITY_OPTION)
                            ->get();

                        $coursesItineraryA = Course::whereGradeId($gradeId)
                              ->whereCourseTypeId(CourseType::COMMON_OPTIONAL_ONE)
                            ->get();

                        $coursesItineraryB = Course::whereGradeId($gradeId)
                            ->whereGroupOne(Course::GROUP_COURSES_ONE_A)
                            ->whereGroupTwo(Course::GROUP_COURSES_TWO_A)
                            ->whereCourseTypeId(CourseType::SPECIFIC_FREE_CONFIGURATION)
                            ->get();

                        $coursesItineraryC = Course::whereGradeId($gradeId)
                            ->whereGroupOne(Course::GROUP_COURSES_ONE_B)
                            ->whereGroupTwo(Course::GROUP_COURSES_TWO_A)
                            ->whereCourseTypeId(CourseType::SPECIFIC_FREE_CONFIGURATION)
                            ->get();

                        $coursesItineraryD = Course::whereGradeId($gradeId)
                            ->whereGroupOne(Course::GROUP_COURSES_ONE_B)
                            ->whereGroupTwo(Course::GROUP_COURSES_TWO_B)
                            ->whereCourseTypeId(CourseType::SPECIFIC_FREE_CONFIGURATION)
                            ->get();

                          
                        return view('enrollment.create.second-high-school-science',
                            compact('commonCourses','modalitiesCourses','modalitiesCourses2','modalitiesCourses3','modalitiesCourses4','modalitiesCourses5','modalityOption','coursesItineraryA','coursesItineraryB',
                                'coursesItineraryC','coursesItineraryD'));
                    }
                }
            }
            case Level::PROFESSIONAL_TRAINING: {
                return view('enrollment.create.professional-training', compact('courses'));
            }
            default:
                abort(403, __('No permissions'));
        }
    }

    /**
     * @param EnrollmentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EnrollmentRequest $request)
    {
       
        $student = auth()->user()->student;
        $grade = $student->grade;
        $student->fill([
            'grade_id' => $grade->id,
            'bus_stop_id' => $request->transportation == 1 ? $request->bus_stop_id : null,
        ])->save();

        $academicPeriodId = AcademicPeriod::latest('id')->first();

        $enrollment = Enrollment::create([
            'student_id' => $student->id,
            'grade_id' => $grade->id,
            'bus_stop_id' => $request->transportation == 1 ? $request->bus_stop_id : null,
            'repeat_course' => $request->repeat_course,
            'bilingual' => $request->bilingual,
            'previous_school' => $request->previous_school,
            'student_signature' => $request->student_signature,
            'second_tutor_signature' => $request->second_tutor_signature,
            'first_tutor_signature' => $request->first_tutor_signature,
            'academic_period_id' => $academicPeriodId->id
        ]);

        if($student->grade_id == Grade::FIRST_MIDDLE_SCHOOL || $student->grade_id == Grade::THIRD_MIDDLE_SCHOOL) {
            $levelCourses = Course::whereGradeId($student->grade_id)
                ->whereCourseTypeId(CourseType::COMMON)
                ->get();
            $enrollment->courses()->attach($levelCourses);
            $enrollment->courses()->attach($request->common_optional_course);
            $enrollment->courses()->attach($request->elective_courses);
        }

        if($student->grade_id == Grade::SECOND_MIDDLE_SCHOOL || $student->grade_id == Grade::SECOND_HIGH_SCHOOL) {
            $commonCoursesCore = Course::whereGradeId($student->grade_id)
                ->whereCourseTypeId(CourseType::CORE)
                ->get();
            $commonCoursesSpecific = Course::whereGradeId($student->grade_id)
                ->whereCourseTypeId(CourseType::SPECIFIC)
                ->get();
            $enrollment->courses()->attach($commonCoursesCore);
            $enrollment->courses()->attach($commonCoursesSpecific);
            $enrollment->courses()->attach($request->common_optional_course);
            $enrollment->courses()->attach($request->elective_courses);
        }

        if($student->grade_id == Grade::THIRD_HIGH_SCHOOL) {
            $commonCourses = Course::whereGradeId($student->grade_id)
                ->whereCourseTypeId(CourseType::COMMON)
                ->get();
            $commonCoursesAreas = Course::whereGradeId($student->grade_id)
                ->whereCourseTypeId(CourseType::COMMON_AREAS)
                ->get();

            $enrollment->courses()->attach($commonCourses);
            $enrollment->courses()->attach($commonCoursesAreas);
            $enrollment->courses()->attach($request->common_optional_course);
            $enrollment->courses()->attach($request->elective_courses);
        }

        if($grade->id == Grade::FOURTH_MIDDLE_SCHOOL){

            if($request->active==1)
            {
                if($request->active_option==1)
                {
                    $coursesItineraryA = Course::whereGradeId($student->grade_id)
                        ->whereGroupOne(Course::GROUP_COURSES_ONE_A)
                        ->whereGroupTwo(Course::GROUP_COURSES_TWO_A)
                        ->whereCourseTypeId(CourseType::ITINERARY)
                        ->get();
                    $enrollment->courses()->attach($coursesItineraryA);
                }else{
                    $coursesItineraryB = Course::whereGradeId($student->grade_id)
                        ->whereGroupOne(Course::GROUP_COURSES_ONE_A)
                        ->whereGroupTwo(Course::GROUP_COURSES_TWO_B)
                        ->whereCourseTypeId(CourseType::ITINERARY)
                        ->get();
                    $enrollment->courses()->attach($coursesItineraryB);
                }
            }
            else{
                $coursesItineraryC = Course::whereGradeId($student->grade_id)
                    ->whereGroupOne(Course::GROUP_COURSES_ONE_B)
                    ->whereGroupTwo(Course::GROUP_COURSES_TWO_A)
                    ->whereCourseTypeId(CourseType::ITINERARY)
                    ->get();

                $coursesItineraryD  = $request->core_itinerary_d;
                $enrollment->courses()->attach($coursesItineraryC);
                $enrollment->courses()->attach($coursesItineraryD);

            }

            $commonCoursesCore = Course::whereGradeId($student->grade_id)
                ->whereCourseTypeId(CourseType::CORE)
                ->get();

            $enrollment->courses()->attach($commonCoursesCore);
            $enrollment->courses()->attach($request->common_courses);
            $enrollment->courses()->attach($request->elective_courses);
            $enrollment->courses()->attach($request->elective_courses_free);

        }

        if($grade->id == Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY || $grade->id == Grade::FIRST_HIGH_SCHOOL_GENERAL){

            
            if($request->active==1)
            {
                $enrollment->courses()->attach($request->elective_courses);
            }
            else{
                $enrollment->courses()->attach($request->elective_courses);
                $enrollment->courses()->attach($request->elective_courses_free);
            }

           
            $commonCourses = Course::whereGradeId($student->grade_id)
                ->whereCourseTypeId(CourseType::COMMON)
                ->get();

             $modalitiesCourses = Course::whereGradeId($student->grade_id)
                ->whereCourseTypeId(CourseType::MODALITY)
                ->get(); 

            $enrollment->courses()->attach($commonCourses);
            $enrollment->courses()->attach($modalitiesCourses);
            $enrollment->courses()->attach($request->one_courses);
            if($request->modality==1){
                $coursesSpecific = Course::whereGradeId($student->grade_id)
                ->whereCourseTypeId(CourseType::COMMON_OPTIONAL)
                ->first();
                $enrollment->courses()->attach( $coursesSpecific->id);
            }
        }

        if($grade->id == Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES){

            
            if($request->active==1)
            {
                $enrollment->courses()->attach($request->elective_courses);
            }
            else{
                $enrollment->courses()->attach($request->elective_courses);
                $enrollment->courses()->attach($request->elective_courses_free);
            }

            if($request->active1==1)
            {
                $modalitiesCourses = Course::whereGradeId($student->grade_id)
                ->whereCourseTypeId(CourseType::ITINERARY_HUMANITIES)
                ->get();  
                $enrollment->courses()->attach($modalitiesCourses); 
                $enrollment->courses()->attach($request->one_courses);
            }
            else{
                $modalityOption = Course::whereGradeId($student->grade_id)
                ->whereCourseTypeId(CourseType::ITINERARY_SCIENCES)
                ->get();
                $enrollment->courses()->attach($modalityOption); 
                $enrollment->courses()->attach($request->one_courses2);
            }

           
                $commonCourses = Course::whereGradeId($student->grade_id)
                    ->whereCourseTypeId(CourseType::COMMON)
                    ->get();

                    
                $coursesItineraryA = Course::whereGradeId($student->grade_id)
                    ->whereCourseTypeId(CourseType::ITINERARY_HUMANITIES_OPTION)
                    ->get();

                    $enrollment->courses()->attach($commonCourses);
                    
                    $enrollment->courses()->attach($modalityOption);
                    if($request->modality==1){
                        $coursesSpecific = Course::whereGradeId($student->grade_id)
                        ->whereCourseTypeId(CourseType::COMMON_OPTIONAL)
                        ->first();
                        $enrollment->courses()->attach( $coursesSpecific->id);
                    }          
        }

        if($grade->id == Grade::SECOND_HIGH_SCHOOL_SCIENCE){

            
            if($request->active==1)
            {
                $enrollment->courses()->attach($request->elective_courses);
            }
            else{
                $enrollment->courses()->attach($request->elective_courses);
                $enrollment->courses()->attach($request->elective_courses_free);
            }

           
            $commonCourses = Course::whereGradeId($student->grade_id)
                ->whereCourseTypeId(CourseType::CORE)
                ->get();
            $enrollment->courses()->attach($commonCourses);
           
            if($request->active1==1){
                $modalitiesCourses = Course::whereGradeId($student->grade_id)
                ->whereCourseTypeId(CourseType::CORE_MODALITY_OPTION_ONE)
                ->get();  
                $enrollment->courses()->attach($modalitiesCourses);
            }

            if($request->active1==2){
                $modalitiesCourses2 = Course::whereGradeId($student->grade_id)
                ->whereCourseTypeId(CourseType::CORE_MODALITY_OPTION_TWO)
                ->get();
                $enrollment->courses()->attach($modalitiesCourses2);
            }

            if($request->active1==3){
                $modalitiesCourses3 = Course::whereGradeId($student->grade_id)
                ->whereCourseTypeId(CourseType::CORE_MODALITY_OPTION_THIRD)
                ->get();  
                $enrollment->courses()->attach($modalitiesCourses3);
            }

            if($request->active1==4){                
                $modalitiesCourses4 = Course::whereGradeId($student->grade_id)
                ->whereCourseTypeId(CourseType::CORE_MODALITY_OPTION_FOURTH)
                ->get(); 
                $enrollment->courses()->attach($modalitiesCourses4);
            }

            if($request->active1==5){                
                $modalitiesCourses5 = Course::whereGradeId($student->grade_id)
                ->whereCourseTypeId(CourseType::CORE_MODALITY_OPTION_FIVE)
                ->get(); 
                $enrollment->courses()->attach($modalitiesCourses5);
            }
          
        }
        return redirect()->route('dashboard.index')->with('message', ['type' => 'success', 'description' => __('Registration process successfully finished')]);
    }

    public function show(Enrollment $enrollment){
        $courses = $enrollment->courses;
        $levelCourses = $courses->filter(function ($value) {
            return $value->course_type_id == CourseType::COMMON || $value->course_type_id == CourseType::COMMON_OPTIONAL;
        });

        $electiveCourses = $courses->filter(function ($value) {
            return $value->course_type_id == CourseType::ELECTIVE;
        });

        $academicCourses = $courses->filter(function ($value) {
            return $value->course_type_id == CourseType::ACADEMIC;
        });

        $appliedCourses = $courses->filter(function ($value) {
            return $value->course_type_id == CourseType::APPLIED;
        });

        $freeConfigurationCourses = $courses->filter(function ($value) {
            return $value->course_type_id == CourseType::FREE_CONFIGURATION;
        });

        $specificFreeConfigurationCourses = $courses->filter(function ($value) {
            return $value->course_type_id == CourseType::SPECIFIC_FREE_CONFIGURATION;
        });

        $coreCourses = $courses->filter(function ($value) {
            return $value->course_type_id == CourseType::CORE;
        });

        return view('enrollment.show',
            compact('enrollment', 'levelCourses',
                'electiveCourses', 'academicCourses', 'appliedCourses', 'freeConfigurationCourses',
                'specificFreeConfigurationCourses', 'coreCourses')
        );
    }

    public function export(Enrollment $enrollment){
        $pdf = \PDF::loadView('template_pdf.enrollment', ['enrollment' => $enrollment]);
        $pdfName = Str::slug($enrollment->student->user->name.' '.$enrollment->student->paternal_surname.' '.$enrollment->student->maternal_surname,'-');
        return $pdf->download($pdfName.'.pdf');
    }

    public function signature()
    {
        $baseFrom = request()->sign;
        $img = getB64Image($baseFrom);
        $extension = getB64Extension($baseFrom);
        $imageName = 'sign'. time() . '.' . $extension;
        Storage::put('signatures/' . $imageName, $img);
        return response()->json(['status' => __('Signature register successfully'), 'name'=> $imageName]);
    }
}
