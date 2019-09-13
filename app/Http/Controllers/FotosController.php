<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Foto;
use App\Album;

class FotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idUsuario = \Auth::user()->id;
        $fotos = \DB::select("SELECT F.id, F.nombre, F.descripcion, F.ruta, A.titulo, F.fecha_creacion FROM fotos F JOIN albumes A on F.idAlbum = A.id where A.idUser = $idUsuario");
        $albumes = Album::where('idUser', \Auth::user()->id)->get();
        return view('fotos.index', compact('fotos', 'albumes'));
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
        $file = $request->file('imagen');
        $path = public_path() . "/photos";
        $fileName = uniqid() . $file->getClientOriginalName();
        $file->move($path, $fileName);


        $foto = new Foto();
        $foto->nombre = $request->input('nombre');
        $foto->descripcion = $request->input('descripcion');
        $foto->idAlbum = $request->input('album');
        $foto->ruta = "photos/" . $fileName;
        $foto->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
       $nombre = $request->input('nombre');
       
       $fotos = \DB::select("Select * from fotos where nombre LIKE '%$nombre%'");

       return $fotos;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $foto = Foto::find($id);

        $albumes = Album::where('idUser', \Auth::user()->id)->get();

        return view('fotos.edit', compact('foto', 'albumes'));
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
        $foto = Foto::find($id);
        $foto->nombre = $request->nombre;
        $foto->idAlbum = $request->album;
        $foto->descripcion = $request->descripcion;
        $foto->save();

        //return redirect('/Albumes/show/'. $foto->idAlbum);
        return redirect(route('foto.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foto = Foto::find($id);
        $ruta = public_path() . "/" . $foto->ruta; 
        $borrar = \File::delete($ruta);

        if($borrar){
            $foto->delete();
        }

        return back();
    }
}
