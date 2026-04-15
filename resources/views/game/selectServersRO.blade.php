@extends('layouts.app')

@section('content')
<h1 class="servers-title">Выберите сервер</h1>
<div class="class-list">
    <div class="class-list-item">    
      <a class="button-select-acolyte-priest page2Btn " href="{{ route('calcMoY') }}"><div class="button-select-acolyte-priest-img button-select-img">
        <div class="btn-in-img">Myth of Yggdrasil</div>  
      </div></a>
    </div>
    <div class="class-list-item">    
      <a class="button-select-acolyte-monk page2Btn" href="{{ route('calcMOTR')}}"><div class="button-select-acolyte-monk-img button-select-img">
        <div class="btn-in-img">MOTR</div>
      </div></a>
    </div> 
    <div class="class-list-item">    
      <a class="button-select-acolyte-monk page2Btn" href="{{ route('calcMuh')}}"><div class="button-select-acolyte-monk-img button-select-img">
        <div class="btn-in-img">Muh RO</div>
      </div></a>
    </div> 
    <div class="class-list-item">    
      <a class="button-select-archer-hunter page2Btn" href="{{ route('calcPrime')}}"><div class="button-select-archer-hunter-img button-select-img">
        <div class="btn-in-img">Ragnarok Online Prime</div>
      </div></a>
    </div>
    
    
  </div>
@endsection