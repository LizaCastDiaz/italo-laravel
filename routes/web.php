<?php
// Solicitud o peticion
use Illuminate\Support\Facades\Route;

// Nos traemos a la ruta del controlador y nos llevamos la logica (returns) a los controllers y borramos las las rutas del pagesControlles.


use App\Http\Controllers\PageController;



// Route::get('/', [PageController::class, 'home'])->name('home');
// Route::get('blog', [PageController::class, 'blog'])->name('blog');
// Route::get('blog/{slug}', [PageController::class, 'post'] )->name('post');

Route::controller(PageController::class,)->group(function () {

Route::get('/',             'home')->name('home');
Route::get('blog',          'blog')->name('blog');
Route::get('blog/{post:slug}',   'post')->name('post');


});
