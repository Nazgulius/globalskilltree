<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Build;
use App\Models\Game;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class BuildController extends Controller
{
    /**
     * Показать форму для создания нового билда.
     */
    public function create()
    {
        // Просто возвращаем шаблон с формой создания билда
        // return view('builds.create');
        $gameClasses = \App\Models\GameClass::all(); 
        $games = \App\Models\Game::all();
        return view('builds.create', compact('gameClasses', 'games'));
    }

    /**
     * Сохранить новый билд в базе данных.
     */
    public function store(Request $request)
    {
                
        // Валидируем входящие данные
        $validated = $request->validate([
            'game_id' => 'required|exists:games,id',
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:100',
            'recommended_level' => 'nullable|integer|min:1|max:300',
            'description_mini' => 'nullable|string',
            'strengths_and_weaknesses' => 'nullable|string',
            'characteristics' => 'nullable|string',
            'equipment' => 'nullable|string',
            // skills — это JSON-поле, можно валидировать как JSON или просто как строку
            'skills' => 'nullable|json',
            'description' => 'nullable|string',
            'video' => 'nullable|string',
            'items' => 'nullable|string',
        ]);

        // Создаём новый билд и привязываем к текущему пользователю 
        $build = Build::create([
            'user_id' => Auth::id(),
            'game_id' => $validated['game_id'],
            'name' => $validated['name'],
            'class' => $validated['class'],
            'recommended_level' => $validated['recommended_level'] ?? null,
            'description_mini' => $validated['description_mini'] ?? null,
            'strengths_and_weaknesses' => $validated['strengths_and_weaknesses'] ?? null,
            'characteristics' => $validated['characteristics'] ?? null,
            'equipment' => $validated['equipment'] ?? null,
            'skills' => $validated['skills'] ?? null,
            'description' => $validated['description'] ?? null,
            'video' => $validated['video'] ?? null,
            'items' => $validated['items'] ?? null,
        ]);
        
        session()->flash('notifications', [
          ['message' => "Билд '{$build->name}' успешно создан!", 'type' => 'success'],
        ]);

        // Перенаправляем на страницу созданного билда или на список билдов
        return redirect()->route('build.show', $build->id);
    }

    /**
     * Показать страницу с подробным описанием конкретного билда.
     */
    public function show($id)
    {
        // Ищем билд по ID и загружаем информацию о его авторе (пользователе)
        $build = Build::with('user')->findOrFail($id);

        // Возвращаем шаблон, передавая в него билд
        return view('builds.show', compact('build'));
    }

    public function index(Request $request)
    {
         $gameId = $request->input('game_id');
          $skill = $request->input('skill');
          $levelMin = $request->input('level_min');

          $query = Build::with('user') // если в шаблоне нужен автор билда
              ->when($gameId, fn($q) => $q->where('game_id', $gameId))
              ->when($skill, fn($q) => $q->whereRaw('JSON_CONTAINS(skills, ?)', [$skill]))
              ->when($levelMin, fn($q) => $q->where('recommended_level', '>=', $levelMin))
              ->orderBy('created_at', 'DESC');

          // Пагинация: Laravel сам сделает offset/limit и посчитает страницы
          $builds = $query->paginate(10);

          $games = Game::all(); // вместо DB::table('games')->get()

          return view('buildListPage', compact('builds', 'games', 'gameId'));
    }

    public function destroy(Build $build) 
    {
      $build->delete();

      session()->flash('notifications', [
        ['message' => 'Билд удалён.', 'type' => 'warning']
      ]);

      return redirect()->route('builds.index');
    }
}
