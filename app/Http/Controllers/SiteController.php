<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteFormRequest;
use App\Models\Localite;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class SiteController extends Controller
{
  public function index()
  {
    $sites = Site::with('localite')->get();
    return view('users.index', compact('sites'));
  }
  public function create()
  {
    $localites = Localite::all();
    return view('users.create_site', compact('localites'));
  }

  public function store(SiteFormRequest $request)
  {
    $site = new Site;
    $localite = Localite::findorFail($request->localite);
    $site->id_site = $request->id_site;
    $site->nomdesite = $request->nomdesite;
    $site->longitude = $request->longitude;
    $site->latitude = $request->latitude;
    $site->departement = $localite->departement;
    $site->commune = $localite->commune;
    $site->arrondissement = $localite->arrondissement;
    $site->quartier = $localite->quartier;
    $site->camouflage = $request->camouflage;
    $site->description = $request->description;
    $site->numdossier = $request->dossier;
    $site->date_soumission = $request->date_soumission;
    $site->date_autorisation = $request->date_autorisation;
    $site->proprietaire = $request->proprietaire;
    $site->autre_proprietaire = $request->autre_proprietaire;
    $site->emplacement = $request->emplacement;
    $site->type = $request->type;
    $site->statut = $request->statut;
    $site->ref_courrier = $request->ref_courrier;
    $site->observation = $request->observation;
    $site->sensible = $request->sensible;
    $site->conforme = $request->conforme;
    $site->autre_site = $request->autre_site;
    $site->dossier_camouflage = $request->dossier_camouflage;
    $currentDateTime = date('Y-m-d');
    $image = UploadedFile::class;
    $image = $request->validated('image');
    $image_name = $currentDateTime . $request->validated('image')->getClientOriginalName();
    if ($image != null and !$image->getError()) {
      $image->storeAS('public/sites', $image_name);
    }
    $site->image = $image_name;
    $site->localite_id = $request->localite;
    $statut = "";
    if ($request->sensible == 'oui' || $request->conforme == 'non') {
      $statut = 'Site rejete';
    } else {
      if ($request->autre_site == 'non') {
        if ($request->camouflage == 'non') {
          $statut = 'Site valide';
        } else if ($request->camouflage == 'oui') {
          if ($request->dossier_camouflage == 'oui') {
            $statut = 'Site valide';
          } else if ($request->dossier_camouflage == 'non' || $request->dossier_camouflage == "") {
            $statut = 'Site rejete';
          }
        }
      } else if ($request->autre_site == 'oui') {
        $statut = 'Invitation pour colocation';
      }
    }

    $site->statut = $statut;
    $site->save();
    return to_route('site.index');
  }
  public function edit(site $site)
  {
    $localites = Localite::all();
    return view('users.edit_site', compact('localites', 'site'));
  }

  public function update(site $site, SiteFormRequest $request)
  {
    $site = new Site;
    $currentDateTime = date('Y-m-d');
    if (!$request->validated('image') == null) {
      $image = UploadedFile::class;
      $image = $request->validated('image');
      $image_name = $currentDateTime . $request->validated('image')->getClientOriginalName();
      if ($image != null and !$image->getError()) {
        $image->storeAS('public/sites', $image_name);
      }
    } else {
      $image_name = $site->image;
    }
    $localite = Localite::findorFail($request->localite);
    $statut = "";
    if ($request->sensible == 'oui' || $request->conforme == 'non') {
      $statut = 'Site rejete';
    } else {
      if ($request->autre_site == 'non') {
        if ($request->camouflage == 'non') {
          $statut = 'Site valide';
        } else if ($request->camouflage == 'oui') {
          if ($request->dossier_camouflage == 'oui') {
            $statut = 'Site valide';
          } else if ($request->dossier_camouflage == 'non' || $request->dossier_camouflage == "") {
            $statut = 'Site rejete';
          }
        }
      } else if ($request->autre_site == 'oui') {
        $statut = 'Invitation pour colocation';
      }
    }
    $site->update([
      'id_site' => $request->validated('id_site'),
      'nomdeSite' => $request->validated('nomdeSite'),
      'longitude' => $request->validated('longitude'),
      'latitude' => $request->validated('latitude'),
      'conforme' => $request->validated('conforme'),
      'departement' => $localite->departement,
      'commune' => $localite->commune,
      'arrondissement' => $localite->arrondissement,
      'quartier' => $localite->quartier,
      'camouflage' => $request->validated('camouflage'),
      'description' => $request->validated('description'),
      'numdossier' => $request->validated('numdossier'),
      'date_soumission' => $request->validated('date_soumission'),
      'date_autorisation' => $request->validated('date_autorisation'),
      'proprietaire' => $request->validated('proprietaire'),
      'autre_proprietaire' => $request->validated('autre_proprietaire'),
      'emplacement' => $request->validated('emplacement'),
      'type' => $request->validated('type'),
      'statut' => $statut,
      'ref_courrier' => $request->validated('ref_courrier'),
      'observation' => $request->validated('observation'),
      'image' => $image_name,
      'localites_id' => $request->validated('localite')
    ]);
    return to_route('site.index');
  }
  public function destroy(site $site)
  {
    $nomcomplet = $site->NomDesite . "  de " . $site->proprietaire;
    $site->delete();
    return back()->with("Successdelete", "Le site  $nomcomplet supprimer avec succes");
  }



  public function show(site $site)
  {
    return view('users.detail', compact('site'));
  }
  public function download(site $site)
  {
    $pdf = PDF::loadView('pdf.certificat', array('Element' => $site))->setPaper('a4', 'Portrait');
    return $pdf->stream('Certificat');
  }
}
