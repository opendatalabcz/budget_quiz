<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;

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

Route::controller(LoginController::class)->group(function() {
    Route::post('admin/login', 'login');
    Route::get('admin/login', 'show')->name('admin.login');
    Route::get('admin/logout', 'logout')->name('admin.logout');
});

Route::prefix('admin')->middleware('auth')->group(function () {
   Route::get('/', function (Request $request) {
       return $request->user();
   })->name('admin.welcome');
});
