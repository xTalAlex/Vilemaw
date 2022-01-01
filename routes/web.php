<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/champions', 'App\Http\Controllers\ChampionController@index')->name('champion.index');
Route::get('/champions/{champion}', 'App\Http\Controllers\ChampionController@show')->name('champion.show');
Route::get('/items', 'App\Http\Controllers\ItemController@index')->name('item.index');
Route::get('/runes', 'App\Http\Controllers\RuneController@index')->name('rune.index');
Route::get('/icons', 'App\Http\Controllers\ProfileIconController@index')->name('icon.index');

//middleware(['auth:sanctum', 'verified'])->
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'web', 'prefix' => config('backpack.base.route_prefix')], function () {
    //routes admin
    Route::get('/login', fn() => redirect('login') );
    Route::get('/logout', 'Laravel\Fortify\Http\Controllers\AuthenticatedSessionController@destroy');
});