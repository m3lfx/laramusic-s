<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listener;
use App\Models\Album;
use Validator;

use Storage;
use DB;

class ListenerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listeners = Listener::withTrashed()->get();
        return view('listener.index', compact('listeners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('listener.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'img_path' => 'mimes:jpg,bmp,png',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $listener = new Listener();
        $listener->name = $request->first_name . " " . $request->last_name;
        $listener->address = $request->address;
        // $path = Storage::putFile('images', $request->file('img_path'));
        // dd($path);
        $path = Storage::putFileAs(
            'public/images',
            $request->file('img_path'),
            $request->file('img_path')->getClientOriginalName()
        );
        
        $listener->img_path = 'storage/images/'.$request->file('img_path')->getClientOriginalName();
        $listener->save();
        // dd($request->file('img_path'));
        return redirect()->route('listeners.index');
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
        $listener = Listener::find($id);
        // dd($listener);
        return view('listener.edit', compact('listener'));
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
        
        if($request->file('img_path')) {
            $path = Storage::putFileAs(
                'public/images',
                $request->file('img_path'),
                $request->file('img_path')->getClientOriginalName()
            );
            $listener = Listener::where('id', $id)->update([
                'name' => $request->name,
                'address' => $request->address,
                'img_path' => 'storage/images/'.$request->file('img_path')->getClientOriginalName()
            ]);
        }
        else {
            $listener = Listener::where('id', $id)->update([
                'name' => $request->name,
                'address' => $request->address
            ]);
        }
        return redirect()->route('listeners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Listener::destroy($id);
        return redirect()->route('listeners.index');
    }

    public function restore($id) {
        $listener = Listener::withTrashed()->where('id',$id)->first();
        $listener->restore();
        // dd($listener);
        return redirect()->route('listeners.index');
    }

    public function addAlbums() {
        $albums = Album::all();
        // dd($albums);
        return view('listener.add_album', compact('albums'));
    }

    public function addAlbumListener(Request $request) {
        $listener_id = 3;
        foreach($request->album as $album_id) {
            // dump($album_id);
            DB::table('album_listener')->insert([
                'album_id' => $album_id,
                'listener_id' => 1,
                'created_at' => now()
            ]);
        }
        // dd($request->album);
        return redirect()->route('listeners.index');
    }
}
//composer require laravel/ui
// php artisan ui bootstrap --auth
// npm install && npm run dev
// npm run dev
