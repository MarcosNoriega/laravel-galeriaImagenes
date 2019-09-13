@extends('layouts.layout')

@section('contenido')
    <div class="card">
        <div class="card-header text-center">
            <h1>Todas tus fotos</h1>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#exampleModalLong">
                        <i class="fa fa-image"></i> Subir Fotos
                    </button>
            
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Foto Nueva</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{url('Fotos/store')}}" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="nombre" id="" placeholder="Nombre">
                                    </div>

                                    <div class="form-group">
                                        <select name="album" id="" class="form-control">
                                            <option value="" selected>Seleccione un Album</option>
                                            @foreach($albumes as $album)
                                                <option value="{{$album->id}}">{{$album->titulo}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <textarea name="descripcion" id="" cols="30" rows="10" class="form-control"  placeholder="Descripcion"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <input type="file" name="imagen" id="">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                @foreach($fotos as $foto)
                        <div class="col-md-4">
                            <div class="card animated fadeInUp">
                                <img src="{{ asset($foto->ruta) }}" alt="" class="card-img-top">

                                <div class="card-body">
                                    Nombre: {{ $foto->nombre }}
                                    <br>
                                    Descripción: {{ $foto->descripcion }}
                                    <br>
                                    Album: {{ $foto->titulo }}
                                    <br>
                                    <i class="fa fa-clock"></i> <span class="fecha">{{ $foto->fecha_creacion }}</span>
                                </div>

                                <div class="card-footer">
                                    <a href="{{ url('Fotos/edit/'. $foto->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Editar</a>
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-delete"></i> Eliminar</button>
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
    </div>
@stop