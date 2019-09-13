@extends('layouts.layout')

@section('contenido')
    <div class="card">
        <div class="card-header text-center h1">
            Fotos del Album
        </div>
    
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-image"></i> Subir Fotos
                    </button>
    
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Nueva Foto</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input class="form-control {{$errors->has('nombre') ? 'is-invalid' : ''}}" type="text" name="nombre" id="" placeholder="Nombre">
                                            @if($errors->has('nombre'))
                                                <span class="invalid-feedback">{{ $errors->first('nombre') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control {{$errors->has('descripcion') ? 'is-invalid' : ''}}" name="descripcion" id="" cols="30" rows="10" placeholder="Descripción"></textarea>
                                            @if($errors->has('descripcion'))
                                                <span class="invalid-feedback">{{ $errors->first('descripcion') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="file" name="foto" id="">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-success">Subir</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                @foreach($fotos as $foto)
                <div class="col-md-4 mt-3">
                    <div class="card hvr-bob">
                        <a href="{{ asset($foto->ruta) }}" class="fancybox" rel="group"><img src="{{ asset($foto->ruta) }}" alt="" class="card-img-top img-fluid"></a>

                        <div class="card-body">
                            <br>
                            Nombre: {{ $foto->nombre }}
                            <br>
                            Descripcion: {{ $foto->descripcion }}
                            <br>
                            <i class="fa fa-clock"></i> <span class="fecha">{{ $foto->fecha_creacion }}</span>
                        </div>

                        <div class="card-footer">
                            <form action="{{ url('Fotos/destroy/'. $foto->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger delete"><i class="fa fa-trash-alt"></i> Eliminar</button>
                                <a href="{{url('Fotos/edit/'. $foto->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i> Editar</a>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
@stop