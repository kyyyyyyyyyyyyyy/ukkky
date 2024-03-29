<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::latest()->get();

        $choses = Album::where('user_id', Auth::user()->id)->select('id', 'name')->latest()->get();
    
        // Menggunakan "with" untuk mengambil relasi fotos dari setiap album
        $albums->load('fotos');
    
        return view('dashboard', [
            'albums' => $albums,
            'choses' => $choses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Album::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->back();
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

        $album = Album::find($id);

        $fotos = Foto::where('user_id', Auth::user()->id)->select('id', 'title', 'image', 'album_id')->latest()->get();

        $choses = Album::where('user_id', Auth::user()->id)->select('id', 'name')->latest()->get();

        return view ('action.album', compact(['album', 'fotos', 'choses']));

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
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
        ];

        Album::where('id', $id)->update($data);

        return redirect()->route('albums.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foto = Foto::where('album_id', $id)->get();

        foreach ($foto as $item) {
            $path = public_path('penyimpanan/' . $item->image);

            if (file_exists($path)) {
                unlink($path);
            }

            $item->delete();
        }

        Album::find($id)->delete();

        return redirect()->route('albums.index');


    }
}
