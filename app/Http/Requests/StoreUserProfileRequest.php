<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserProfileRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', "alpha", "min:2", "max:255"],
            'address' => ['required', "min:2", "max:255"],
            "dob" => ["required", "before:today"],
            'mobile_no' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            "profile_url" => ["image", "mimes:jpg,png,jpeg,gif,svg", "max:2048"],
        ];
    }
}
