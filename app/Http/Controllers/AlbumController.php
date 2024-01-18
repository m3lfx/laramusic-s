<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Artist;
use View;
use Redirect;
use DB;

class AlbumController extends Controller
{
    public function index()
    {
        // $albums = Album::all();

        $albums = DB::table('artists')
            ->join('albums', 'artists.id', '=', 'albums.artist_id')->get();
        // dd($albums);
        return View::make('album.index', compact('albums'));
    }

    public function create()
    {
        $artists = Artist::all();
        return View::make('album.create', compact('artists'));
    }

    public function store(Request $request)
    {
        $album = new Album();
        $album->title = trim($request->title);
        $album->genre = $request->genre;
        $album->date_released = $request->date_released;
        $album->artist_id = $request->artist_id;
        $album->save();
        return Redirect::route('album.index');
    }

    public function edit($id)
    {
        $album = Album::find($id);
        $artists = Artist::where('id', '<>', $album->artist_id)->get();
        // dd($artists);
        $artist = Artist::where('id', $album->artist_id)->first();
        // dd($artist->name);

        return View::make('album.edit', compact('album', 'artist', 'artists'));
    }

    public function update(Request $request, $id)
    {
        $album = Album::find($id);
        $album->title = trim($request->title);
        $album->genre = $request->genre;
        $album->date_released = $request->date_released;
        $album->artist_id = $request->artist_id;
        $album->save();

        return Redirect::to('album');
    }
    public function delete($id)
    {
        Album::destroy($id);
        return Redirect::to('album');
    }
}
