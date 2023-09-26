<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteFormRequest;
use App\Models\Localite;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\PDF;

class SiteController extends Controller
{
    public function index(){
        $sites=Site::with('localite')->get();
        return view('users.index',compact('sites'));
    }
    public function create(){
        $localites=Localite::all();
        return view('users.ajout_site',compact('localites'));
    }

    public function store(SiteFormRequest $request){
        $site=new Site;
        $localite=Localite::findorFail($request->localite);
        $site->id_site=$request->id_site;
        $site->nomdesite=$request->nomdesite;
        $site->longitude=$request->longitude;
        $site->latitude=$request->latitude;
        $site->departement=$localite->departement;
        $site->commune=$localite->commune;
        $site->arrondissement=$localite->arrondissement;
        $site->quartier=$localite->quartier;
        $site->camouflage=$request->camouflage;
        $site->description=$request->description;
        $site->numdossier=$request->dossier;
        $site->date_soumission=$request->date_soumission;
        $site->date_autorisation=$request->date_autorisation;
        $site->proprietaire=$request->proprietaire;
        $site->autre_proprietaire=$request->autre_proprietaire;
        $site->emplacement=$request->emplacement;
        $site->type=$request->type;
        $site->statut=$request->statut;
        $site->ref_courrier=$request->ref_courrier;
        $site->observation=$request->observation;
        $site->sensible=$request->sensible;
        $site->conforme=$request->conforme;
        $site->autre_site=$request->autre_site;
        $site->dossier_camouflage=$request->dossier_camouflage;
        $image= UploadedFile::class ;
        $image=$request->validated('image');
        if($image!=null and !$image->getError()){
           $site->image= $image->store('sites', 'public'); 
        }
        $site->image=$request->image;
        $site->localite_id=$request->localite;
        $statut="";
        if ($request->sensible=='oui' || $request->conforme=='non') {
            $statut='Site rejete'; 
            
          }
          if($request->autre_site=='non'){
              if($request->camouflage=='non'){
                $statut='Site valide';
                
              }
              else if($request->camouflage=='oui'){
                  if($request->dossier_camouflage=='oui'){
                    $statut='Site valide';
                    
                  }
                  else if($request->dossier_camouflage=='non' || $request->dossier_camouflage==""){
                    $statut='Site rejete';
                    
                  }
              }
          }
          else if($request->autre_site=='oui'){
            $statut='Invitation pour colocation';
        }
        $site->statut=$statut;
        $site->save();
    }

    public function download(site $element){
            $pdf= PDF::loadView('pdf.certificat',array('Element'=>$element))->setPaper('a4','Portrait');
             return $pdf->stream('Certificat');
       
    }
}
