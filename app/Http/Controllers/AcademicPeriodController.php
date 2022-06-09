<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\DataTables\AcademicPeriodDataTable;
use App\Http\Requests\AcademicPeriodRequest;
use App\Models\AcademicPeriod;
use App\Models\Enrollment;

class AcademicPeriodController extends Controller
{
    /**
     * @param AcademicPeriodDataTable $dataTable
     * @return mixed
     */
    public function index(AcademicPeriodDataTable $dataTable)
    {
        return $dataTable->render('academic-period.index');
    }

    public function create()
    {
        $academicPeriod = new AcademicPeriod();
        return view('academic-period.form', compact('academicPeriod'));
    }

    /**
     * @param AcademicPeriodRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AcademicPeriodRequest $request): \Illuminate\Http\RedirectResponse
    {
        AcademicPeriod::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'started_at' => $request->started_at,
            'finished_at' => $request->finished_at,
        ]);

        return back()->with('message', ['type' => 'success', 'description' => __('Academic period created successfully')]);
    }

    public function edit(AcademicPeriod $academicPeriod)
    {
        return view('academic-period.form', compact('academicPeriod'));
    }

    /**
     * @param AcademicPeriodRequest $request
     * @param AcademicPeriod $academicPeriod
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AcademicPeriodRequest $request, AcademicPeriod $academicPeriod): \Illuminate\Http\RedirectResponse
    {
        $academicPeriod->fill($request->input())->save();

        return back()->with('message', ['type' => 'success', 'description' => __('Academic period edited successfully')]);
    }

    public function changeStatus(Request $request): \Illuminate\Http\JsonResponse
    {
        $academicPeriod = AcademicPeriod::findOrFail($request->id);
        $academicPeriod->status = !$academicPeriod->status;
        $academicPeriod->save();
        return response()->json(__('Status period  updates successfully'));
    }

    /**
     * @param AcademicPeriod $academicPeriod
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(AcademicPeriod $academicPeriod)
    {
        try {
            $academicPeriod->delete();
            return back()->with('message', ['type' => 'success', 'description' => __('Academic period deleted successfully')]);
        } catch (\Exception $e) {
            return back()->withErrors(__('Can not delete this period'));
        }
    }
}
