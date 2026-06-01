<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
</nav>
