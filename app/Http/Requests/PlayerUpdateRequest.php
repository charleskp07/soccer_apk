<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerUpdateRequest extends FormRequest
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
            
            'passport_photo' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
            'lastname' =>'min:2|max:255',
            'firstname' =>'min:2|max:255',
            'age' =>'min:1|max:2',
            'weight' =>'max:4',
            'size' =>'max:3',
            'country_of_origin' =>'min:2|max:255',
            
        ];
    }

    public function messages(): array
    {
        return [
            'passport_photo.mimes' => "Format non prise en charge",
            'passport_photo.max' => "Taille maximale 2 Mo",
            'lastname.min' => "Au moins 2 caractères pour le nom.", 
            'lastname.max' => "Au plus 128 caractères pour le nom.",    
            'firstname.min' => "Au moins 2 caractères pour le prénom.", 
            'firstname.max' => "Au plus 128 caractères pour le prénom.", 
            'age.min' => "minimum 1 chiffres pour l'âge.",
            'age.max' => "maximum 2 chiffres pour l'âge.",
            'weight.max' => "maximum 4 chiffres pour le poids.",
            'size.max' => "maximum 3 chiffres pour la taille.",       
        ];
    }
}
