<?php

namespace Aplicacion\Http\Requests;

use Aplicacion\Http\Requests\Request;
use Illuminate\Validation\Factory;//importacion de la calse para la validacion 
//use Illuminate\Http\Validator;

class RegistrarManual extends Request
{
    
public function __construct(Factory $factory)
    {
        $factory->extend('alpha_spaces', function ($attribute, $value, $parameters)
            {
                return preg_match('/^[\pL\s]+$/u', $value);
            },
            'falso'
        );
    }

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */


    public function rules()
    {
        return [
         //alpha es para solo letras
        //'nombre'=>'required|unique:manuales,nombre',
         'nombre' =>'required|alpha_spaces|min:6|max:50|',
         //'descripcion' => 'required|alpha_num|min:6|max:20',
         'descripcion'=>'required|alpha_spaces|min:10|max:50',
         'archivo1'=>'required',
        
        ];
    }


}
