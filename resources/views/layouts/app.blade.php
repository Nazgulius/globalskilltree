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
  <!-- вариант с альфин -->
  @if(session('notifications') && count(session('notifications')) > 0)
      @foreach(session('notifications') as $notif)
          <div 
              x-data="{ show: true }" 
              x-init="setTimeout(() => show = false, 5000)" 
              x-show="show"
              @click="show = false"
              class="notif-container"
              :class="'notif-' + ({{ $notif['type'] === 'error' ? "'error'" : ($notif['type'] === 'warning' ? "'warning'" : "'success'") }})"
              x-on:transitionend.self="if (!show) $el.remove()"
          >
              <div class="notif-box">
                  <div class="notif-bar"></div>
                  <p class="notif-text">{{ $notif['message'] }}</p>
              </div>
          </div>
      @endforeach
  @endif

  <!-- вариант без альфин и js -->
  <!-- @if(session('notifications'))
      @foreach(session('notifications') as $notif)
          <div class="notif-container notif-{{ $notif['type'] }}">
              <div class="notif-box">
                  <div class="notif-bar"></div>
                  <p class="notif-text">{{ $notif['message'] }}</p>
              </div>
          </div>
      @endforeach
  @endif -->

  <!-- <div x-data="{ counter: 1, show: false, items: ['habr', 'hubr', 'hobr'] }">
      <h1 x-text="counter"></h1>
      <button x-on:click="counter++">Добавляем +1 к числу выше</button>
      <button x-on:click="counter + 2">text +2</button>
      <hr>
      <button
        x-on:click="show = ! show"
        x-text="show ? 'Скрыть' : 'Показать'"
      ></button>
      <template x-if="show">
        <p>Меня видно!</p>
      </template>
      <hr>
      <ol>
        <template x-for="item in items" x-bind:key="item">
          <li>
            <p x-text="item"></p>
          </li>
        </template>
      </ol>

    </div> -->

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
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <script>
    document.querySelectorAll('.notif-container').forEach(el => {
      el.addEventListener('click', () => el.remove());
    });
    setTimeout(() => document.querySelectorAll('.notif-container').forEach(el => el.remove()), 3000);
  </script>   


  <!-- Yandex.Metrika counter -->
  <script type="text/javascript">
      (function(m,e,t,r,i,k,a){
          m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
          m[i].l=1*new Date();
          for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
          k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)
      })(window, document,'script','https://mc.yandex.ru/metrika/tag.js?id=109790594', 'ym');

      ym(109790594, 'init', {ssr:true, webvisor:true, clickmap:true, ecommerce:"dataLayer", referrer: document.referrer, url: location.href, accurateTrackBounce:true, trackLinks:true});
  </script>
  <noscript><div><img src="https://mc.yandex.ru/watch/109790594" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
  <!-- /Yandex.Metrika counter -->
</body>
</html>