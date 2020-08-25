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
Route::get('/announcements/search', 'PublicController@search')->name('public.search');


/* UTENTI LOGGATI */
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/announcement/new', 'HomeController@newAnn')->name('ann.new');
Route::post('/announcement/post', 'HomeController@storeAnn')->name('ann.store');
Route::post('/feedbacks/{id}/send', 'HomeController@feedback')->name('feed.store');
Route::get('/user/profile', 'HomeController@profile')->name('profile');
Route::get('/user/{id}/profilo', 'HomeController@viewProfile')->name('profile.view');
Route::post('/user/revise/{id}/again', 'HomeController@reviseAgain')->name('revise.again');
Route::post('/user/{id}/contactSeller', 'HomeController@contactSeller')->name('contact.seller');
Route::get('/user/announcement/{announcement}/edit', 'HomeController@edit')->name('edit');
Route::put('/user/announcement/{announcement}/update', 'HomeController@update')->name('update');
Route::delete('/user/announcement/{announcement}/delete', 'HomeController@delete')->name('delete');
Route::post('/announcement/images/upload', 'HomeController@uploadImage')->name('announcement.images.upload');
Route::delete('/announcement/images/remove', 'HomeController@removeImage')->name('announcement.images.remove');
Route::get('/announcement/images', 'HomeController@getImages')->name('announcement.images');
Route::get('/profile/contact/revisor', 'HomeController@askRevisor')->name('ask.become');
Route::post('/profile/contact/Submit', 'HomeController@contactSubmit')->name('contact.submit');




/* REVISORE */
Route::get('/revisor/home', 'RevisorController@home')->name('revisorHome');
Route::post('/revisor/{announcement}/accept', 'RevisorController@accept')->name('revisor.accept');
Route::post('/revisor/{announcement}/reject', 'RevisorController@reject')->name('revisor.reject');

/* AMMINISTRATORE */
Route::get('/admin/userList', 'AdminController@userList')->name('userlist');
Route::post('/admin/{id}/makeRevisor', 'AdminController@makeRevisor')->name('make.revisor');
Route::post('/admin/{id}/unMakeRevisor', 'AdminController@unMakeRevisor')->name('unMake.revisor');


