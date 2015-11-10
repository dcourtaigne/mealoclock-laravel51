<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EventRequest extends Request
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
            'title' => 'required|min:3',
            'details' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required',
            'guests' => 'required',
            'communitie_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Vous devez saisir un titre!',
            'title.min' => 'Le titre doit avoir au moins 3 caractères!',
            'details.required' => 'Vous devez saisir une description!',
            'date.required' => 'Vous devez saisir une date!',
            'date.date' => 'Vous devez saisir un date au format JJ-MM-AAAA!',
            'time.required' => 'Vous devez saisir une heure!',
            'location.required' => 'Vous devez choisir un arrondissement!',
            'guests.required' => 'Vous devez indiquer le nombre de participant!',
            'communitie_id.required' => 'Vous devez choisir une communauté!'
        ];
    }
}
