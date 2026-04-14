<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });
Route::view('/', 'home')->name('home');
Route::view('/acolyteMonk', 'html/acolyteMonk')->name('acolyteMonk');
Route::view('/acolytePriest', 'html/acolytePriest')->name('acolytePriest');


