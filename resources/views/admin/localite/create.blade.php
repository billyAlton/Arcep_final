<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter une localite</title>
</head>
<body>
    <form action="{{route('localite.import')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="file">Fichier</label>
        <input type="text" name="nom" id="">
        <input type="file" name="file" id="file">
        <input type="submit" value="Ok">
    </form>
</body>
</html>