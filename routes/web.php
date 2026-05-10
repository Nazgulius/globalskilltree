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

Route::view('/buildListPage', 'buildListPage', [
  'games' => DB::table('games')->get()
])->name('buildListPage');

Route::view('/newGame', 'layouts.newGame', [
  'games' => DB::table('games')->get()
])->name('newGame');



Route::view('buildListPage/calcMoY', '/game/calcMoY')->name('calcMoY');
Route::view('buildListPage/calcMOTR', '/game/calcMOTR')->name('calcMOTR');
Route::view('buildListPage/calcMuh', '/game/calcMuh')->name('calcMuh');
Route::view('buildListPage/calcPrime', '/game/calcPrime')->name('calcPrime');

Route::view('buildListPage/calcMoY/acolyteMonk', 'html/acolyteMonk')->name('acolyteMonk');
Route::view('buildListPage/calcMoY/acolytePriest', 'html/acolytePriest')->name('acolytePriest');
