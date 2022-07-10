<?php

namespace App\Http\Controllers;

use App\Http\Resources\GradesByLevelResource;
use App\Models\Grade;
use App\Models\Level;

class GradeController extends Controller
{
    public function gradesByLevel(Level $level)
    {
        $grades = Grade::whereLevelId($level->id)->active()->get();
        if(request()->ajax()){
            return GradesByLevelResource::collection($grades);
        }
    }
}
