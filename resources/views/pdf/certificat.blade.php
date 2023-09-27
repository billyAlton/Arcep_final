<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>certificat</title>

        <!-- Fonts -->
        
        <!-- Scripts -->
       
    </head>
    <body>
        <div style="width: 25%; float:left ;margin-right:20px">
            <img src="{{public_path('img/logo.jpg')}}" width="100%"> <br>
        </div> <br>
        <h1 style="color: beige; background-color:cornflowerblue ;text-align:center">Certificat de conformité</h1> <br><br><br><br>
        <div>
           <p style="text-align: justify;font-size:17px">Monsieur le directeur de  <span style="font-weight: bold; text-transform:"><i> {{$Element->proprietaire}}</i></span> , <br>
            &nbsp;&nbsp; &nbsp; &nbsp;  Faisant suite à la demande d'enregistrement de votre site radioélectrique 
            <span style="font-weight: bold; text-transform:uppercase"> <i>{{$Element->NomDeSite}}</i></span> à
            travers la plateforme de e-services,l'ARCEP-Benin a effectué l'enrégistrement de votre site dans la base de donnée des sites du Benin. <br>
            &nbsp;&nbsp; &nbsp; &nbsp;
            Prenant en compte les recommendations de ladite missions, nous vous transmettons les informations relatives au site 
           </p>
              
            
                
           </p>
           <table border="1" style="border-collapse:collapse; border:1px ">
                <thead style="background-color:#4b7bec;color:white;border:1px white;
                    text-transform:uppercase">
                    <td>Nom de site</td>
                    <td>ID du site</td>
                    <td>Proprietaire</td>
                    <td>N° de dossier</td>{{-- 
                    <td>Reference de dossier</td> --}}
                    <td>Longitude</td>
                    <td>Latitude</td>
                    <td>Validé</td>
                    <td>Conformité</td>
                </thead>
                <tbody style="text-align:center ">
                    <td>{{$Element->nomdesite}}</td>
                    <td>{{$Element->id_site}}</td>
                    <td>{{$Element->proprietaire}}</td>
                    <td>{{$Element->numdossier}}</td>{{-- 
                    <td>{{$Element->ref_courrier}}</td> --}}
                    <td>{{$Element->longitude}}</td>
                    <td>{{$Element->latitude}}</td>
                    <td>{{$Element->statut}}</td>
                    <td>{{$Element->conforme}}</td>
                </tbody>
           </table>
           <br>
           <p style="font-size: 17px">En foi de quoi le present certificat vous est délivré </p>
           

        </div>
        
        <main style="margin-bottom: 6cm">
          
        </main>
        <p style="font-size:17px;padding-left:9.7cm">
            Fait à Cotonou le 
            <i> 
                <span style="color: red; font-size:20px;font-weight:bold;text-transform:uppercase">
                    @php 
                    
                    echo ( date("d/m/Y H:i:s"))
                    @endphp 
                </span>
                </i>
       </p>
        <div style="">
            <img src="{{public_path('img/signature1.jpg')}}" width="100%">
        </div>
        
        
    </body>
</html>




