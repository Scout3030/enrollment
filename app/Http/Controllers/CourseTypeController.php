<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseTypeResource;
use App\Models\Level;

class CourseTypeController extends Controller
{
    public function courseTypesByLevel(Level $level)
    {
        $courseTypes = $level->courseTypes;
        if(request()->ajax()){
            return CourseTypeResource::collection($courseTypes);
        }
    }
}
