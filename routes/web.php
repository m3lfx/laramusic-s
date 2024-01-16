<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;
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

Route::get('/', function () {
    return View::make('home');
});

// Route::get('/books', function () {
//     return 'Books index.';
//     });

// Route::get('/books/{genre}', function ($genre) {
//     return "Books in the {$genre} category.";
//     });
// Route::get('/books/{genre?}', function ($genre = 'Crime') {
//     if ($genre == null) {
//         return 'Books index.';
//     }
//     return "Books in the {$genre} category.";
// });

//    Route::get('/views', function () {
//     return View::make('simple');
//    });

// Route::get('/views/{squirrel}', function ($squirrel) {
//     $data['squirrel'] = $squirrel;
//     $data['something'] = 'Giant Panda';
//     $data['manyThings'] = array('one', 'two', 'three');
//     return View::make('simple', $data);
// });

// Route::get('/first', function () {
//     return Redirect::to('second');
// });
// Route::get('/second', function () {
//     return 'Second route.';
// });

// Route::get('file/download', function () {
//     $file = 'D:\3rdterm_files\week1_dalisay.pdf';
//     return Response::download($file);
// });

Route::get('/artist', [ArtistController::class, 'index']);
Route::get('/artist/create', [ArtistController::class, 'create']);
Route::post('/artist/store', [ArtistController::class, 'store']);
Route::get('/artist/{id}/edit', [ArtistController::class, 'edit']);
Route::post('/artist/{id}/update', [ArtistController::class, 'update']);

Route::get('artist/{id}/delete', [ArtistController::class, 'delete']);

Route::prefix('album')->group(function () {
    Route::get('/', [AlbumController::class, 'index']);
    Route::get('/create', [AlbumController::class, 'create']);
    Route::post('/store', [AlbumController::class, 'store']);
    Route::get('/{id}/edit', [AlbumController::class, 'edit']);
    Route::post('/{id}/update', [AlbumController::class, 'update']);
    Route::get('/{id}/delete', [AlbumController::class, 'delete']);
});
Route::get('/db', function () {

    Schema::table('artists', function ($table) {
        $table->dropColumn('username');
    });
});
