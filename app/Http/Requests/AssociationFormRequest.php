<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssociationFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'slogan'=> ['required', 'string'],
            'nom'=> ['required', 'string'],
            'email'=> ['required', 'email'],
            'phone'=> ['required', 'number'],
            'logo'=> ['required', 'string'],
            'mot_de_passe'=> ['required', 'string'],
            'date_de_creation'=> ['required', 'date'],
            
        ];
    }
}
