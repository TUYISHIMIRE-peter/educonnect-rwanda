<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HODController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RepliesController;
use App\Http\Controllers\HeadTeacherController;


Route::middleware("guest")->get("/", function () {
    return redirect()->route("login");
});

Auth::routes();

Route::middleware(["auth"])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/post', [PostController::class,'create'])->name('post.create');
    Route::post('/post', [PostController::class,'store'])->name('post.store');
    Route::get('/posts', [PostController::class,'index'])->name('posts');
    Route::post('/comment/store', [RepliesController::class, 'store'])->name('comment.add');
    Route::post('/reply/store', [RepliesController::class,'replyStore'])->name('reply.add');
    Route::get('/add_video', function () { return view('admin.video'); })->name('add_video');
    Route::post('/videos/upload', [VideoController::class,'upload'])->name('videos.upload');
    Route::get("/callendar", function () {
        return view('callendar');
    });
    
    // home routes
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/uploaded', [App\Http\Controllers\VideoController::class, 'index'])->name('uploaded');
    Route::get('/article/{post:slug}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');

    // school routes
    Route::resource('/school',SchoolController::class);
    // users routes
    Route::get("/users", [UserController::class,"index"])->name("users");
    Route::put("/users/{id}", [UserController::class,"update"])->name("update-user");
    Route::delete("/users/{id}", [UserController::class,"destroy"])->name("destroy-user");
    Route::post("/users", [UserController::class,"create"])->name("create-user");
    Route::post("/home", [UserController::class,"all"])->name("conts");
});
