@extends('layouts.music')

@section('contenido')
    <div class="card text-white">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Cancion</th>
                        <th>Artista</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><i path="{{ asset('music/Off-the-Wall-8D.mp3') }}" class="fa fa-play play"></i></td>
                        <td>Off the Wall 8D</td>
                        <td>Michael Jackson</td>
                    </tr>
                    <tr>
                        <td><a href="#"></a><i path="{{ asset('music/shes out my life (remix).mp3') }}" class="fa fa-play play"></i></td>
                        <td>Shes out of my life (Remix Ark4)</td>
                        <td>Michael Jackson</td>
                    </tr>
                    <tr>
                        <td><a href="#"></a><i path="{{ asset('music/Thriller Stephen Gilham - PHD Extended Mix.mp3') }}" class="fa fa-play play"></i></td>
                        <td>Thriller (Extended Version)</td>
                        <td>Michael Jackson</td>
                    </tr>
                    <tr>
                        <td><a href="#"></a><i path="{{ asset('music/You Rock My World (Remix II).mp3') }}" class="fa fa-play play"></i></td>
                        <td>You Rock My World (Remix Ark4)</td>
                        <td>Michael Jackson</td>
                    </tr>
                    <tr>
                        <td><a href="#"></a><i path="{{ asset('music/Hold My Hand Remix remaster.mp3') }}" class="fa fa-play play"></i></td>
                        <td>Hold My Hand (Remix Ark4)</td>
                        <td>Michael Jackson</td>
                    </tr>
                </tbody>
            </table>
        <audio id="audio" class="form-control reproductor" src="" controls="controls" type="audio/mpeg" preload="preload">
        </audio>
        </div>
    </div>
@stop