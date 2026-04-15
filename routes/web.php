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

Route::view('/selectServersRO', '/game/selectServersRO')->name('selectServersRO');

Route::view('/calcMoY', '/game/calcMoY')->name('calcMoY');
Route::view('/calcMOTR', '/game/calcMOTR')->name('calcMOTR');
Route::view('/calcMuh', '/game/calcMuh')->name('calcMuh');
Route::view('/calcPrime', '/game/calcPrime')->name('calcPrime');

Route::view('/acolyteMonk', 'html/acolyteMonk')->name('acolyteMonk');
Route::view('/acolytePriest', 'html/acolytePriest')->name('acolytePriest');
