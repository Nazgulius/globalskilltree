@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Профиль пользователя</h4>
                </div>
                <div class="card-body">
                    <p><strong>Имя:</strong> {{ $user->name }}</p>
                    <p><strong>E-mail:</strong> {{ $user->email }}</p>
                    <p><strong>Дата регистрации:</strong> {{ $user->created_at->format('d.m.Y H:i') }}</p>

                    <!-- Здесь можно добавить функционал для редактирования профиля или список созданных билдов -->
                    <hr>
                    <h5>Ваши билды</h5>
                    @if($user->builds->count())
                        <ul>
                            @foreach($user->builds as $build)
                                <li>{{ $build->name }} — <a href="{{ route('build.show', $build) }}">Посмотреть</a></li>
                            @endforeach
                        </ul>
                        <p>Для создания билда нажмите кнопку.</p>
                        <a href="{{ route('build.create') }}" class="btn btn-success">Создать билд</a>
                    @else
                        <p>Вы ещё не создали ни одного билда.</p>
                        <a href="{{ route('build.create') }}" class="btn btn-success">Создать первый билд</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
