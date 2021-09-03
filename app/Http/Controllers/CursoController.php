<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCurso;
use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public  function index(){
        //en general es la "home"
        //return "Hola desde index de CursoController. Esto sale al poner /cursos";
        //return view('cursos/index');

        //$cursos = Curso::all();
        //return $cursos;
        $cursos = Curso::orderby('id','desc')->paginate(10); //pagina de 15 en 15 por defecto. Poner $cursos->links(); para enlaces en vista.
        return view('cursos.index', compact('cursos')); //compact hace un array []
    }

    public  function create(){
        //en general es para crear un ítem, en este caso, para crear un curso.
        //return "Hola desde create de CursoController. Esto sale al poner /cursos/create y servirá para crear un curso";
        return view('cursos/create');
    }

    public  function store(StoreCurso $request){
        //en general es para insertar un ítem, en este caso, para crear un curso.
        //return "Hola desde create de CursoController. Esto sale al enviar POST a /cursos/create y servirá para crear un curso";
       
        //en $request tenemos el curso a insertar. Vamos a ello.
        //antes de nada, validamos los campos con el objeto $request recibido: $request->validate();
        //OJO, FÍJATE EN EL EDIT DE ESTE MISMO CONTROLADOR, YA QUE SE HACE A PELO, NO CON EL STORECURSO (FormRequest)
        //FÍJATE EN EL PARÁMETRO REQUEST DE ESTE MÉTODO, PORQUE ES DEL TIPO StoreRequest y no Request como en Edit()
        /* $request->validate([ //son los campos del formulario de la vista cursos.create GET. Si no pasa esto no sigue.
            'name' => 'required',
            'description' => 'required',
            'categoria'=> 'required'
        ]); */

        //ahora es cuando es muy importante que los campos del formulario sean exactos a los campos de BBDD, para poder
        //hacer una asignación masiva, es decir, que lo que hay campo por campo, sea en una línea.

        /*$cursoInsert = new Curso;
         
        $cursoInsert->name = $request->name;
        $cursoInsert->categoria = $request->categoria;
        $cursoInsert->description = $request->description;
        $cursoInsert->save(); */

        //HACEMOS LO MISMO PERO EN UNA SÓLA LÍNEA, lo que se llama ASIGNACIÓN MASIVA. OJO QUE EN EL MODELO CURSO HAY QUE DEFINIR $FILLABLE O $GUARDED.
        $cursoInsert = Curso::create($request->all());

        /* //también podría ser: (pero esto sería casi lo mismo que en el primer caso.)
        $cursoInsert = Curso::create([
            'name'=> $request->name,
            'description'=> $request->description,
            'categoria'=> $request->categoria,
        ]); */


        //return redirect()->route('cursos.index');
        return redirect()->route('cursos.show', $cursoInsert->id);
        //return $curso;
        //return view('cursos/create');
    }

    public  function show($curso){
        //en general es para mostrar un ítem concreto, en este caso un curso en concreto
                
        //return view('cursos/show', ['curso'=> $curso]);
        //así pasamos parámetros a la vista. El nombre del array aaociativo es lo que se pasará como variable.
        $curso = Curso::find($curso); //para pasar el modelo objeto completo y no sólo su nombre o id.
        return view('cursos.show', compact('curso'));
        //OJO, ES EQUIVALENTE, AHORA CON EL PUNTO EN LA VISTA Y CON EL COMPACT, QUE HACE LO MISMO YA QUE EL NOMBRE
        //CON EL QUE SE RECIBE LA VARIABLE EN LA VISTA COINCIDE CON EL NOMBRE DE LA VARIABLE EN SÍ.
    }

    public  function edit($id){
        
        $curso = Curso::find($id); //para pasar el modelo objeto completo y no sólo su nombre o id.
        return view('cursos.edit', compact('curso'));
    }

    public  function update($id, Request $request){
        //ACTUALIZAMOS REGISTRO, validando primero. Se puede hacer con FormRequest como en el store()
        $request->validate([ //son los campos del formulario de la vista cursos.create
            'name' => 'required',
            'description' => 'required',
            'categoria'=> 'required'
        ]);

        //nos podemos evitar esta línea si pasamos a la función Curso $id en lugar de sólo el $id. Ver destroy()
        $cursoUpdate = Curso::find($id); 
        //$cursoUpdate->id = $request->id;
        
        /* $cursoUpdate->name = $request->name;
        $cursoUpdate->categoria = $request->categoria;
        $cursoUpdate->description = $request->description;
        $cursoUpdate->save(); //al tener el mismo id, se actualiza en lugar de insertarse. */

        $cursoUpdate->update($request->all());

        return view('cursos.show', ['curso' => $cursoUpdate]); //en lugar de compact.
        //return "aquí modificaremos el curso " . $request->name . " y redireccionamos al curso en concreto.";
    }

    public  function destroy(Curso $curso){
        
        //$curso->destroy($curso->id); //al metodo destroy hay que pasarle el id, pero esto ya lo tenemos:
        $curso->delete();

        /* //y rescatamos los cursos para la vista index y volver a mostrar el listado de cursos.
        $cursos = Curso::orderby('id','desc')->paginate(10); //pagina de 15 en 15 por defecto. Poner $cursos->links(); para enlaces en vista.
        return view('cursos.index', compact('cursos')); //compact hace un array ['cursos'=>$cursos] */

        //OJO, ANTES HEMOS RETURN UNA VIEW, A LA QUE HAY QUE PASAR LOS CURSOS A MOSTRAR. AHORA REDIRIGIMOS A LA RUTA
        //INDEX, A LA QUE NO HAY QUE PASAR NADA, YA QUE LO HACE EL CONTROLADOR.
        return redirect()->route('cursos.index');
        //return "aquí modificaremos el curso " . $request->name . " y redireccionamos al curso en concreto.";
    }
}
