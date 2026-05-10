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
    <h1 class="title-select">Global Skill Tree</h1>
    <hr>
    <ul class="navi-list">
      <li class="navi-list-item"><a href="{{ route('buildListPage') }}" class="">Ragnarok Online</a></li>
      <li class="navi-list-item"><a href="{{ route('buildListPage') }}" class="">Ragnarok Online 2</a></li>
      <li class="navi-list-item"><a href="{{ route('buildListPage') }}" class="">Ragnarok Online 3</a></li>
      <li class="navi-list-item"><a href="{{ route('newGame') }}" class="">Name Game</a></li>
      <li class="navi-list-item"><a href="{{ route('home') }}" class="">      
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><title>Baseline Home SVG Icon</title><path fill="currentColor" d="M10 20v-6h4v6h5v-8h3L12 3L2 12h3v8z"></path></svg>
      </a></li>
    </ul>
  </header> 

  <main>
    @yield('content')
  </main>

  <footer class="footer">    
    @include('layouts.footer')    
  </footer>
</body>
</html>