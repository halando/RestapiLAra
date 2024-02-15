<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterChecker extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|max:50",
            "email" => "required|email",
            "password" => "required|min:6",
            "confirmed_password"=> "required|same:password"

        ];
    }
    public function messages(){
        return[
                "name.require" => "Név elvárt",
                "name.max" => "Túl hosszú név",
                "email.required"=> "email elvárt",
                "email.email" => "Nem valós email",
                "password" => "Jelszó elvárt",
                "password.min" => "Jelszó túl rövid",
                "confirm_password.required" => "Jelszó megerősítés elvárt",
        ]
    }
}
