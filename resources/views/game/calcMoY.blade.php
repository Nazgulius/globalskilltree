@extends('layouts.app')

@section('content')
<h1 class="home-title">Myth of Yggdrasil</h1>
<h2>Выберите класс</h2>
<div class="class-list">
  <div class="class-list-item">    
    <a class="button-select-acolyte-priest page2Btn " href="{{ route('acolytePriest')}}"><div class="button-select-acolyte-priest-img button-select-img">
      <div class="btn-in-img">ACOLYTE-PRIEST</div>  
    </div></a>
  </div>
  <div class="class-list-item">    
    <a class="button-select-acolyte-monk page2Btn" href="{{ route('acolyteMonk')}}"><div class="button-select-acolyte-monk-img button-select-img">
      <div class="btn-in-img">ACOLYTE-MONK</div>
    </div></a>
  </div> 
  <div class="class-list-item">    
    <a class="button-select-archer-hunter page2Btn" href="archerHunter.html"><div class="button-select-archer-hunter-img button-select-img">
      <div class="btn-in-img">ARCHER-HUNTER</div>
    </div></a>
  </div>
  <div class="class-list-item">    
    <a class="button-select-archer-bard page2Btn" href="archerBard.html"><div class="button-select-archer-bard-img button-select-img">
      <div class="btn-in-img">ARCHER-BARD</div>
    </div></a>
  </div>
  <div class="class-list-item">    
    <a class="button-select-archer-dancer page2Btn" href="archerDancer.html"><div class="button-select-archer-dancer-img button-select-img">
      <div class="btn-in-img">ARCHER-DANCER</div>
    </div></a>
  </div>       
  <div class="class-list-item">    
    <a class="button-select-mage page1Btn" href="mageWiz.html"><div class="button-select-mage-img button-select-img">
      <div class="btn-in-img">MAGE-WIZARD</div>
    </div></a>
  </div>
  <div class="class-list-item">    
    <a class="button-select-sage page2Btn" href="mageSage.html"><div class="button-select-sage-img button-select-img">
      <div class="btn-in-img">MAGE-SAGE</div>
    </div></a>
  </div>
  <div class="class-list-item">    
    <a class="button-select-merchant-alchemist page2Btn" href="merchantAlchemist.html"><div class="button-select-merchant-alchemist-img button-select-img">
      <div class="btn-in-img">MERCHANT-ALCHEMIST</div>
    </div></a>
  </div>
  <div class="class-list-item">    
    <a class="button-select-merchant-blacksmith page2Btn" href="merchantBlacksmith.html"><div class="button-select-merchant-blacksmith-img button-select-img">
      <div class="btn-in-img">MERCHANT-BLACKSMITH</div>
    </div></a>
  </div>    
  <div class="class-list-item">    
    <a class="button-select-swordman-crusader page2Btn" href="swordmanCrusader.html"><div class="button-select-swordman-crusader-img button-select-img">
      <div class="btn-in-img">SWORDMAN-CRUSADER</div>
    </div></a>
  </div>
  <div class="class-list-item">    
    <a class="button-select-swordman-knight page2Btn" href="swordmanKnight.html"><div class="button-select-swordman-knight-img button-select-img">
      <div class="btn-in-img">SWORDMAN-KNIGHT</div>
    </div></a>
  </div>
  <div class="class-list-item">    
    <a class="button-select-thief-assassin page2Btn" href="thiefAssassin.html"><div class="button-select-thief-assassin-img button-select-img">
      <div class="btn-in-img">THIEF-ASSASSIN</div>
    </div></a>
  </div>
  <div class="class-list-item">    
    <a class="button-select-thief-rogue page2Btn" href="thiefRogue.html"><div class="button-select-thief-rogue-img button-select-img">
      <div class="btn-in-img">THIEF-ROGUE</div>
    </div></a>
  </div>
</div>

<h2>Выберите готовый билд</h2>
<div class="build-list">
  <div class="class-list-item">    
    <a class="button-select-thief-assassin page2Btn" href="thiefAssassin.html">
      <div class="button-select-thief-assassin-img button-select-img">
        <div class="btn-in-img">THIEF-ASSASSIN</div>
      </div>
    </a>
  </div>
  <div class="class-list-item">    
    <a class="button-select-thief-rogue page2Btn" href="thiefRogue.html">
      <div class="button-select-thief-rogue-img button-select-img">
        <div class="btn-in-img">THIEF-ROGUE</div>
      </div>
    </a>
  </div>
</div>

@endsection