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

/* CHIUNQUE */
Route::get('/', 'PublicController@homepage')->name('homepage');


/* UTENTI LOGGATI */
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/announcement/new', 'HomeController@newAnn')->name('ann.new');



/* REVISORE */
Auth::routes();


