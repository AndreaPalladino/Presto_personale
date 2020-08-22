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
Route::get('/category/{id}/announcements', 'PublicController@annByCategory')->name('public.announcements');
Route::get('/announcement/{announcement}/detail', 'PublicController@detail')->name('public.detail');


/* UTENTI LOGGATI */
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/announcement/new', 'HomeController@newAnn')->name('ann.new');
Route::post('/announcement/post', 'HomeController@storeAnn')->name('ann.store');
Route::post('/feedbacks/{id}/send', 'HomeController@feedback')->name('feed.store');


/* REVISORE */
Auth::routes();


