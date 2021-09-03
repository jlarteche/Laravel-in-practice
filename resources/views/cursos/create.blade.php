@extends('layouts.plantilla')
@section('title', 'esto es el create de cursos')
@section('content')
<h1>Hola desde create de CursoController con BLADE vista. Esto sale al poner /cursos/create y servirá para crear un curso</h1>
<br>
<form action="{{route('cursos.store')}}" method="POST">
    {{ csrf_field() }} {{-- esto es equivalente a @csrf --}}
    <label>
        Nombre:
        <br>
        <input class="border-2" type="text" name="name" value="{{old('name')}}">
    </label>
    @error('name')
        <small>*{{$message}}</small>
    @enderror
    <br>
    <label>
        Descripción:
        <br>
        <input class="border-2" type="text" name="description"  value="{{old('description')}}">
    </label>
    @error('description')
        <small>*{{$message}}</small>
    @enderror
    <br>
    <label>
        Categoría:
        <br>
        <input class="border-2" type="text" name="categoria"  value="{{old('categoria')}}">
    </label>
    @error('categoria')
        <small>*{{$message}}</small>
    @enderror
    <br><br>
    <input class="border-2 border-black" type="submit" value="Crear Curso">
</form>
@endsection
