<?php
// Solicitud o peticion

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});


Route::get('blog', function () {
    $posts = [
        [
            'id' => 1,
            'title' => 'PHP',
            'slug' => 'php',
        ],
        [

            'id' => 2,
            'title' => 'laravel',
            'slug' => 'laravel',
        ]
    ];

    return view('blog', ['posts' => $posts] );
});



Route::get('blog/{slug}', function ($slug) {
    $posts = $slug;
    // consulta a base de datos
    return view('post', ['posts' => $posts] );


});
