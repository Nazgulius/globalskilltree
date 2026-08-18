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
    <a href="{{ route('home') }}" class="home-logo">      
      <svg fill="#000000" width="64px" height="64px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M20 10c0-1.361-.758-2.616-2.031-3.622-.002-.001-.004-.001-.005-.003C17.602 2.803 14.177 0 10 0S2.398 2.803 2.036 6.375c-.001.002-.003.002-.005.003C.758 7.384 0 8.639 0 10c0 3.112 3.947 5.669 9 5.97V17c0 1-1.821 1.911-1.821 1.911a.227.227 0 0 0-.109.277S7.375 20 8 20s1.124-.5 2.374-.5 2.439.432 2.439.432a.342.342 0 0 0 .329-.073l.717-.717c.078-.078.058-.173-.046-.212 0 0-1.812-.68-1.812-1.93v-1.121C16.565 15.324 20 12.903 20 10zM2 10c0-1.019.768-1.945 2.022-2.651C4.012 7.233 4 7.117 4 7c0-2.762 2.687-5 6-5s6 2.238 6 5c0 .117-.012.233-.021.349C17.232 8.055 18 8.981 18 10c0 1.864-2.551 3.424-5.999 3.869v-.668a.53.53 0 0 1 .145-.337l1.833-1.726a.534.534 0 0 0 .146-.337V9.95c0-.11-.078-.155-.172-.099l-1.779 1.047c-.096.056-.173.012-.173-.099V7.2c0-.11-.085-.172-.19-.137l-2.621.874a.297.297 0 0 0-.189.263v2.6c0 .11-.079.158-.177.107L6.802 9.843a.289.289 0 0 0-.318.048l-.342.342a.185.185 0 0 0 .009.273l2.7 2.361c.083.073.15.222.15.332v.765C5.056 13.719 2 12.04 2 10z"></path></g></svg>
    </a>
    
    <ul class="navi-list">
      <li class=""><a href="{{ route('buildListPage') }}" class="navi-list-item navi-hover">Ragnarok Online</a></li>
      <li class=""><a href="{{ route('buildListPage') }}" class="navi-list-item navi-hover">Ragnarok Online 2</a></li>
      <li class=""><a href="{{ route('buildListPage') }}" class="navi-list-item navi-hover">Ragnarok Online 3</a></li>
      <li class=""><a href="{{ route('newGame') }}" class="navi-list-item navi-hover">Name Game</a></li>
      <li class=""><a href="{{ route('createBuild') }}" class="navi-list-item navi-hover">Создать билд</a></li>
      <li class="navi-list-item">
        <div class="container">
            <div class="navbar-nav ms-auto">
                @guest
                    <a class="nav-link navi-hover" href="{{ route('login') }}">Войти</a>
                    <a class="nav-link navi-hover" href="{{ route('register') }}">Зарегистрироваться</a>
                @else
                    <div class="nav-item">
                      <a class="dropdown-item navi-hover" href="{{ route('profile') }}">{{ Auth::user()->name }}</a>
                      <form action="{{ route('logout') }}" method="POST">
                          @csrf
                          <button type="submit" class="dropdown-item">Выйти</button>
                      </form>
                   </div>
                @endguest
            </div>
        </div>
      </li>
      <li class="navi-list-item navi-hover"><a href="{{ route('home') }}" class="home-icon">      
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