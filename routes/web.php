<?php

use Illuminate\Support\Facades\Auth;

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

/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
*/
Auth::routes();

Route::get('/sign-in', 'AuthController@signIn')->name('auth.sign_in');
Route::get('/sign-up', 'AuthController@signUp')->name('auth.sign_up');
Route::get('/sign-out', 'AuthController@signOut')->name('auth.sign_out');

/*
|--------------------------------------------------------------------------
| Payment
|--------------------------------------------------------------------------
 */

 /*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
 */
Route::get('/', 'DashboardController@index')->name('home')->middleware('auth');

 /*
|--------------------------------------------------------------------------
| Token
|--------------------------------------------------------------------------
 */
Route::get('/payment-token/create', 'PaymentTokenController@create')->middleware('auth')->name('payment_token.create');

 /*
|--------------------------------------------------------------------------
| User
|--------------------------------------------------------------------------
 */