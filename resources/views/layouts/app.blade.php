<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ config('app.name', 'Genegal Skill Tree') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  
</head>

<body>
  <header class="header">
    <h1 class="title-select">Калькулятор умений - Skill Calculator</h1>
    <hr>
    <ul class="navi-list">
      @foreach ($games as $game)
      <li class="navi-list-item"><a href="#" class="">{{ $game->name }}</a></li>
      @endforeach
      <li class="navi-list-item"><a href="{{ route('selectServersRO') }}" class="">Ragnarok Online</a></li>
      <li class="navi-list-item"><a href="#" class="">Name Game</a></li>
      <li class="navi-list-item"><a href="#" class="">Name Game</a></li>
      <li class="navi-list-item"><a href="{{ route('home') }}" class="">Home</a></li>
    </ul>
    
   
  </header>

  @yield('content')

  <p>Server <a href="https://mythofyggdrasil.com/" class="title-select">mythofyggdrasil.com</a></p>
  <p>Server <a href="https://scrolls.mythofyggdrasil.net/docs/intro" class="title-select"><s>wiki<s></a></p>
  <hr>
  <article>
    @include('layouts.bottom')
  </article>
</body>

</html>