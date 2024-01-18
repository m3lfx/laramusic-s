<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use View;
use Redirect;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::all();
        return View::make('artist.index', compact('artists'));
    }

    public function create()
    {

        return View::make('artist.create');
    }

    public function store(Request $request)
    {
        $name = $request->name;
        $country = $request->country;
        $img_path = $request->img_path;

        $artist = new Artist();
        $artist->name = $name;
        $artist->country = $country;
        $artist->img_path = $img_path;
        $artist->save();
        // dd($artist);

        return Redirect::to('artist');
    }

    public function edit($id)
    {
        $artist = Artist::find($id);

        // dd($artist);
        return View::make('artist.edit', compact('artist'));
    }

    public function update(Request $request, $id)
    {
        $artist = Artist::find($id);
        $artist->name = $request->name;
        $artist->country = $request->country;
        $artist->img_path = $request->img_path;
        $artist->save();
        return Redirect::to('artist');
    }

    public function delete($id)
    {
        Artist::destroy($id);
        return Redirect::to('artist');
    }
}
