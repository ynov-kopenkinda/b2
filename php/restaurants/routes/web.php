<?php

use App\Http\Controllers\ContactController;
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

Route::resource('restaurants', 'RestaurantController');

Route::get('/sendmail', [ContactController::class, 'create'])
    ->name('sendmail');
    
Route::post('/sendmail', [ContactController::class, 'store'])
    ->name('storemail');
