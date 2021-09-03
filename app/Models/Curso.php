<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    //protected $fillable = ['name', 'description', 'categoria']; //podemos poner todos los campos que se aceptan, o bien, como más abajo, sólo los que deseamos proteger, de momento ninguno, pero puede cambiar.
    
    //en lugar de poner los parametros que se pueden tocar, indicamos los que no se pueden tocar aunque vengan esos parámetros del formulario.
    protected $guarded = []; //para poder hacer asignaciones masivas (por ejemplo en store y update de cursos, al crear y actualizar)
}
