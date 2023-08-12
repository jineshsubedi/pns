<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'sometimes',
            'phone' => 'sometimes', 
            'logoFile' => 'sometimes|nullable|max:2048|mimes:png,jpg,jpeg',
            'iconFile' => 'sometimes|nullable|max:2048|mimes:png,jpg,jpeg',
            'description_limit' => 'sometimes|nullable',
            'item_perpage' => 'sometimes|nullable',
            'status' => 'required|in:0,1',
        ];
    }
}
