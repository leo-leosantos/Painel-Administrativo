<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Livro;
class LivroRequest extends FormRequest
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
            'titulo' => 'required|max:100',
            'autor' => 'required|max:50',
            'numero_pagina' => 'required',
            'editora' => 'required|max:50',
            'data_inicio_leitura' => 'required',
            'foto_capa' => ['required','image','dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'],
            'sinopse' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute  é obrigatório',
            'titulo.max' => 'O campo titulo comporta no maximo 100 caracteres',
            'autor.max' => 'O campo titulo comporta no maximo 100 caracteres',
            'foto_capa.required'=>'Permitido  apenas imagens'
        ];
    }


}
