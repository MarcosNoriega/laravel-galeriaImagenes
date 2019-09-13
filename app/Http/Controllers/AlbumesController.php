<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Foto;

class AlbumesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albumes = Album::where('idUser', \Auth::user()->id)->get();

        return view('albumes.index', compact('albumes'));
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
        $this->validate($request, [
            'titulo' => 'required',
        ]);

        $album = new Album();
        $album->titulo = $request->input('titulo');
        if($request->input('descripcion')){
            $album->descripcion = $request->input('descripcion');
        }
        $album->idUser = \Auth::user()->id;
        $album->save();

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
        $fotos = Foto::where('idAlbum', $id)->get();

        return view('albumes.show', compact('fotos'));
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
        return view('albumes.edit', compact('album'));
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
        $this->validate($request, [
            'titulo' => 'required'
        ]);

        $album = Album::find($id);
        $album->titulo = $request->input('titulo');
        $album->descripcion = $request->input('descripcion');
        $album->save();

        return redirect('Albumes');
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

    public function storePhotos(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'descripcion' => 'required',
            'foto' => 'required'
        ]);

        $file = $request->file('foto');
        $path = public_path() . "/photos";
        $fileName = uniqid() . $file->getClientOriginalName();
        $file->move($path, $fileName);

        $foto = new Foto();
        $foto->nombre = $request->input('nombre');
        $foto->descripcion = $request->input('descripcion');
        $foto->ruta = "photos/". $fileName;
        $foto->idAlbum = $id;
        $foto->save();

        return back();
    }
}
