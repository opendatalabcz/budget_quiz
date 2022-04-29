<?php

use App\Http\Controllers\Admin\BudgetChapterController;
use App\Http\Controllers\Admin\BudgetStateChangeController;
use App\Http\Controllers\Admin\BudgetStateController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\PartyController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\RegionController;
use App\Http\Controllers\Admin\AnswerController;
use App\Http\Controllers\QuizController;
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

Route::view('/', 'welcome')->name('index');

Route::controller(QuizController::class)->group(function() {
    Route::get('quiz', 'index')->name('quiz.index');
    Route::post('quiz', 'store')->name('quiz.store');
    Route::get('quiz/{quiz:hash}', 'show')->name('quiz.show');
    Route::get('results', 'results')->name('results');
});

Route::controller(LoginController::class)->group(function() {
    Route::post('admin/login', 'login');
    Route::get('admin/login', 'show')->name('admin.login');
    Route::get('admin/logout', 'logout')->name('admin.logout');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
   Route::view('/', 'admin.welcome')->name('welcome');

   Route::resource('regions', RegionController::class)->except('show');

   Route::resource('parties', PartyController::class)->except('show');

   Route::resource('educations', EducationController::class)->except('show');

   Route::resource('budget_chapters', BudgetChapterController::class)->except('show');
   Route::resource('budget_chapters.budget_state', BudgetStateController::class)->except('index');

   Route::resource('questions', QuestionController::class);
   Route::resource('questions.answers', AnswerController::class)->except('index');
   Route::resource('questions.answers.budget_state_change', BudgetStateChangeController::class)->except('index');
});
