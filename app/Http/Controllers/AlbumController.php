<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
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
        return View::make('album.create');
    }
}
