<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use View;

class ArtistController extends Controller
{
    public function index() {
        $artists = Artist::all();
        return View::make('artist.index', compact('artists'));
       
    }

    public function create() {

        return 'from create';
    }

    public function store() {
        return 'from store';
    }

    public function edit($id) {
        dd($id);
        return 'from edit';
    }

    public function update(){
        return 'from update';
    }

    public function delete() {
        
        return 'from delete';
    }
}
