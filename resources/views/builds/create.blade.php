@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Создать новый билд</h1>
    <form method="POST" action="{{ route('build.store') }}" enctype="multipart/form-data">
        @csrf

        @if ($errors->any())
          <div class="alert alert-danger">
              <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif

        <div class="mb-3">
            <label for="game_id" class="form-label">Название игры</label>
            <select name="game_id" id="game_id" class="form-select" required>
              <option value="" disabled selected>Выберите игру</option>
              @foreach ($games as $game)
                <option value="{{ $game->id}}"
                  {{ old('game_id') == $game->id ? 'selected' : '' }}>
                  {{ $game->name_game }}</option>
              @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Название билда</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="recommended_level" class="form-label">Рекомендуемый уровень персонажа</label>
            <input type="number" name="recommended_level" id="recommended_level" class="form-control" value="{{ old('recommended_level') }}">
        </div>
        <div class="mb-3">
            <label for="class" class="form-label">Класс персонажа</label>
            <select name="class" id="class" class="form-select" required>
              @foreach ($gameClasses as $gameClass)
                <option value="{{ $gameClass->name_class }}"
                  {{ old('class') == $gameClass->name_class ? 'selected' : '' }}>
                  {{ $gameClass->name_class }}</option>
              @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea name="description" id="description" class="form-control"
              rows="4">{{ old('description') }}</textarea>
        </div>
        <!-- Здесь можно добавить поля для навыков (например, динамические поля через JS) -->
        <button type="submit" class="btn btn-primary">Создать билд</button>
    </form>
</div>
@endsection
