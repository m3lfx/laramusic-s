<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\ListenerController;
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

Route::get('/artist', [ArtistController::class, 'index']);
Route::get('/artist/create', [ArtistController::class, 'create']);
Route::post('/artist/store', [ArtistController::class, 'store']);
Route::get('/artist/{id}/edit', [ArtistController::class, 'edit']);
Route::post('/artist/{id}/update', [ArtistController::class, 'update']);

Route::get('artist/{id}/delete', [ArtistController::class, 'delete']);

Route::prefix('album')->group(function () {
    Route::get('/', [AlbumController::class, 'index'])->name('album.index');
    Route::get('/create', [AlbumController::class, 'create'])->name('album.create');
    Route::post('/store', [AlbumController::class, 'store'])->name('album.store');
    Route::get('/{id}/edit', [AlbumController::class, 'edit'])->name('album.edit');
    Route::post('/{id}/update', [AlbumController::class, 'update'])->name('album.update');
    Route::get('/{id}/delete', [AlbumController::class, 'delete'])->name('album.delete');
});
Route::post('/song-search', [SongController::class, 'search'])->name('songs.search');
Route::get('/listeners/{id}/restore', [ListenerController::class, 'restore'])->name('listeners.restore');
Route::get('/listeners/add-album', [ListenerController::class, 'addAlbums'])->name('listeners.addAlbums')->middleware('auth');
Route::post('/listeners/add-album', [ListenerController::class, 'addAlbumListener'])->name('listeners.addAlbumListener')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::resource('songs', SongController::class);
    Route::resource('listeners', ListenerController::class);
});


Route::get('/db', function () {

    Schema::table('artists', function ($table) {
        $table->dropColumn('username');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
