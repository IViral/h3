<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormSalaoRequest extends FormRequest
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
            'setor'  => 'required',
            'endereco'  => 'required',
            'numero'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nome.required'  => 'Preencha o campo nome',
            'setor.required'  => 'Preencha o campo setor',
            'endereco.required'  => 'Preencha o campo endereço',
            'numero.required'  => 'Preencha o campo telefone',
        ];
    }
}
