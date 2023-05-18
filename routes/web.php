<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\loginController;
    use App\Http\Controllers\registerController;
    use App\Http\Controllers\logoutController;
    use App\Http\Controllers\termsController;
    use App\Http\Controllers\dashboardController;
    use App\Http\Controllers\createPostController;
    use App\Http\Controllers\createCommentController;
    use App\Http\Controllers\viewPostController;
    use App\Http\Controllers\aboutUsController;
    use App\Http\Controllers\contactController;
    use App\Http\Controllers\commentsController;
    use App\Http\Controllers\profileController;
    use App\Http\Controllers\AuthController;

    Route::get('/login', [loginController::class, 'showLogin'])->name('login');
    Route::post('/login', [loginController::class, 'authenticate']);
    Route::post('/login', [AuthController::class, 'login']);


    Route::get('/', [App\Http\Controllers\homeController::class, 'showHomePage'])->name('home');

    Route::get('/register', [registerController::class, 'showRegisterPage'])->name('register');
    Route::post('/register', [registerController::class, 'store']);

    Route::get('/terms', [termsController::class, 'showTerms'])->name('terms');
    Route::get('/aboutUs', [aboutUsController::class, 'showAbout'])->name('aboutUs');
    Route::get('/contact', [contactController::class, 'showContact'])->name('contact');



    // Routes accessible only to authenticated users
    Route::middleware(['auth'])->group(function () {
        Route::get('/createPost', [createPostController::class, 'showCreatePost'])->name('createPost');
        Route::post('/storePost', [createPostController::class, 'store'])->name('storePost');

        Route::get('/logout', [logoutController::class, 'logout'])->name('logout');
        Route::post('/logout', [AuthController::class, 'logout']);


        Route::get('/dashboard', [dashboardController::class, 'showDashboard'])->name('dashboard');
        
        Route::get('/createComment', [commentsController::class, 'showCreateComment'])->name('CreateComment');
        Route::post('/createComments', [commentsController::class, 'store'])->name('storeComment');

        Route::get('/profile', [profileController::class, 'showProfile'])->name('profile');
    });
