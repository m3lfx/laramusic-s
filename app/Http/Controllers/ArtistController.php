<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index() {
        return 'from index';
    }

    public function create() {
        return 'from create';
    }

    public function store() {
        return 'from store';
    }

    public function edit() {
        return 'from edit';
    }

    public function update(){
        return 'from update';
    }

    public function delete() {
        return 'from delete';
    }
}
