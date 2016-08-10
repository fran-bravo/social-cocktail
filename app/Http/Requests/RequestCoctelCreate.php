<?php

namespace socialCocktail\Http\Requests;

use socialCocktail\Http\Requests\Request;

class RequestCoctelCreate extends Request
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
            'nombre'=>'unique:cocteles|required|max:50',
            'metodo'=>'required|exist_metodo',
            'cristal_id'=>'required|exist_cristaleria',
            'preparacion'=>'required',
            'historia'=>'max:500',
            'tipococtel_id'=>'exists:tiposcoctel,id|required',
            'imagen'=>'image',
            'ingredientes'=>'required|cantidad_ingredietes|valid_ingredient|unique_ingredient|unique_coctel',
            'cropx'=>'required|numeric|min:0',
            'cropy'=>'required|numeric|min:0',
            'cropw'=>'required|numeric|min:20',
            'croph'=>'required|numeric|min:20',
            'height'=>'required|numeric|min:20',
            'width'=>'required|numeric|min:20',
        ];
    }
}
