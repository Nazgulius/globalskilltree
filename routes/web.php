<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BuildController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return view('home');
})->name('home');
// Route::get('/', function () {
//   $games = DB::table('games')->get();
//   return view('home', ['games' => $games]);
// })->name('home');

Route::view('/buildListPage', 'buildListPage', [
  'games' => DB::table('games')->get()
])->name('buildListPage');

Route::view('/newGame', 'layouts.newGame', [
  'games' => DB::table('games')->get()
])->name('newGame');

Route::view('/createBuild', 'createBuild')->name('createBuild');

Route::get('/createBuild/index', [BuildController::class, 'index'])->name('createBuildIndex');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);                                                                      
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Защищённые маршруты (только для авторизованных)
Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
  Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
  // маршруты для билдов
  Route::get('/build/create', [BuildController::class, 'create'])->name('build.create');
  Route::post('/build/save', [BuildController::class, 'store'])->name('build.store');
  Route::get('/build/{build}', [BuildController::class, 'show'])->name('build.show');
});


// прочее
Route::view('buildListPage/calcMoY', '/game/calcMoY')->name('calcMoY');
Route::view('buildListPage/calcMOTR', '/game/calcMOTR')->name('calcMOTR');
Route::view('buildListPage/calcMuh', '/game/calcMuh')->name('calcMuh');
Route::view('buildListPage/calcPrime', '/game/calcPrime')->name('calcPrime');

Route::view('buildListPage/calcMoY/acolyteMonk', 'html/acolyteMonk')->name('acolyteMonk');
Route::view('buildListPage/calcMoY/acolytePriest', 'html/acolytePriest')->name('acolytePriest');
