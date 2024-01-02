<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('my/page', function () {
    return 'Hello world!';
    });

    // Route::get('/books', function () {
    //     return 'Books index.';
    //     });

        // Route::get('/books/{genre}', function ($genre) {
        //     return "Books in the {$genre} category.";
        //     });
            Route::get('/books/{genre?}', function ($genre = 'Crime') {
                if ($genre == null) {
                return 'Books index.';
                }
                return "Books in the {$genre} category.";
               });

            //    Route::get('/views', function () {
            //     return View::make('simple');
            //    });

Route::get('/views/{squirrel}', function ($squirrel) {
$data['squirrel'] = $squirrel;

return View::make('simple', $data);
});
               
               
               
           

       
    
   