<?php

use App\Http\Controllers\CursoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {  //accedemos al método estático get de la clase Route que estamos usando. Veremos que esto es tan solo una fachada (Facade)
    return view('welcome');
    //return "hola que ase";
    //al entrar en "/", es decir, en la raíz del proyecto Blog.
}); */

/* Route::get('cursos', function () {
    return "Bienvenido a cursos";
    //al entrar en "/cursos" tal cual.
});

Route::get('cursos/create', function () {
    return "En esta página podrás crear un curso";
    //al entrar en "/cursos/create" tal cual.
}); */

/*Route::get('cursos/{curso}', function ($curso) {
    return "Bienvenido a curso " . $curso;
    //al entrar en "/cursos/cursoVARIABLE"
});

Route::get('cursos/{curso}/{categoria}', function ($curso, $categoria) {
    return "Bienvenido a curso " . $curso . " de la categoría " . $categoria;
    //al entrar en "/cursos/cursoVARIABLE/categoriaVARIABLE"
});*/

/* Route::get('cursos/{curso}/{categoria?}', function ($curso, $categoria=null) { //se puede inicializar a "" también.
    if($categoria){
        return "Bienvenido a curso " . $curso . " de la categoría " . $categoria;
    }else{
        return "Bienvenido a curso " . $curso;
    }
    //al entrar en "/cursos/cursoVARIABLE/categoriaVARIABLE" con categoriaVARIABLE opcional. Ojo, que hay que inicializar.
    //y ojo también porque esta instrucción hace lo mismo que las otras dos anteriores.

    //Y OJO TAMBIÉN, PORQUE ESTO YA ES DEMASIADA LÓGICA QUE HA DE SER TRATADA POR LOS CONTROLADORES.
    //CREAMOS UN CONTROLADOR PARA CURSOS Y NOS CARGAMOS TODO ESTO, EXCEPTO EL HOMECONTROLLER
}); */

//Route::get('/cursos', 'CursoController@index'); //esto era así en Laravel 7 y anteriores.
Route::get('/', HomeController::class); //llamamos al controlador, lo invocamos nada más. Ya veremos cómo llamamos a métodos y pasamos variables en el siguiente ejemplo.

/* Route::get('/cursos', [CursoController::class, 'index'])->name('cursos.index');
Route::get('/cursos/create', [CursoController::class, 'create'])->name('cursos.create');
Route::post('/cursos', [CursoController::class, 'store'])->name('cursos.store');
Route::get('/cursos/{curso}/edit', [CursoController::class, 'edit'])->name('cursos.edit');
Route::put('/cursos/{curso}', [CursoController::class, 'update'])->name('cursos.update');
Route::get('/cursos/{curso}/', [CursoController::class, 'show'])->name('cursos.show');
Route::delete('/cursos/{curso}/', [CursoController::class, 'destroy'])->name('cursos.destroy'); */
//con el método name() les damos nombre a las rutas para referenciarlas más adelante en todo el proyecto.

//usar "php artisan r:l" para ver las rutas actuales que se generan con esta orden de 1 sóla línea para CRUD.
Route::resource('cursos', CursoController::class);
//si queremos cambiar 'cursos' por otra cosa -> lo cambiamos a pelo (primer parámetro)
//si queremos cambiar 'create' de la ruta por otra cosa -> ResourceVerbs, buscar en doc. oficial.
//si queremos cambiar el nombre de las rutas -> método names('cursos') (si hemos cambiado cursos a asignaturas en el resource, por ejemplo)
//si queremos cambiar el nombre de las variables que se pasan a las rutas -> método parameters('asignaturas'=>'curso')
