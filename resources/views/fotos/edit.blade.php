@extends('layouts.layout')

@section('contenido')
    <div class="row justify-content-md-center">
        <div class="col-md-5">
            <div class="card animated flipInY sombra2">
                <img src="{{ asset($foto->ruta) }}" alt="" class="card-img-top">
                <div class="card-body">
                    <form action="{{ url('Fotos/update/'. $foto->id) }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="{{ $foto->nombre }}">
                        </div>

                        <div class="form-group">
                            <select name="album" id="" class="form-control">
                                <option value="">Seleccione un Album</option>
                                @foreach($albumes as $album)
                                    @if($album->id == $foto->idAlbum)
                                        <option value="{{ $album->id }}" selected>{{ $album->titulo }}</option>
                                    @else
                                        <option value="{{ $album->id }}">{{ $album->titulo }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
            
                        <div class="form-group">
                            <textarea class="form-control" name="descripcion" id="" cols="30" rows="10" placeholder="descripcion">{{ $foto->descripcion }}</textarea>
                        </div>
            
                        <button type="submit" class="btn btn-success btn-block">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop