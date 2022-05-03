<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RodapeRequest extends FormRequest
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
            'frase' =>'required|min:5|max:650',
            'autor_frase'=>'required|min:3|max:50'
        ];
    }

    public function messages()
    {
        return [
            'autor_frase.required' => 'O campo Autor da frase  é obrigatório',
            'frase.required' => 'O campo frase do rodapé  é obrigatório',
            'autor_frase.min' => 'O campo Autor da frase permite no minimo  3 caracteres',
            'autor_frase.max' => 'O campo Autor da frase comporta no máximo 150 caracteres',
            'frase.min' => 'O campo frase permite no minimo  3 caracteres',
            'frase.max' => 'O campo frase comporta no máximo 650 caracteres',
        ];
    }
}
