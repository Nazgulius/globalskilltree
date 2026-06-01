@extends('layouts.app')

@section('content')
<div id="petal-container">
  <h1 class="home-title">Добро пожаловать в калькулятор умений. Выберите игру, которая вас интересует.</h1>

  <div class="container">
    <div class="container-element">
      <a href="{{ route('buildListPage') }}" class="cont-elem-a">
        <div class="cont-elem-img" data-game="ro1" alt="Ragnarok Online 1">
          
        </div>
      </a>
    </div>
    <div class="container-element">
      <a href="{{ route('buildListPage') }}" class="cont-elem-a">
        <div class="cont-elem-img" data-game="ro2" alt="Ragnarok Online 2">
         
        </div>
      </a>
    </div>
    <div class="container-element">
      <a href="{{ route('buildListPage') }}" class="cont-elem-a">
        <div class="cont-elem-img" data-game="ro3" alt="Ragnarok Online 3">
          
        </div>
      </a>
    </div>
   
    
  </div>

  <div class="toggle-container">
    <span class="toggle-label">Лепестки роз:</span>
    <label class="switch">
        <input type="checkbox" id="petalToggle" checked>
        <span class="slider"></span>
    </label>
  </div>
</div>
  
  
@endsection


