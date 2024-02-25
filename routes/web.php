<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TagController;

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

Route::get('/', [GeneralController::class, 'home']);
Route::get('/admin/create-code-html', [GeneralController::class, 'codeEditorCreate']);
Route::post('/admin/show-code-html', [GeneralController::class, 'codeEditorShow']);
Route::get('/test', [TestController::class, 'test']);
Route::post('/contact', [GeneralController::class, 'contact']);

Route::get('blogs', [BlogController::class, 'blogs']);
Route::get('blogs/{slug}', [BlogController::class, 'single']);
Route::get('tags/{slug}', [TagController::class, 'home']);


Route::group(['middleware' => ['auth']], function () {
    Route::resource('admin/users', UserController::class);
    Route::resource('admin/experiences', ExperienceController::class);
    Route::resource('admin/stories', StoryController::class);
    Route::resource('admin/works', WorkController::class);
    Route::resource('admin/uploads', UploadController::class);
    Route::resource('admin/profiles', ProfileController::class);
    Route::resource('admin/blogs', BlogController::class);
    Route::resource('admin/tags', TagController::class);
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::controller(GeneralController::class)->group(function () {
        Route::get('/admin/story', 'story');
        Route::post('/admin/story', 'store');
    });
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate');
    Route::get('/register', 'register');
    Route::post('/signup', 'signup');
});