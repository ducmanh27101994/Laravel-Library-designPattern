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

Route::prefix('students')->group(function (){
    Route::get('/','StudentController@index')->name('students.index');
    Route::get('/create','StudentController@create')->name('students.create');
    Route::post('/create','StudentController@store')->name('students.store');
    Route::get('/{id}/edit','StudentController@edit')->name('students.edit');
    Route::post('/{id}/edit','StudentController@update')->name('students.update');
    Route::get('/{id}/delete','StudentController@destroy')->name('students.delete');
});

Route::prefix('borrows')->group(function (){
    Route::get('/','BorrowController@index')->name('borrows.index');
    Route::get('/create','BorrowController@create')->name('borrows.create');
    Route::post('/create','BorrowController@store')->name('borrows.store');
    Route::get('/{id}/edit','BorrowController@edit')->name('borrows.edit');
    Route::post('/{id}/edit','BorrowController@update')->name('borrows.update');
    Route::get('/{id}/delete','BorrowController@destroy')->name('borrows.delete');
});

Route::prefix('books')->group(function (){
    Route::get('/','BookController@index')->name('books.index');
    Route::get('/create','BookController@create')->name('books.create');
    Route::post('/create','BookController@store')->name('books.store');
    Route::get('/{id}/edit','BookController@edit')->name('books.edit');
    Route::post('/{id}/edit','BookController@update')->name('books.update');
    Route::get('/{id}/delete','BookController@destroy')->name('books.delete');
    Route::post('/search','BookController@search')->name('books.search');
});

Route::prefix('details')->group(function (){
    Route::get('/create','DetailController@create')->name('details.create');
    Route::post('/create','DetailController@store')->name('details.store');
    Route::get('/{id}/showId','DetailController@showDetailById')->name('details.showId');
    Route::get('/','DetailController@showFullDetails')->name('details.showDetails');
});
