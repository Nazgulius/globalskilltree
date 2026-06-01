<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
      $user = Auth::user();
      // $user = $request->user();
      

      // Если вдруг пользователь не авторизован (маловероятно из-за middleware, но на всякий случай)
      if (!$user) {
        return redirect()->route('login')->with('error', 'Для просмотра профиля необходимо войти в систему.');
      }

      // Загружаем связанные билды пользователя (если есть связь в модели)
      // $user->load('builds'); // Раскомментируйте, если есть связь builds() в модели User

      
      // return view('profile', [
      //     'user' => $user,
      //     // 'builds' => $user->builds, // Передаём билды в шаблон, если нужно
      // ]);
      return view('profile', compact('user'));
    }
}
