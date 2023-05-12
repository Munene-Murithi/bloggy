<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\termsController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\createPostController;
use App\Http\Controllers\createCommentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [loginController::class, 'showLogin'])->name('login');
Route::post('/login', [loginController::class, 'authenticate']);

Route::get('/logout', [logoutController::class, 'logout'])->name('logout');


Route::get('/', [App\Http\Controllers\homeController::class, 'showHomePage'])->name('home');

Route::get('/register', [registerController::class, 'showRegisterPage'])->name('register');
Route::post('/register', [registerController::class, 'store']);

Route::get('/terms', [termsController::class, 'showTerms'])->name('terms');

Route::get('/dashboard', [dashboardController::class, 'showDashboard'])->name('dashboard');

Route::get('/createPost', [createPostController::class, 'showCreatepost'])->name('CreatePost');

Route::get('/createComment', [createCommentController::class, 'showCreateComment'])->name('CreateComment');
