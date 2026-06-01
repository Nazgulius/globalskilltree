@extends('layouts.app')

@section('content')
<div class="build-content">
<h1 class="servers-title">Выберите билд</h1>
  <div class="description-top">
    <p>тут будет описание раздела</p>
  </div>

  <div class="filter-builds">
    <p>тут будут фильтры для билдов</p>
  </div>

  <div class="class-list">
    <p>тут будет список билдов</p>
    <div class="build-1 build">
      <div class="build-top">
        <img src="" alt="" class="img-class-item">

        <div class="build-title-block">
          <h4 class="build-title">Название билда</h4>
          <div class="b-t-b-blok">
            <p class="build-author">Автор <a href="#" class="author-build-link">Автор билда</a></p>
            <p class="build-date-update">Последнее обновление (дата)</p>
          </div>
        </div>
        
        <div class="build-skills-img">
          <img src="./img/no_img_skill_info.png" alt="" class="b-s-img-item">
          <img src="./img/no_img_skill_info.png" alt="" class="b-s-img-item">
          <img src="./img/no_img_skill_info.png" alt="" class="b-s-img-item">
          <img src="./img/no_img_skill_info.png" alt="" class="b-s-img-item">
        </div>
      </div>

      <div class="build-down">
        <div class="build-navi">
          <button class="build-navi-like">(количество) Нравится</button>
          <button class="build-navi-share"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><title>Baseline Ios Share SVG Icon</title><path fill="currentColor" d="m16 5l-1.42 1.42l-1.59-1.59V16h-1.98V4.83L9.42 6.42L8 5l4-4zm4 5v11c0 1.1-.9 2-2 2H6a2 2 0 0 1-2-2V10c0-1.11.89-2 2-2h3v2H6v11h12V10h-3V8h3a2 2 0 0 1 2 2"></path></svg> Поделиться</button>
          <button class="build-navi-more">...</button>
        </div>
  
        <div class="build-key">
          <span class="b-k-item">сервер</span>
          <span class="b-k-item">класс</span>
          <span class="b-k-item">для чего</span>
          <span class="b-k-item">сложность</span>
        </div>
      </div>

    </div>
    <div class="build-2 build">
      <div class="build-top">
        <img src="" alt="" class="img-class-item">

        <div class="build-title-block">
          <h4 class="build-title">Название билда</h4>
          <p class="build-author">By <a href="#" class="author-build-link">Автор билда</a></p>
          <p class="build-date-update">Последнее обновление (дата)</p>
        </div>
        
        <div class="build-skills-img">
          <img src="./img/no_img_skill_info.png" alt="" class="b-s-img-item">
          <img src="./img/no_img_skill_info.png" alt="" class="b-s-img-item">
          <img src="./img/no_img_skill_info.png" alt="" class="b-s-img-item">
          <img src="./img/no_img_skill_info.png" alt="" class="b-s-img-item">
          <img src="./img/no_img_skill_info.png" alt="" class="b-s-img-item">
          <img src="./img/no_img_skill_info.png" alt="" class="b-s-img-item">
        </div>
      </div>

      <div class="build-down">
        <div class="build-navi">
          <button class="build-navi-like">(количество) Нравится</button>
          <button class="build-navi-share"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><title>Baseline Ios Share SVG Icon</title><path fill="currentColor" d="m16 5l-1.42 1.42l-1.59-1.59V16h-1.98V4.83L9.42 6.42L8 5l4-4zm4 5v11c0 1.1-.9 2-2 2H6a2 2 0 0 1-2-2V10c0-1.11.89-2 2-2h3v2H6v11h12V10h-3V8h3a2 2 0 0 1 2 2"></path></svg> Поделиться</button>
          <button class="build-navi-more">...</button>
        </div>
  
        <div class="build-key">
          <span class="b-k-item">сервер</span>
          <span class="b-k-item">класс</span>
          <span class="b-k-item">для чего</span>
          <span class="b-k-item">сложность</span>
        </div>
      </div>

    </div>
    <div class="build-3 build">
      <div class="build-top">
        <img src="" alt="" class="img-class-item">

        <div class="build-title-block">
          <h4 class="build-title">Название билда</h4>
          <p class="build-author">By <a href="#" class="author-build-link">Автор билда</a></p>
          <p class="build-date-update">Последнее обновление (дата)</p>
        </div>       
        
      </div>

      <div class="build-down">
        <div class="build-navi">
          <button class="build-navi-like">(количество) Нравится</button>
          <button class="build-navi-share"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><title>Baseline Ios Share SVG Icon</title><path fill="currentColor" d="m16 5l-1.42 1.42l-1.59-1.59V16h-1.98V4.83L9.42 6.42L8 5l4-4zm4 5v11c0 1.1-.9 2-2 2H6a2 2 0 0 1-2-2V10c0-1.11.89-2 2-2h3v2H6v11h12V10h-3V8h3a2 2 0 0 1 2 2"></path></svg> Поделиться</button>
          <button class="build-navi-more">...</button>
        </div>
  
        <div class="build-key">
          <span class="b-k-item">сервер</span>
          <span class="b-k-item">класс</span>
          <span class="b-k-item">для чего</span>
          <span class="b-k-item">сложность</span>
        </div>
      </div>

    </div>
    
  </div>
</div>
  
@endsection