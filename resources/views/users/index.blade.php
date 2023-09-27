@extends('layouts.master')
@section('title','Liste des sites')

@section('content')
    
<div class="container" style="font-family: 'Times New Roman', Times, serif">
    
</div>
<div class="container">
    <div class="bg-light p-5 mb-5 text-center">
        <form action="" method="get" class="d-flex gap-2 container">
                <select class="form-select form-select" aria-label=".form-select-sm example" name="proprietaire">
                  <option selected disabled value="">Choisir proprietaire</option>
                  <option value="SPACETEL BENIN">SPACETEL BENIN</option>
                  <option value="MOOV AFRICA BENIN">MOOV AFRICA BENIN</option>
                  <option value="SBIN">SBIN</option>
                </select>
                @error('proprietaire') <small style="color:red">{{$message}}</small>@enderror
            <input type="text" class="form-control" name="autre_proprietaire" placeholder="Autre proprietaire">
            <input type="date" class="form-control" name="date_soumission debut" placeholder="Date de soumission debut">
            <input type="date" class="form-control" name="date_soumission fin" placeholder="Date de soumission fin">
            <input class="btn btn-primary btn-sm flex-grow-0" value="Rechercher" type="submit">
        </form>
    </div>
    <div class="container card mt-5 bg-body shadow-lg">
        <div class="card-header mt-2">
            <div class="card-title d-flex justify-content-between">
                <span><b><a href="{{route('site.index')}}" style="text-decoration:none">LISTE DES SITES</a></b></span>
                <span><a href="{{route('site.create')}}" class="btn btn-warning">Ajouter</a></span>
            </div>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover text-center">
                <thead class="">
                    <tr >
                    <th scope="col">N°</th>
                    <th scope="col">Nom du Site</th>
                    <th scope="col">Longitude</th>
                    <th scope="col">Latitude</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Imprimer certificat de conformité</th>
                    
                      <th scope="col">Detail & Modifier & Supprimer </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sites as $site)
                        <tr style="">
                     
                        <td >{{$loop->index+1}}</td>
                        <td>{{$site->nomdesite}}</td>
                        <td>{{$site->longitude}}</td>
                        <td>{{$site->latitude}}</td>
                        <td>{{$site->statut}}</td>
                        <td><a class="btn btn-primary " href="{{route('pdf',['site'=>$site->id])}}" target="_blank">{{--  --}}<i class="fa fa-print" aria-hidden="true"> Imprimer certificat</i></a></td>
                        <td>
                            <a class="btn btn-secondary" href="{{route('site.show',['site'=>$site->id])}}">Details</a>
                            
                              <a class="btn btn-success" href="{{route('site.edit',['site'=>$site->id])}}">Modifier</a>
                              <a class="btn btn-danger" onclick="if(confirm('Voulez vous vraiment supprimer ce site ')){document.getElementById('form-{{$site->id}}').submit()}">Supprimer</a>
                              <form id="form-{{$site->id}}" action="{{route('site.destroy',['site'=>$site->id])}}" method="post">
                                  @csrf
                                  @method('delete')
                              </form>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>  
@endsection