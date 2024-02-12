<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// 記事編集画面のルーティングを追加する

use App\Http\Controllers\EditController;

Route::get('/{blog}/edit', [EditController::class, 'edit'])->name('blogs.edit');
Route::put('/{blog}/update', [EditController::class, 'update'])->name('blogs.update');

// 削除機能のルーティングを追加する
Route::delete('/{blog}', [EditController::class, 'destroy'])->name('blogs.destroy');

// 新規記事の作成画面のルーティングを追加する
Route::get('post/create', [EditController::class, 'create'])->name('blogs.create');

// 新規記事を保存するためのルーティングを追加する
Route::post('post', [EditController::class, 'store'])->name('blogs.store');



// 個別ブログ記事を表示するためのルーティングを追加する
use App\Http\Controllers\ShowController;

Route::get('/{blog}', [ShowController::class, 'show'])->name('blogs.show');


// TOPページにブログ記事を表示するためのルーティングを追加する

use App\Http\Controllers\BlogController;

Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
