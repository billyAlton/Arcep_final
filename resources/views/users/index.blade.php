@extends('layouts.master')
@section('title','Liste des sites')

@section('content')
    
<div class="container" style="font-family: 'Times New Roman', Times, serif">
    
</div>
<div class="container">
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
                        <tr style="background-color:rgb(147, 140, 140)">
                     
                        <td >{{$loop->index+1}}</td>
                        <td>{{$site->nomdesite}}</td>
                        <td>{{$site->longitude}}</td>
                        <td>{{$site->latitude}}</td>
                        <td>{{$site->statut}}</td>
                        <td><a class="btn btn-primary " href="" target="_blank">{{--  --}}<i class="fa fa-print" aria-hidden="true"> Imprimer certificat</i></a></td>
                        <td>
                            <a class="btn btn-secondary" href="">Details</a>
                            
                              <a class="btn btn-success" href="">Modifier</a>
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