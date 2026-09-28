@extends('layouts.app')

@section('content')
<div id="loading" style="display: none;">Загрузка...</div>
<div class="container mt-5">
    <div class="card">

        <div class="card-body">
          <div class="create-title block content-section" id="section-1">
            <h2>название {{ $build->name }}</h2>
            <p>ключи фильтра 
            имя автора, дата обновления
            лайк, поделиться</p>
          
            <p><strong>Класс:</strong> {{ $build->class }}</p>
            <p><strong>Автор:</strong> {{ $build->user->name }}</p>
            <p><strong>Уровень:</strong> {{ $build->recommended_level ?? 'Не указан' }}</p>
          @if($build->description)
            <p><strong>Описание:</strong> {{ $build->description }}</p>
          @endif
        </div>
        <!-- Здесь можно отобразить навыки, если они есть -->
      </div>

      <div class="create-skilltree block content-section" id="section-6">
        <h2>Навыки </h2>
        <p>дерево навыков</p>
        <div class="cropped-iframe-wrapper">
          <iframe src="https://calc.motr-online.com/tree" class="cropped-frame"></iframe>
        </div>
      </div>
    </div>
</div>
@endsection
