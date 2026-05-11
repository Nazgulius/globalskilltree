@extends('layouts.app')

@section('content')
<div class="page-container">
  <main class="main-content">
  <h1>тут будет создание билда</h1>
  <div id="loading" style="display: none;">Загрузка...</div>

    <div class="create-title block content-section" id="section-1">
      <h2>название </h2>
      <p>ключи фильтра 
  имя автора, дата обновления
  лайк, поделиться</p>
    </div>

    <div class="create-description block content-section" id="section-2">
      <h2>короткое описание </h2>
      <p>короткое описание</p>
    </div>

    <div class="create-plus-minus block content-section" id="section-3">
      <h2>сильные и слабые стороны </h2>
      <p>сильные и слабые стороны</p>
    </div>

    <div class="create-characteristics block content-section" id="section-4">
      <h2>Характеристики </h2>
      <p>перечень характеристик</p>
    </div>

    <div class="create-items block content-section" id="section-5">
      <h2>Экипировка </h2>
      <p>перечень шмота</p>
    </div>

    <div class="create-skilltree block content-section" id="section-6">
      <h2>Навыки </h2>
      <p>дерево навыков</p>
    </div>

    <div class="create-description-all block content-section" id="section-7">
      <h2>Описание </h2>
      <p>полное описание</p>
    </div>

    <div class="create-video block content-section" id="section-8">
      <h2>Видео </h2>
      <p>видео, если есть</p>
    </div>
  </main>


  <!-- Блок навигации справа -->
  <nav class="sticky-sidebar">
    <div class="sidebar-header">
      <h3>Оглавление</h3>
    </div>
    <ul class="toc-list">
      <li><a href="#section-1" class="toc-link">Название</a></li>
      <li><a href="#section-2" class="toc-link">Короткое описание</a></li>
      <li><a href="#section-3" class="toc-link">сильные и слабые стороны</a></li>
      <li><a href="#section-4" class="toc-link">Характеристики</a></li>
      <li><a href="#section-5" class="toc-link">Экипировка</a></li>
      <li><a href="#section-6" class="toc-link">Навыки</a></li>
      <li><a href="#section-7" class="toc-link">Описание</a></li>
      <li><a href="#section-8" class="toc-link">Видео</a></li>
      <!-- Добавьте остальные пункты -->
    </ul>
  </nav>
</div>
@endsection
