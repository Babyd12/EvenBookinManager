<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterAssociationRequest extends FormRequest
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
            'logo' => ['image'],
            'nom' => ['required', 'string', 'min:2'],
            'slogan' => ['required', 'string', 'min:2'],
            'email' => ['required', 'email'],
            'telephone' => ['required', 'integer' ],
            'mot_de_passe' => ['required', 'string'],
        ];
    }
}
