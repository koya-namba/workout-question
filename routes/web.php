<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// 質問関連
Route::get('/', [QuestionController::class, 'index'])->name('questions.index');
Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create')->middleware('auth');
Route::get('questions/myquestions', [QuestionController::class, 'myquestions'])->name('questions.myquestions')->middleware('auth');
Route::get('/questions/{question}', [QuestionController::class, 'show'])->name('questions.show');
Route::middleware('auth')->group(function() {
    Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
    Route::delete('/questions/{question}', [QuestionController::class, 'delete'])->name('questions.delete');
});

// 回答関連
Route::middleware('auth')->group(function() {
    Route::get('/questions/{question}/answers/create', [AnswerController::class, 'create'])->name('answers.create');
    Route::post('/questions/{question}/answers', [AnswerController::class, 'store'])->name('answers.store');
    Route::delete('/questions/{question}/answers/{answer}', [AnswerController::class, 'delete'])->name('answers.delete');
    Route::post('/questions/{question}/answers/{answer}/like', [AnswerController::class, 'like'])->name('answers.like');
    Route::post('/questions/{question}/answers/{answer}/unlike', [AnswerController::class, 'unlike'])->name('answers.unlike');    
});

// 筋トレ開始日
Route::middleware('auth')->group(function() {
    Route::get('/start_month', [ProfileController::class, 'edit_start_month'])->name('start_month.edit');
    Route::put('/start_month', [ProfileController::class, 'update_start_month'])->name('start_month.update');
});

// larave純正
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
