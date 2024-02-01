<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Validator;

use App\Models\Song;
use App\Models\Album;
use DB;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $songs = Song::orderBy('id', 'DESC')->paginate(20);
        $songs = DB::table('songs')
            ->join('albums', 'albums.id', '=', 'songs.album_id')
            ->orderBy('id', 'DESC')
            ->select('albums.title as album_title', 'songs.title as song_title', 'songs.description', 'songs.id')->paginate(15);
        // ->get();
        // dd($songs);
        return View::make('song.index', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $albums = Album::all();
        return View::make('song.create', compact('albums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // dd($request->all());
        $rules = [
            'title' => ['required', 'max:30'],
            'description' => ['required', 'min:5', 'max:200'],
            'album_id' => 'required'
        ];
        $messages = ['title.required' => 'title ay  kailangan', 'description.required' => 'may laman dapat', 'min' => 'too short'];
        $validator = Validator::make($request->all(), $rules, $messages);
        // dd($validator);
        if ($validator->fails()) {
            return redirect()->route('songs.create')
                ->withErrors($validator)
                ->withInput();
        }
        $song = Song::create([
            'title' => $request->title,
            'description' => $request->description,
            'album_id' => $request->album_id
        ]);
        return redirect()->route('songs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $song = Song::find($id);
        $my_album = Album::where('id', $song->album_id)->first();
        // dd($my_album);
        $albums = Album::where('id', '<>', $song->album_id)->get();
        return view('song.edit', compact('song', 'my_album', 'albums'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $song = Song::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'album_id' => $request->album_id
        ]);
        return redirect()->route('songs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        Song::destroy($id);
        return redirect()->back();
    }

    public function search(Request $request)
    {
        // dd($request->search);
        $results = DB::table('songs')
            ->join('albums', 'albums.id', '=', 'songs.album_id')
            ->join('artists', 'artists.id', '=', 'albums.artist_id')
            ->where('songs.title', 'like', "%{$request->search}%")
            ->orWhere('description', 'like', "%{$request->search}%")
            ->orWhere('name', 'like', "%{$request->search}%")
            ->select('songs.title as song_title', 'songs.id', 'songs.description', 'albums.title as album_title', 'artists.name')
            ->get();
        // dd($results);
        return view('song.results', compact('results'));
    }
}
