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
     return redirect('login');
    //return view('welcome');
});
//Lacal setting 
Route::get('lang/{locale}', [App\Http\Controllers\Settings\LocalizationController::class, 'index']);

//User management 
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


foreach (glob(__DIR__. '/module/*') as $router_files){
    (basename($router_files =='web.php')) ? : (require_once $router_files);
}