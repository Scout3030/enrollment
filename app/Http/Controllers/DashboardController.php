<?php

namespace App\Http\Controllers;

use App\Models\AcademicPeriod;
use App\Models\Level;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $now = now();

        $activeProcess = collect([]);

        $lastProcess = AcademicPeriod::whereLevelId(Level::MIDDLE_SCHOOL)
            ->latest('id')
            ->first();
        if($lastProcess){
            if ( $lastProcess->status && ($lastProcess->started_at<= $now && $now <= $lastProcess->finished_at) ) {
                $activeProcess = $activeProcess->push($lastProcess);
            }
        }

        $lastProcess = AcademicPeriod::whereLevelId(Level::BACHELOR)
            ->latest('id')
            ->first();
        if($lastProcess){
            if ( $lastProcess->status && ($lastProcess->started_at<= $now && $now <= $lastProcess->finished_at) ) {
                $activeProcess = $activeProcess->push($lastProcess);
            }
        }

        $lastProcess = AcademicPeriod::whereLevelId(Level::EDUCATIONAL_CYCLE)
            ->latest('id')
            ->first();
        if($lastProcess){
            if ( $lastProcess->status && ($lastProcess->started_at<= $now && $now <= $lastProcess->finished_at) ) {
                $activeProcess = $activeProcess->push($lastProcess);
            }
        }

        return view('dashboard.index', compact('activeProcess'));
    }
}
