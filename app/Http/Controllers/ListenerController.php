<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listener;

use Storage;

class ListenerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $listener = new Listener();
        $listener->name = $request->first_name . " " . $request->last_name;
        $listener->address = $request->address;
        // $path = Storage::putFile('images', $request->file('img_path'));
        // dd($path);
        $path = Storage::putFileAs(
            'public/images', $request->file('img_path'), $request->file('img_path')->getClientOriginalName()
        );
        $listener->img_path = $path;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
