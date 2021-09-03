@extends('layouts.plantilla')
@section('title', 'esto es el homerrr')
@section('content')
<h1>ahora estamos diciendo hola que ase desde la vista home BLADE llamada por homecontroller</h1>
<br>
<h2>Entrar a cursos: <a class="underline" href="{{route('cursos.index')}}">Cursos</a></h2>
@endsection
