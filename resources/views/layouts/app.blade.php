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
  <!-- Уведомления будут появляться здесь -->
  <div class="notification-container">     
    @foreach (session('notifications', []) as $notification)
      @php
          $message = is_array($notification) ? ($notification['message'] ?? '') : $notification;
          $type = is_array($notification) ? ($notification['type'] ?? 'success') : 'success';
      @endphp
      <x-notifications.push :message="$message" :type="$type" />
    @endforeach
  </div> 
  <!-- <div class="notification-container"></div> -->
  

  <header class="header">
    <h1 class="title-select">Global Skill Tree</h1>
    <hr>
    <ul class="navi-list">
      <li class="navi-list-item"><a href="{{ route('buildListPage') }}" class="">Ragnarok Online</a></li>
      <li class="navi-list-item"><a href="{{ route('buildListPage') }}" class="">Ragnarok Online 2</a></li>
      <li class="navi-list-item"><a href="{{ route('buildListPage') }}" class="">Ragnarok Online 3</a></li>
      <li class="navi-list-item"><a href="{{ route('newGame') }}" class="">Name Game</a></li>
      <li class="navi-list-item"><a href="{{ route('createBuild') }}" class="">Создать билд</a></li>
      <li class="navi-list-item">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">RO Builds</a>
            <div class="navbar-nav ms-auto">
                @guest
                    <a class="nav-link" href="{{ route('login') }}">Войти</a>
                    <a class="nav-link" href="{{ route('register') }}">Зарегистрироваться</a>
                @else
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">Профиль</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Выйти</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endguest
            </div>
        </div>
      </li>
      <li class="navi-list-item"><a href="{{ route('home') }}" class="">      
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><title>Baseline Home SVG Icon</title><path fill="currentColor" d="M10 20v-6h4v6h5v-8h3L12 3L2 12h3v8z"></path></svg>
      </a></li>
    </ul>

  </header> 

  <main class="py-4">
    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

      <!--<h1>Добро пожаловать на сайт билдов Ragnarok Online!</h1>-->
        <!-- Здесь будет контент с билдами -->
        
      @yield('content')
    </div>
  </main>

  <footer class="footer">    
    @include('layouts.footer')    
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>