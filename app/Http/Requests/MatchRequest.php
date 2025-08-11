<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatchRequest extends FormRequest
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
            
            'competition' => 'required|string|max:255',
            'matchDate' => 'required|after_or_equal:today',
            'stadium' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'team_one' => 'required|string|max:255',
            'team_two' => 'required|string|max:255',
            'referee'=>'nullable',
        ];
    }

    public function messages(): array
    {
        return [

            'competition.required' => "Le lieu du match est obligatoire.",
            'competition.string' => "Le lieu doit être une chaîne de caractères.",
            'competition.max' => "Le lieu ne peut excéder 255 caractères.",
            

            
            // Date et heure
            'matchDate.required' => "La date du match est obligatoire.",
            'matchDate.after_or_equal' => "La date ne peut pas être dans le passé.",
            
            
            // Lieu
            'location.required' => "Le lieu du match est obligatoire.",
            'location.string' => "Le lieu doit être une chaîne de caractères.",
            'location.max' => "Le lieu ne peut excéder 255 caractères.",
            'location.regex' => "Le lieu contient des caractères non autorisés.",
                        

            'team_one.required' => "Le nom de l'équipe à domicile est obligatoire.",
            'team_one.string' => "Le nom de l'équipe doit être une chaîne de caractères.",
            'team_one.max' => "Le nom de l'équipe ne peut excéder 255 caractères.",
            'team_one.different' => "L'équipe 1 et 2 être différentes.",
            
            'team_two.required' => "Le nom de l'équipe visiteuse est obligatoire.",
            'team_two.string' => "Le nom de l'équipe doit être une chaîne de caractères.",
            'team_two.max' => "Le nom de l'équipe ne peut excéder 255 caractères.",

        ];
    }
}
