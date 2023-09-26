<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap4.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <title> @yield('title') | ARCEP</title>
</head>
<body>
    @yield('content')
    <script>
        new TomSelect("#select-beast",{
	create: true,
	sortField: {
		field: "text",
		direction: "asc"
	}
});

    </script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/jquery-3.6.4.js')}}"></script>
<script src="{{asset('js/vendor/bootstrap.js')}}"></script>
</body>
</html>