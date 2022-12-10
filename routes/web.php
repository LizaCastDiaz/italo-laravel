<?php

use App\Http\Controllers\ProfileController;

// Solicitud o peticion
use Illuminate\Support\Facades\Route;

// Nos traemos a la ruta del controlador y nos llevamos la logica (returns) a los controllers y borramos las las rutas del pagesControlles.


use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;

// Route::get('/', [PageController::class, 'home'])->name('home');
// Route::get('blog', [PageController::class, 'blog'])->name('blog');
// Route::get('blog/{slug}', [PageController::class, 'post'] )->name('post');

Route::controller(PageController::class,)->group(function () {

Route::get('/',             'home')->name('home');
Route::get('blog',          'blog')->name('blog');
Route::get('blog/{post:slug}',   'post')->name('post');


});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('post', PostController::class)->except(['show'])->middleware(['auth']);



require __DIR__.'/auth.php';
