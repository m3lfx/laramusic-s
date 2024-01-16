<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Artist;
use View;
use Redirect;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        return View::make('album.index', compact('albums'));
    }

    public function create()
    {
        $artists = Artist::all();
        return View::make('album.create', compact('artists'));
    }

    public function store(Request $request) {
        $album = new Album();
        $album->title = $request->title;
        $album->genre = $request->genre;
        $album->date_released = $request->date_released;
        $album->artist_id = $request->artist_id;
        $album->save();
        return Redirect::route('album.index');
    }
}
