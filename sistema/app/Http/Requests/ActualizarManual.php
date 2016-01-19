<?php

namespace Aplicacion\Http\Requests;

use Aplicacion\Http\Requests\Request;

class ActualizarManual extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
            //'nombre' =>'required|alpha_num|min:6|max:20',
        'nombre' =>'required|alpha_dash|min:6|max:50|',
        //'descripcion' => 'required|alpha_num|min:6|max:20',
       'archivo1'=>'required',
        ];
    }
}
