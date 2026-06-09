<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Build;

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
        return view('builds.create', compact('gameClasses'));
    }

    /**
     * Сохранить новый билд в базе данных.
     */
    public function store(Request $request)
    {
                
        // Валидируем входящие данные
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:100',
            'description' => 'nullable|string',
            // skills — это JSON-поле, можно валидировать как JSON или просто как строку
            'skills' => 'nullable|json',
            'level' => 'nullable|integer|min:1|max:99',
        ]);

        // Создаём новый билд и привязываем к текущему пользователю 
        $build = Build::create([
            'user_id' => Auth::id(),
            'name' => $validated['name'],
            'name_class' => $validated['class'],
            'description' => $validated['description'] ?? null,
            'skills' => $validated['skills'] ?? null,
            'level' => $validated['level'] ?? null,
        ]);
        
        session()->flash('notifications', [
          ['message' => "Билд '{$build->name}' успешно создан!", 'type' => 'success'],
        ]);

        // Перенаправляем на страницу созданного билда или на список билдов
        return redirect()->route('build.show', $build->id)
            ->with('success', 'Билд успешно создан!');
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

    // Ваш существующий метод index() остаётся без изменений
    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $limit = $request->input('limit', 10);
        $offset = ($page - 1) * $limit;

        $query = Build::query();

        if ($request->has('skill')) {
            $query->whereRaw('JSON_CONTAINS(skills, ?)', [$request->skill]);
        }

        if ($request->has('level_min')) {
            $query->where('level', '>=', $request->level_min);
        }

        $builds = $query->orderBy('created_at', 'DESC')
            ->offset($offset)
            ->limit($limit)
            ->get();

        return response()->json([
            'builds' => $builds,
            'has_more' => $builds->count() === $limit
        ]);
    }
}
