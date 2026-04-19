<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', function () {
  $games = DB::table('games')->get();
  return view('home', ['games' => $games]);
})->name('home');

Route::view('/selectServersRO', 'game.selectServersRO', [
  'games' => DB::table('games')->get()
])->name('selectServersRO');

Route::view('/newGame', 'layouts.newGame', [
  'games' => DB::table('games')->get()
])->name('newGame');

Route::view('selectServersRO/calcMoY', '/game/calcMoY')->name('calcMoY');
Route::view('selectServersRO/calcMOTR', '/game/calcMOTR')->name('calcMOTR');
Route::view('selectServersRO/calcMuh', '/game/calcMuh')->name('calcMuh');
Route::view('selectServersRO/calcPrime', '/game/calcPrime')->name('calcPrime');

Route::view('selectServersRO/calcMoY/acolyteMonk', 'html/acolyteMonk')->name('acolyteMonk');
Route::view('selectServersRO/calcMoY/acolytePriest', 'html/acolytePriest')->name('acolytePriest');
