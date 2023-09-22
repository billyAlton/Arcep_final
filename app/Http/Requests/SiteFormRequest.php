<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id'=>['required'],	
            'localite_id'=>['required'],
            'id_site'=>['required'],
            'nomdesite'=>['required'],
            'longitude'=>['required'],
            'latitude'=>['required'],/* 
            'departement'=>['required'],
            'commune'=>['required'],
            'arrondissement'=>['required'], */
            'quartier'=>['required'],
            'camouflage'=>['required'],
            'description'=>['required'],
            'dossier'=>['required'],
            'date_soumission'=>['required'],
            'date_autorisation'=>['required'],
            'proprietaire'=>['required'],
            'emplacement'=>['required'],
            'type'=>['required'],
            'statut'=>['required'],
            'ref_courrier'=>['required'],
            'observation'=>['required'],
            'valide'=>['required'],
            'conforme'=>['required'],
            'image'=>['required']
        ];
    }
}
