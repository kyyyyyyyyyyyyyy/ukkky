<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Like;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class  FotoController extends Controller
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

        $fotos = Foto::latest()->get();

        $commentCounts = DB::table('comments')
            ->select('foto_id', DB::raw('count(*) as comment_count'))
            ->groupBy('foto_id')
            ->get()
            ->pluck('comment_count', 'foto_id');
        
        $likeCounts = DB::table('likes')
            ->select('foto_id', DB::raw('count(*) as like_count'))
            ->groupBy('foto_id')
            ->get()
            ->pluck('like_count', 'foto_id');

        return view('fotos', compact('fotos', 'commentCounts', 'likeCounts', 'choses', 'albums'));
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

        $validation = Validator::make($request->all(),[
            'image' => 'required|mimes:png,jpg,jpeg'
        ],[
            'image.required' => 'File surat wajib diisi.',
            'image.mimes' => 'Format file tidak didukung. Harap pilih file dengan format pdf, doc, atau docx.'
        ]);

        // Simpan file
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $fileName = 'mailFile_' . date('ymdhis') . '.' . $extension;
        $file->move(public_path('penyimpanan'), $fileName);

        Foto::create([
            'title' => $request->title,
            'album_id' => $request->album_id,
            'image' => $fileName, 
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

    public function liked(Request $request)
    {

        $value = Like::where('foto_id', $request->foto_id)->where('user_id', Auth::user()->id)->first();

        if($value){
            $value->delete();
            return redirect()->back();
        } else {
            Like::create([
                'foto_id' => $request->foto_id,
                'user_id' => Auth::user()->id,
            ]);

            return redirect()->back();
        }

    }
}
