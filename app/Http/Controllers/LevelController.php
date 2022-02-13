<?php

namespace App\Http\Controllers;

use App\Http\Resources\LevelResource;
use App\Models\Level;

class LevelController extends Controller
{
    public function index()
    {
        $grades = Level::get();
        if(request()->ajax()){
            return LevelResource::collection($grades);
        }
    }
}
