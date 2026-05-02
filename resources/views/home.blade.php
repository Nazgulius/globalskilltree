@extends('layouts.app')

@section('content')
  <h1 class="home-title">Добро пожаловать в калькулятор умений. Выберите игру, которая вас интересует.</h1>

  <div class="container">
    <div class="container-element">
      <a href="{{ route('selectServersRO') }}" class="cont-elem-a">
        <div class="cont-elem-img ro1 " alt="Ragnarok Online 1">
          
        </div>
      </a>
    </div>
    <div class="container-element">
      <a href="{{ route('selectServersRO') }}" class="cont-elem-a">
        <div class="cont-elem-img ro2 " alt="Ragnarok Online 2">
         
        </div>
      </a>
    </div>
    <div class="container-element">
      <a href="{{ route('selectServersRO') }}" class="cont-elem-a">
        <div class="cont-elem-img ro3 " alt="Ragnarok Online 3">
          
        </div>
      </a>
    </div>
   
    
  </div>
 
@endsection


