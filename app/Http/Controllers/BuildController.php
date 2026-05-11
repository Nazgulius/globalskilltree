<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Build;

class BuildController extends Controller
{
  public function index(Request $request)
  {
    $page = $request->input('page', 1);
    $limit = $request->input('limit', 10);
    $offset = ($page - 1) * $limit;

    // Применяем фильтры
    $query = Build::query();
    

    if ($request->has('skill')) {
        $query->whereRaw('JSON_CONTAINS(skills, ?)', [$request->skill]);
    }

    if ($request->has('level_min')) {
        $query->where('level', '>=', $request->level_min);
    }

    // Получаем билды с пагинацией
    $builds = $query->orderBy('created_at', 'DESC')
        ->offset($offset)
        ->limit($limit)
        ->get();

    return response()->json([
        'builds' => $builds,
        'has_more' => $builds->count() === $limit // есть ли ещё билды
    ]);
  }

}
