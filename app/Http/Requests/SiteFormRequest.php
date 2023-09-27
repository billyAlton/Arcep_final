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
            'id_site'=>['required'],
            'nomdesite'=>['required'],
            'longitude'=>['required'],
            'latitude'=>['required'],
            'camouflage'=>['required'],
            'description'=>['required'],
            'dossier'=>['required'],
            'date_soumission'=>['required'],
            'date_autorisation'=>['nullable'],
            'proprietaire'=>['nullable'],
            'autre_proprietaire'=>['nullable'],
            'emplacement'=>['required'],
            'type'=>['required'],
            'statut'=>['nullable'],
            'ref_courrier'=>['nullable'],
            'observation'=>['nullable'],
            'sensible'=>['required'],
            'conforme'=>['required'],
            'autre_site'=>['required'],
            'dossier_camouflage'=>['nullable'],
            'image'=>['image','nullable'],
            'localite'=>['required']
        ];
    }
}
