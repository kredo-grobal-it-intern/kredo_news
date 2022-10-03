<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$this->id,
            'nationality' => 'required',
            'country' => 'required',
            'description' => 'max:255',
            'avatar' => 'max:1048|mimes:png,jpg,jpeg,gif',
        ];
    }
}
