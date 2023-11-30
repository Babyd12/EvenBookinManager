<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvenementFormRequest extends FormRequest
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
            'image_mise_en_avant'=> ['image'],
            'libelle'=> ['required', 'string'],
            'date_evenement'=> ['required', 'date'],
            'date_limite_inscription'=> ['required', 'date'],
            'est_cloturer_ou_pas'=> ['required', 'integer'],
            'association_id'=> ['required', 'integer'],
        ];
    }
}
