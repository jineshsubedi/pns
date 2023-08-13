<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacancyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'specification' => 'required',
            'type' => 'required',
            'employer_id' => 'required',
            'category_id' => 'required',
            'start_date' => 'required|before_or_equal:end_date',
            'end_date' => 'required|after_or_equal:start_date',
            'position'  => 'sometimes',
            'salary'    => 'sometimes',
            'status'    => 'required|in:0,1',
            'negotiable'=> 'required|in:0,1',
            'logoFile' => 'sometimes|mimes:jpg,png,jpeg|max:2048'
        ];
    }
}
