<?php

namespace App\Http\Requests;

use App\Models\Configuration;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{

    protected $errorBag = 'registration';
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
        $general = Configuration::first();
        return [
            'reffered_by' => 'sometimes',
            'username' => 'required|unique:users',
            'username2' => 'required|unique:users',
            'phone' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => ['required', 'confirmed', 'min:8'],
            'g-recaptcha-response' => Rule::requiredIf($general->allow_recaptcha == 1)
        ];

    }

    public function messages()
    {
        return [
            'username2.required' => 'This username has already been taken',
            'phone.required' => 'This phone has already been taken',
            'g-recaptcha-response.required' => 'You Have To fill recaptcha'
        ];
    }
    public function attributes()
    {
        return [
            'username2' => 'username', // Change the name of 'username2'
            'phone' => 'phone', // Change the name of 'phone'
        ];
    }
}
