<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\loginController;
    use App\Http\Controllers\registerController;
    use App\Http\Controllers\logoutController;
    use App\Http\Controllers\termsController;
    use App\Http\Controllers\dashboardController;
    use App\Http\Controllers\postController;
    use App\Http\Controllers\viewPostController;
    use App\Http\Controllers\aboutUsController;
    use App\Http\Controllers\contactController;
    use App\Http\Controllers\commentsController;
    use App\Http\Controllers\profileController;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\showPostController;
    use App\Http\Controllers\tempController;

    Route::middleware(['guest'])->group(function () {
        Route::get('/register', [registerController::class, 'showRegisterPage'])->name('register');
        Route::post('/register', [registerController::class, 'store']);



        Route::get('/login', [loginController::class, 'showLogin'])->name('login');
        Route::post('/login', [loginController::class, 'authenticate']);
        Route::post('/login', [AuthController::class, 'login']);
    });


    // Routes accessible only to authenticated users
    Route::middleware(['auth'])->group(function () {
        Route::post('/storePost', [postController::class, 'store'])->name('storePost');
        Route::get('/singlePost/{id}', [postController::class, 'show'])->name('singlePost');
        Route::get('/post/{id}', [postController::class, 'showSinglePost']);
        Route::get('/createPost', [postController::class, 'showCreatePost'])->name('createPost');
        Route::resource('posts', postController::class);
        Route::get('/posts/{post}/edit', [postController::class, 'edit'])->name('posts.edit');
        Route::put('/posts/{post}', [postController::class, 'update'])->name('posts.update');
        


        Route::get('/logout', [logoutController::class, 'logout'])->name('logout');
        Route::post('/logout', [AuthController::class, 'logout']);


        Route::get('/dashboard', [dashboardController::class, 'showDashboard'])->name('dashboard');
        
        Route::get('/createComment', [commentsController::class, 'showCreateComment'])->name('CreateComment');
        Route::post('/createComments', [commentsController::class, 'store'])->name('storeComment');
        Route::delete('/comments/{comment}', [commentsController::class, 'destroy'])->name('comments.destroy');
        Route::get('/comments/{comment}/edit', [commentsController::class, 'edit'])->name('comments.edit');
        Route::put('/comments/{comment}', [commentsController::class, 'update'])->name('comments.update');



        Route::get('/profile', [profileController::class, 'showProfile'])->name('profile');
        Route::post('/profile', [profileController::class, 'updatePhoto']);

    });

    Route::get('/', [App\Http\Controllers\homeController::class, 'showHomePage'])->name('home');
    Route::get('/terms', [termsController::class, 'showTerms'])->name('terms');
    Route::get('/aboutUs', [aboutUsController::class, 'showAbout'])->name('aboutUs');
    Route::get('/contact', [contactController::class, 'showContact'])->name('contact');
