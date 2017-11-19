<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCorteRequest extends FormRequest
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
            'nome'  => 'required',
            'preco'  => 'required',
            'img'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nome.required'  => 'Preencha o campo nome',
            'preco.required'  => 'Preencha o campo preço',
            'img.required'  => 'Preencha o campo imagem',
        ];
    }
}
