<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke() //hacemos el __invoke sólo si es lo único que hace el controlador. Si no, métodos.
    {
        //return "ahora estamos diciendo hola que ase desde homecontroller";
        return view('home');
    }
}
