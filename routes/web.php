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

Route::get('/login', 'AuthController@signIn')->name('login');
Route::get('/register', 'AuthController@signUp')->name('register');
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
Route::get('/tokens', 'DashboardController@tokens')->name('tokens')->middleware('auth');

 /*
|--------------------------------------------------------------------------
| Token
|--------------------------------------------------------------------------
 */
Route::get('/payment-token/create', 'PaymentTokenController@create')->middleware('auth')->name('payment_token.create');
Route::post('/payment-token/store', 'PaymentTokenController@store')->middleware('auth')->name('payment_token.store');
Route::post('/payment-token/{paymentToken}', 'PaymentTokenController@destroy')->middleware('auth')->name('payment_token.destroy');


/*
|--------------------------------------------------------------------------
| Tutorial
|--------------------------------------------------------------------------
 */
Route::get('/tut/accept-payments', 'TutorialController@acceptPayments')->name('tut.accept_payments');
Route::get('/tut/pay', 'TutorialController@pay')->name('tut.pay');

 /*
|--------------------------------------------------------------------------
| User
|--------------------------------------------------------------------------
 */