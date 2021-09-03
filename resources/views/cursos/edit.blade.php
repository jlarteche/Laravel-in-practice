@extends('layouts.plantilla')
@section('title', 'esto es el edit de cursos')
@section('content')
<h1>Hola desde edit de CursoController con BLADE vista. Esto sale al poner /cursos/cursoconcreto/edit y servirá para editar un curso</h1>
<form action="{{route('cursos.update', $curso)}}" method="POST">

    {{ csrf_field() }} {{-- esto es equivalente a @csrf --}}
    @method('put') {{-- esto es para pasar el formulario por PUT, ojo, luego en rutas, lo cual es equivalente a
        <input type="hidden" name="_method" value="put" /> --}}
    <br>
    <label>
        Nombre:
        <br>
        <input class="border-2" type="text" name="name" value="{{old('name', $curso->name)}}">
    </label>
    @error('name')
        <small>*{{$message}}</small>
    @enderror
    <br>
    <label>
        Descripción:
        <br>
        <input class="border-2" type="text" name="description" value="{{old('description', $curso->description)}}">
    </label>
    @error('description')
        <small>*{{$message}}</small>
    @enderror
    <br>
    <label>
        Categoría:<br>
        <input class="border-2" type="text" name="categoria"  value="{{old('categoria', $curso->categoria)}}">
    </label>
    @error('categoria')
        <small>*{{$message}}</small>
    @enderror
    <br><br>
    <input class="border-2 border-black" type="submit" value="Editar Curso">
</form>
<br><br>
<form action="{{route('cursos.destroy', $curso->id)}}" method="POST">
    @csrf {{-- token --}}
    @method('delete')
    <input class="border-2 border-black" type="submit" value="Borrar Curso">
</form>

@endsection
