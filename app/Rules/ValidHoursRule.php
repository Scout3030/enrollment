<?php

namespace App\Rules;

use App\Models\Course;
use Illuminate\Contracts\Validation\Rule;

class ValidHoursRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $sum = 0;
        foreach ($value as $key => $courseArray){
            $course = Course::whereId($courseArray['course_id'])->first();
            $sum += $course->duration;
        }
        return $sum == 7;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('Please provide a right combination of specific and free configuration courses');
    }
}
