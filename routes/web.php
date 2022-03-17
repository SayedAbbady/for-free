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





Auth::routes();

Route::group(['middleware'=>'auth'], function () {

    // Route::get('/register');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/unit/{id?}',"UnitController@show")->name('show.unit');

    Route::get('/section/{id?}',"SectionController@show")->name('sectionUi');

    Route::get('/level/{id?}',"LevelController@show")->name('levelUi');

    Route::get('/lesson/{id?}/{level?}',"LessonController@show")->name('lessonUi');

});