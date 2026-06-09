@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2>{{ $build->name }}</h2>
            <p><strong>Класс:</strong> {{ $build->name_class }}</p>
            <p><strong>Автор:</strong> {{ $build->user->name }}</p>
            <p><strong>Уровень:</strong> {{ $build->level ?? 'Не указан' }}</p>
            @if($build->description)
                <p><strong>Описание:</strong> {{ $build->description }}</p>
            @endif
            <!-- Здесь можно отобразить навыки, если они есть -->
        </div>
    </div>
</div>
@endsection
