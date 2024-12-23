<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bloco de Notas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @session('message')
        <div class="message">
            {{session('message')}}
        </div>
    @endsession
    {{$slot}}
    @if ($errors->any())
        <div class="errors">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>    
    @endif
</body>
</html>