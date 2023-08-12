<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'password' => 'required',
            'roles.*' => 'sometimes'
        ];
        if($this->getMethod() =='POST') {
            $rules += [
                'email' => 'required|email',
            ];
        }

        if($this->getMethod() == 'PUT') {
            $rules += [
                'email' => 'required|unique:users,emaul,'.$this->user->id.',id',
            ];
        }

        return $rules;
    }
}
