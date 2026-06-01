@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Создать новый билд</h1>
    <form method="POST" action="{{ route('build.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Название билда</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="class" class="form-label">Класс персонажа</label>
            <select name="class" id="class" class="form-select" required>
              @foreach ($gameClasses as $gameClass)
                <option value="{{ $gameClass->name_class }}">{{ $gameClass->name_class }}</option>
              @endforeach
                <!--<option value="Monk">Monk</option> -->
                <!-- Добавьте другие классы по необходимости -->
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <!-- Здесь можно добавить поля для навыков (например, динамические поля через JS) -->
        <button type="submit" class="btn btn-primary">Создать билд</button>
    </form>
</div>
@endsection
