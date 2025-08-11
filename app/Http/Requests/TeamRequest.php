<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'name' =>'required|unique:teams|max:255',
            'team_badge' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
            'effectif' => 'nullable|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'team_badge.mimes' => "Format non prise en charge",
            'team_badge.max' => "Taille maximale 2 Mo",
            'name.required' => "Renseigne ton nom si tu ne veux pas m'énerver ! J'ai pas encore mangé hein ...",
            'name.min' => "Au moins 2 caractères pour le nom.", 
            'name.max' => "Au plus 128 caractères pour le nom.",    
            'effectif.min' => "Au moins 1 joueur" ,      
        ];
    }
}
