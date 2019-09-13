@extends('layouts.layout')

@section('contenido')
    <div class="card">
        <div class="card-header text-center">
            <h1 class="display-4">Albumes</h1>
        </div>
    
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-folder-plus"></i> Crear Nuevo Album
                    </button>
    
    
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Album</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('albumes.store') }}" method="post">
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input class="form-control {{ $errors->has('titulo') ? ' is-invalid' : '' }}" type="text" name="titulo" id="" placeholder="Titulo">
                                            @if($errors->has('titulo'))
                                                <span class="invalid-feedback">{{ $errors->first('titulo') }}</span>
                                            @endif
                                            
                                        </div>
    
                                        <div class="form-group">
                                            <textarea class="form-control" name="descripcion" id="" cols="30" rows="10"
                                                placeholder="Descripción"></textarea>
                                        </div>
    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button class="btn btn-success" type="submit">Crear</button>
                                    </div>
                                </form>
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>

            @foreach($albumes as $album)
            <div class="row mt-3">
                <div class="col">
                    <div class="card animated bounceInLeft">
                        <div class="card-header text-center h3">
                            {{ $album->titulo }}
                        </div>

                        <div class="card-body">
                            {{ $album->descripcion }}
                        </div>

                        <div class="card-footer">
                            <a href="{{ url('Albumes/show/'.$album->id) }}" class="btn btn-primary">Ir al Album</a>
                            <a href="{{ url('Albumes/edit/'.$album->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Editar</a>
                            <a href="#" class="btn btn-danger"><i class="fa fa-trash-alt"></i> Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@stop