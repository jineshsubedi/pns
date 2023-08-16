<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExmployeeEducationRequest extends FormRequest
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
            'level'      => 'required',
            'university' => 'required',
            'address'    => 'sometimes',
            'faculty'    => 'sometimes',
            'start'      => 'required|date',
            'end'        => 'sometimes|date|nullable',
        ];
    }
}
