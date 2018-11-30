<?php

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

Route::get('/', 'HomeController@home');

Route::get('/dashboard', 'HomeController@dashboard');

Route::get('/logout', 'SocialAuthenticationController@logout');

/* Redirect user to Instagram for authorization */
Route::get('/instagram','SocialAuthenticationController@instagram');

/* Redirect URI that is passed to Instagram. Instagram will return the user to this route after authorization */
Route::get('/login-instagram','SocialAuthenticationController@login_instagram');

/* Fetching data of authorized user from Instagram using the api */
Route::get('/instagram/fetch-all','InstagramController@fetch_all');
