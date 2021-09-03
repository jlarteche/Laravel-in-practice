<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCurso extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //ponemos a true de momento para no tener problemas de autenticación de momento. Ya lo veremos.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'categoria'=> 'required'
        ];
    }

    public function attributes() //lo mismo que en Resources/lang/es/validation.php pero directamente en el FormRequest
    {
        return [
            'name'=>'nombre del curso',
            'description'=>'descripción del curso',
            'categoria'=>'categoría del curso'
        ];
    }

    public function messages() //lo mismo que en Resources/lang/es/validation.php pero TODO EL MENSAJE.
    {
        return [
            'name.required'=>'El nombre del curso no puede estar vacío',
        ];
    }
}
