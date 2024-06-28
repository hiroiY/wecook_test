<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RecipeController;


Auth::routes();
// require __DIR__ . '/auth.php';

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
//Homepage's Routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/recently', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home/appetizer', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home/sidedish', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home/maindish', [App\Http\Controllers\HomeController::class, 'index']);



Route::get('/mypage/profile_edit', [App\Http\Controllers\HomeController::class, 'profile_edit'])->name('profile_edit');
Route::get('/postmanagement', [App\Http\Controllers\AdminController::class, 'postmanagement'])->name('postmanagement');
Route::get('/user-status', [App\Http\Controllers\AdminController::class, 'userstatus'])->name('userstatus');
Route::get('/post-status', [App\Http\Controllers\AdminController::class, 'poststatus'])->name('poststatus');
Route::get('/mypage/myrecipe', [App\Http\Controllers\HomeController::class, 'myrecipe'])->name('myrecipe');
Route::get('/mypage/mybookmark', [App\Http\Controllers\HomeController::class, 'mypage2'])->name('mybookmark');
Route::get('/editmyrecipe', [App\Http\Controllers\RecipeController::class, 'editmyrecipe'])->name('editmyrecipe');
Route::get('/delete-recipe', [App\Http\Controllers\RecipeController::class, 'deleterecipe'])->name('deleterecipe');
Route::get('/recipe/writer',[UserController::class, 'writer'])->name('writer');
Route::get('/search',[HomeController::class, 'search'])->name('search');
// createrecipe
// Route::middleware(['auth'])->group(function () {
    Route::get('/createrecipe', [RecipeController::class, 'createrecipe'])->name('createrecipe');
    Route::post('/storerecipe', [RecipeController::class, 'storeRecipe'])->name('storerecipe');
    Route::get('/detailrecipe/{id}', [RecipeController::class, 'detailrecipe'])->name('detailrecipe');
// });

Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users');
Route::get('/admin/users/search', [AdminController::class, 'searchUsers'])->name('admin.users.search');
Route::get('/admin/usermanagement', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/usermanagement', [AdminController::class, 'index'])->name('usermanagement');


Route::patch('/admin/usermanagement/{id}/activate', [AdminController::class, 'activate'])->name('activate');
Route::delete('/admin/usermanagement/{id}/deactivate', [AdminController::class, 'deactivate'])->name('deactivate');


