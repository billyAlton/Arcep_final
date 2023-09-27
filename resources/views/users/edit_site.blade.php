@extends('layouts.master')
@section('title','Modifier un site')
@section('content')
<body>
  <div style="font-family:'Times New Roman', Times, serif">
    <div class="mt-2 mb-2">
      @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
      @endif
      @if(session()->has("Success"))
        <div class="alert alert-success">
          <h4>{{session()->get('Success')}}</h4>
        </div>
      @endif
    </div>
    <form method="POST" action="{{route('site.update',['site'=>$site->id])}}" enctype="multipart/form-data" class="vstack gap-2 container">
      @csrf
      @method('put')
      <div class="row">
        <div class="col">
          <label for="Nom du site" class="form-label">Nom du site</label>
          <input type="text" class="form-control" id="Nom du site" placeholder="La roche" name="nomdesite" value="{{$site->nomdesite}}">
          @error('nomdesite') <small style="color:red">{{$message}}</small>@enderror
        </div>
        <div class="col">
          <label for="id_site" class="form-label">ID du site</label>
          <input type="text" class="form-control" id="id_site" placeholder="XXXXX" name="id_site" value="{{$site->id_site}}">
          @error('id_site') <small style="color:red">{{$message}}</small>@enderror
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="longitude" class="form-label">Longitude</label>
          <input type="text" class="form-control" id="longitude" placeholder="12.452" name="longitude" value="{{$site->longitude}}">
          @error('longitude') <small style="color:red">{{$message}}</small>@enderror
        </div>
        <div class="col">
          <label for="latitude" class="form-label">Latitude</label>
          <input type="text" class="form-control" id="latitude" placeholder="13.456" name="latitude" value="{{$site->latitude}}">
          @error('latitude') <small style="color:red">{{$message}}</small>@enderror
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-6">
          <label for="localite" class="form-label">Localite</label>
          <select {{-- class="js-example-basic-single form-select form-select mb-2" --}} id="select-beast" aria-label=".form-select-sm example" name="localite" >
            <option value="" selected disabled>Choisir une localite</option>
          @foreach($localites as $localite){
            <option value="{{$localite->id}}" @if ($site->localite_id==$localite->id)
                {{"selected"}}
            @endif >{{$localite->departement}} {{$localite->commune}} {{$localite->arrondissement}} {{$localite->quartier}}</option>
          }
          @endforeach
          </select>
          @error('localite') <small style="color:red">{{$message}}</small>@enderror
        </div>
        <div class="col-md-3">
          <label for="localite" class="form-label">Proprietaire</label>
          <select class="form-select form-select" aria-label=".form-select-sm example" name="proprietaire">
            <option selected value=""></option>
            <option @if ($site->proprietaire=="SPACETEL BENIN")
                {{"selected"}}
            @endif value="SPACETEL BENIN">SPACETEL BENIN</option>
            <option @if ($site->proprietaire=="MOOV AFRICA BENIN")
                {{"selected"}}
            @endif value="MOOV AFRICA BENIN">MOOV AFRICA BENIN</option>
            <option @if ($site->proprietaire=="SBIN")
                {{"selected"}}
            @endif value="SBIN">SBIN</option>
          </select>
          @error('proprietaire') <small style="color:red">{{$message}}</small>@enderror
        </div>
        <div class="col md 3">
          <label for="autre_proprietaire" class="form-label">Autre proprietaire</label>
          <input type="text" class="form-control" id="autre_proprietaire" placeholder="" name="autre_proprietaire" value="{{$site->autre_proprietaire}}">
          @error('proprietaire') <small style="color:red">{{$message}}</small>@enderror
        </div>
      </div>
       
      <div class="row">
        <div class="col">
          <label for="dossier" class="form-label">N° de Dossier </label>
          <input type="text" class="form-control" id="dossier" placeholder="XXXX-XXXX-XXXXX-XXXX" name="dossier" value="{{$site->numdossier}}">
          @error('dossier') <small style="color:red">{{$message}}</small>@enderror
        </div>
        <div class="col">
          <label for="localite" class="form-label">Date de soumission</label>
          <input type="date" class="form-control" placeholder="XX/XX/XX" name="date_soumission" value="{{$site->date_soumission}}">
          @error('date_soumission') <small style="color:red">{{$message}}</small>@enderror
        </div>
        <div class="col">
          <label for="inputCity" class="form-label">Date d'autorisation</label>
          <input type="date" class="form-control"  placeholder="XX/XX/XX" name="date_autorisation" value="{{$site->date_autorisation}}">
            @error('date_autorisation') <small style="color:red">{{$message}}</small>@enderror
          </div>
      </div>
  
      <div class="row">
        <div class="col">
          <label for="inputCity" class="form-label">Emplacement</label>
            <select class="form-select form-select" aria-label=".form-select-sm example" name="emplacement" >
            <option value="" selected disabled>Choisir l'emplacement du pylone</option>
            <option @if ($site->emplacement=="Toit")
                {{"selected"}}
            @endif value="Toit">Toit</option>
            <option @if ($site->emplacement=="Sol")
                {{"selected"}}
            @endif value="Sol">Sol</option>
            <option @if ($site->emplacement=="Facade")
                {{"selected"}}
            @endif value="Facade">Facade</option>
            </select>
            @error('emplacement') <small style="color:red">{{$message}}</small>@enderror
          </div>
        <div class="col">
          <label for="inputCity" class="form-label">Image</label>
          <input type="file" class="form-control" id="inputCity" name="image" value="{{old('image')}}">
          @error('image') <small style="color:red">{{$message}}</small>@enderror
        </div>
      </div>
      
      <div class="row">
        <div class="col">
          <label for="inputCity" class="form-label">Type de pylone</label>
            <select class="form-select form-select" aria-label=".form-select-sm example" name="type">
            <option value="" selected disabled>Choisir le type de pylone</option>
            <option @if ($site->type=="autoportee")
                {{"selected"}}
            @endif value="autoportee">Autoportée</option>
            <option @if ($site->type=="haubane")
                {{"selected"}}
            @endif value="haubane">Haubané</option>
            <option @if ($site->type=="mat")
                {{"selected"}}
            @endif value="mat">Mat</option>
            </select>
            @error('type') <small style="color:red">{{$message}}</small>@enderror
          </div>
          <div class="col">
          <label for="inputCity" class="form-label">Observation</label>
            <select class="form-select form-select" aria-label=".form-select-sm example" name="observation">
            <option selected disabled value="">Observation</option>
            <option @if ($site->observation=="Transmis pour inspection à la DAF")
                {{"selected"}}
            @endif value="Transmis pour inspection à la DAF">Transmis pour inspection à la DAF</option>
            <option value="N/A">N/A</option>
            </select>
            @error('observation') <small style="color:red">{{$message}}</small>@enderror
          </div>
      </div>
      <div class="col">
        <input type="hidden" class="form-control" id="inputCity" name="statut" value="{{old('statut')}}">
        @error('statut') <small style="color:red">{{$message}}</small>@enderror
      </div>
      <div class="row">
        <div class="col">
          <label for="inputCity" class="form-label">Structure sensible < 100m</label>
            <select class="form-select form-select disable" aria-label=".form-select-sm example" id="sensible" name="sensible">
              <option value=""></option>
              <option @if ($site->sensible=="oui")
                {{"selected"}}
            @endif value="oui">Oui</option>
              <option @if ($site->sensible=="non")
                {{"selected"}}
            @endif value="non">Non</option>
            </select>
            @error('valide') <small style="color:red">{{$message}}</small>@enderror
          </div>
          <div class="col">
          <label for="inputCity" class="form-label">Respecte regle electromagnetique</label>
            <select class="form-select form-select" aria-label=".form-select-sm example" id="conforme" name="conforme">
              <option value=""></option>
              <option @if ($site->conforme=="oui")
                {{"selected"}}
            @endif value="oui">Oui</option>
              <option @if ($site->conforme=="non")
                {{"selected"}}
            @endif value="non">Non</option>
            </select>
            @error('conforme') <small style="color:red">{{$message}}</small>@enderror
          </div>
          <div class="col">
          <label for="inputCity" class="form-label">Autre site < 200m</label>
            <select class="form-select form-select" aria-label=".form-select-sm example" id="autre_site" name="autre_site">
              <option value=""></option>
              <option @if ($site->autre_site=="oui")
                {{"selected"}}
            @endif value="oui">Oui</option>
              <option @if ($site->autre_site=="non")
                {{"selected"}}
            @endif value="non">Non</option>
            </select>
            @error('autre_site') <small style="color:red">{{$message}}</small>@enderror
          </div>
          <div class="col">
          <label for="inputCity" class="form-label">Camouflage ?</label>
            <select class="form-select form-select" aria-label=".form-select-sm example" id="camouflage" name="camouflage">
              <option value="non"></option>
              <option @if ($site->camouflage=="oui")
                {{"selected"}}
            @endif value="oui">Oui</option>
              <option @if ($site->camouflage=="non")
                {{"selected"}}
            @endif value="non">Non</option>
            </select>
            @error('camouflage') <small style="color:red">{{$message}}</small>@enderror
          </div>
          <div class="col">
            <label for="inputCity" class="form-label">Dossier Camouflage ?</label>
              <select class="form-select form-select" aria-label=".form-select-sm example" id="dossier_camouflage" name="dossier_camouflage">
                <option value=""></option>
                <option @if ($site->dossier_camouflage=="oui")
                    {{"selected"}}
                @endif value="oui">Oui</option>
                <option @if ($site->dossier_camouflage=="non")
                    {{"selected"}}
                @endif value="non">Non</option>
              </select>
              @error('dossier_camouflage') <small style="color:red">{{$message}}</small>@enderror
            </div>
      </div>
      <div class="d-flex flex-row">
        <div class="col-md-6 container text-center">
          <input class="form-control" id="statut" type="hidden" placeholder="Avis de l'ARCEP" selected disabled>
          @error('statut') <small style="color:red">{{$message}}</small>@enderror
        </div> 
      </div>
      <div class="col-md-12">
          <label for="floatingTextarea2">Description</label>
          <textarea class="form-control" placeholder="Description" id="floatingTextarea2" style="height: 50px" name="description" value="">{{$site->description}}
          </textarea>
      </div>
      
      
      <div class="col-12">
        
      </div>
      <div class="d-flex justify-content-between col-12 mt-4 pb-4">
        <button type="submit" class="btn btn-primary" id="btn">Enregistrer</button>
        <button type="reset" class="btn btn-danger">Annuler</button>
      </div>
    </form>
  </div>   


<script>
$(document).ready(function() {
  $('.js-example-basic-single').select2();
  });
 
</script>

@endsection