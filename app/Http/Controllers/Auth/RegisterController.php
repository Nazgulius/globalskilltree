<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:8',
            'consent' => 'accepted',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'], // хешируется в моделе User
            'consented_at' => now(), // подтверждает, что пользователь принял Политику
            'consent_ip' => $request->ip(),
        ]);

        Auth::login($user);

        session()->flash('notifications', [
          ['message' => "Вы успешно зарегистрированы!", 'type' => 'success'],
        ]);

        return redirect('/');
    }
}
