@extends('layouts.layout')

@section('contenido')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card animated flipInY">
                <div class="card-header">
                    <h3>Acualizar el album <strong>{{$album->titulo}}</strong></h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('Albumes/update/'. $album->id) }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" name="titulo" id="" class="form-control {{ $errors->has('titulo')? 'is-invalid' : '' }}" placeholder="Titulo" value="{{$album->titulo}}">
                            @if($errors->has('titulo'))
                                <span class="invalid-feedback">{{$errors->first()}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="descripcion" id="" cols="30" rows="10" placeholder="">{{$album->descripcion}}</textarea>
                        </div>

                        <button class="btn btn-info btn-block"><i class="fa fa-pen"></i> Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop