<?php

namespace socialCocktail\Http\Requests;

use socialCocktail\Http\Requests\Request;

class EditUserRequest extends Request
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
            'name'=>'min:3|max:40|required',
            'lastName'=>'min:3|max:40|required',
            'pais'=>'min:2|max:2|alpha|required',
            'provincia'=>'min:5|max:50',
            'localidad'=>'min:5|max:50',
            'codigoPostal'=>'max:10000|numeric|alpha_num',
            'domicilio'=>'min:5|max:50',
            'genero'=>'in:Masculino,Femenino|alpha',
            'telefono'=>'max:1000000000000000|numeric',
            'cuit_cuil'=>'min:5|max:50',
            'nacimiento'=>'date',
            'tipoUsuario'=>'in:Usuario,Empresa,Admin|alpha',
        ];
    }
}
