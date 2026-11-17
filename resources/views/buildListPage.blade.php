@extends('layouts.app')

@section('content')
<div class="build-content">
<h1 class="servers-title">Выберите билд</h1>
  <div class="description-top">
    <p>В этом разделе Вы можете выбрать билд для ознакомления. </p>
  </div>

  <!-- фильтр билдов -->
  <div class="filter-builds">
    <a href="{{ route('buildListPage') }}" class="filrer-restart filter-builds-elem">Сбросить</a>

    <form action="{{ route('buildListPage') }}" method="GET">
        <select name="game_id" onchange="this.form.submit()" class="filter-builds-elem">
            <option value="">Все игры</option>
            @foreach ($games as $g)
                <option value="{{ $g->id }}" {{ $gameId == $g->id ? 'selected' : '' }}>
                    {{ $g->name_game }}
                </option>
            @endforeach
        </select>
        <select name="class_id" onchange="this.form.submit()" class="filter-builds-elem">
            <option value="">Все профессии</option>
            @foreach ($gameClasses as $c)
              <option value="{{ $c->name_class }}" @selected($classFilter == $c->name_class)>{{ $c->name_class }}</option>
            @endforeach
        </select>
        
    </form>
  </div>

  <!-- список билдов -->
  <div class="class-list">
    @forelse ($builds as $build)
      <div class="build">
        <a href="{{ route('build.show', $build) }}" class="build-a">
          <div class="build-top">
            <div class="build-title-block">
              <h4 class="build-title">Название: {{ $build->name }}</h4>
              <p class="build-author">
                <strong>Автор:</strong> {{ $build->user->name }}
              </p>
              <p><strong>Класс:</strong> {{ $build->class }}</p>
              <p><strong>Уровень:</strong> {{ $build->recommended_level ?? 'Не указан' }}</p>
              <p class="build-date-update">Последнее обновление {{ $build->updated_at }}</p>
            </div>

            <div class="build-skills-img">
              <!-- <img src="./img/no_img_skill_info.png" alt="" class="b-s-img-item"> -->
            </div>
          </div>

          <div class="build-down">
            <div class="build-navi">
              <!-- <button class="build-navi-like">(количество) Нравится</button>
              <button class="build-navi-share"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><title>Baseline Ios Share SVG Icon</title><path fill="currentColor" d="m16 5l-1.42 1.42l-1.59-1.59V16h-1.98V4.83L9.42 6.42L8 5l4-4zm4 5v11c0 1.1-.9 2-2 2H6a2 2 0 0 1-2-2V10c0-1.11.89-2 2-2h3v2H6v11h12V10h-3V8h3a2 2 0 0 1 2 2"></path></svg> Поделиться</button>
              <button class="build-navi-more">...</button> -->
            </div>
      
            <div class="build-key">
              <span class="b-k-item">сервер</span>
              <span class="b-k-item">класс</span>
              <span class="b-k-item">для чего</span>
              <span class="b-k-item">сложность</span>
            </div>
          </div>
        </a>
      </div>
    @empty
        <p>Нет билдов по этому фильтру.</p>
    @endforelse
    
  </div>
</div>
  
@endsection