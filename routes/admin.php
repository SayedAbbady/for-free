<?php

use GuzzleHttp\Middleware;
// use Illuminate\Support\Facades\Auth;
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

Route::group(['prefix' => 'admin', 'namespace'=>'admin', 'middleware'=>'auth'], function () {
  // dashboard start
  Route::get('/', 'DashController@index')->name('adminhome');
  Route::get('/home', 'DashController@index')->name('adminhome');
  // dashboard start

  //******************************************************************




  // unit route
  Route::resource('/unit', 'UnitController')->names([
    'index'=>'unit',
    'create'=>'unit.create',
    'show'=>'unit.show',
    'edit'=>'unit.edit'
  ]);
  Route::post('/unit/delete','UnitController@deleteUnit')->name('uni.delete');
  Route::post('/unit/edit','UnitController@updateUnit');


  //  sections route
  Route::resource('/section', 'SectionController')->names([
    'index'=>'section',
    'create'=>'section.create',
    'show'=>'section.show',
    'edit'=>'section.edit'
  ]);
  Route::post('/section/delete','SectionController@deleteSection')->name('se.del');
  Route::post('/section/edit','SectionController@updateSection');

  // level route
  Route::resource('/level', 'LevelController')->names([
    'index'=>'level',
    'create'=>'level.create',
    'show'=>'level.show',
    'edit'=>'level.edit'
  ]);
  Route::post('/level/delete','LevelController@deleteLevel')->name('lev.del');
  Route::post('/level/edit','LevelController@updateLevel');


  // lesson routes
  Route::resource('/lesson', 'LessonController')->names([
    'index'=>'lesson',
    'create'=>'lesson.create',
    'store' =>'lesson.store',
    'edit'=>'lesson.edit'
  ]);
  Route::post('/lesson/delete','LessonController@deleteLesson')->name('les.dele');
  Route::post('/lesson/edit','LessonController@updateLesson');



  // start user us route
  //show all users
  Route::get('/user', 'AdminController@user')->name('student');

  Route::post('/user/userDelete',"AdminController@deleteuser")->name('del.user.de');
  //***********************************************************.


  // start staff us route
  //show all staff
  Route::get('/staff', 'AdminController@index')->name('staff');
  Route::get('/staff/add', 'AdminController@add')->name('staff.add');
  Route::get('/staff/edit/{id}', 'AdminController@edit')->name('staff.edit');

  Route::post('/staff/addNew', 'AdminController@store');
  Route::post('/staff/editOne', 'AdminController@staffUpdata');
  Route::post('/staff/staffDelete',"AdminController@deletestaff")->name('del.staff.ss');
  //***********************************************************

});
