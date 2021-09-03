@extends('layouts.plantilla')
@section('title', 'esto es el index de cursos')
@section('content')
<h1 class="text-4xl">Hola desde index de CursoController con vista BLADE index. Esto sale al poner /cursos</h1>
<br>
<a class="text-lg underline" href="{{route('cursos.create')}}">Crear Curso</a><!--route() nos da la ruta por el nombre dado en routes-->
<br>
<br>
<!--recogemos cursos como variable pasada desde el controlador.-->
<ul>
        <!--<?php
            foreach($cursos as $cursoConcreto)
            {
                echo "<li>Curso " . $cursoConcreto->id . "-" . $cursoConcreto->name . "</li>";
            }
        ?>-->
        @foreach ($cursos as $curso)
            <li><a class="text-lg" href="{{route('cursos.show', $curso->id)}}">Curso id {{$curso->id}} - {{$curso->name}}</a></li>
         
        @endforeach
</ul>
{{$cursos->links()}}
<div class="container bg-gray-600" style="max-width: 95%">
    <h1>esto es un h1</h1>
    <h2>esto es un h2</h2>
    <h3>esto es un h3</h3>
</div>


@endsection
