@extends('layouts.plantilla')
@section('title', 'Bienvenido al curso ' . $curso->name . ' de la categoría ' . $curso->categoria)
@section('content')
    {{-- <?php
        $mensaje = "Hola desde show de CursoController. Esto sale al poner /cursos/uncursoVARIABLE/categoriaOPCIONALyVARIABLE<br><br>";
        $mensaje = $mensaje . "Bienvenido a BLADE curso " . $curso->name . " de la categoría " . $curso->categoria;
    ?>
    <h1><?php echo $mensaje; ?></h1> --}}
    {{-- <!--<h1>{{$mensaje}}</h1>--> <!-- NO es lo mismo porque los <br> no los pone tal cual, sino con html entities...--> --}}
    <div class="text-4xl">Bienvenido al curso {{$curso->name}}</div>
    <br><a class="underline" href="{{route('cursos.index')}}">Volver a cursos</a><br>
    <br><a class="underline" href="{{route('cursos.edit', $curso->id)}}">Editar/Borrar curso</a>
    <br><br><p><strong>Categoría: </strong>{{$curso->categoria}}</p>
    <br><p>{{$curso->description}}</p>
@endsection


