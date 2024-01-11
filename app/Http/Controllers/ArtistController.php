<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;

class ArtistController extends Controller
{
    public function index() {
        $artists = Artist::all();
        foreach($artists as $artist) {
            dump($artist->name, $artist->country);
        }
       
        // return 'from index';
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
