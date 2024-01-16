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
}
