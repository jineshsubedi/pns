<?php

namespace App\Http\Requests\front;

use Illuminate\Foundation\Http\FormRequest;

class EmployerSignupRequest extends FormRequest
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
            'name'     => 'required',
            'email'    => 'required',
            'password' => 'required',
            'address'  => 'sometimes|nullable',
            'phone'    => 'sometimes|nullable',
        ];
    }
}