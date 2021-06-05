<?php

namespace App\Http\Requests\Schedule;

use Illuminate\Foundation\Http\FormRequest;

class UpdateScheduleRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'start_at' => ['required', 'date_format:H:i:s'],
            'end_at' => ['required', 'after:start_at'],
            'break_start_at' => ['required', 'date_format:H:i:s', 'after:start_at'],
            'break_end_at' => ['required', 'after:break_start_at'],
            'is_offday' => ['required', 'boolean'],
        ];
    }
}
