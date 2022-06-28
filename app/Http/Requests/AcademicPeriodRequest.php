<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class AcademicPeriodRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        $startedAt = Carbon::parse($this->started_at_date)->format('d-m-Y');
        $startedAt = $startedAt." ".date("H:i:s", strtotime($this->started_at_time));

        $finishedAt = Carbon::parse($this->finished_at_date)->format('d-m-Y');
        $finishedAt = $finishedAt." ".date("H:i:s", strtotime($this->finished_at_time));

        $this->merge([
            'started_at' => Carbon::parse($startedAt),
            'finished_at' => Carbon::parse($finishedAt),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required|string",
            "level_id" => "required|exists:levels,id",
            "description" => "nullable|string",
            "started_at" => "required|date",
            "finished_at" => "required|date|after:started_at",
            "status" => "required",
        ];
    }
}
