<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SistemaCadastrarRequest extends FormRequest
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
     *request da pagina adicionar
     * @return array
     */
    public function rules()
    {
      $req = SistemaCadastrarRequest::all();
        if ($req['email'] == null) {
          return [
            'descricao' => 'required|max:100',
            'sigla'     => 'required|max:10',
            'url'       => 'max:50',
          ];
        }else {
          return [
            'descricao' => 'required|max:100',
            'sigla'     => 'required|max:10',
            'url'       => 'max:50',
            'email'     => 'max:100|email|email'
          ];
        }
    }

/**
 * [exibe mensagens de erro de acordo com cada campo]
 * @return [mensagem] [mensagens de erros]
 */
    public function messages()
    {
      return [
        'descricao.required' => 'O campo Descrição é obrigatório.',
        'sigla.required'     => 'O campo Sigla é obrigatório.',
        'email.email'        => 'E-mail inválido.',
        'url.url'                            => 'URL inválido.',
        'descricao.max:100' => 'O campo Descrição tem limite de 100 caracteres.',
        'sigla.max:10'     => 'O campo Sigla tem limite de 10 caracteres.',
        'email.max:100'        => 'O campo E-mail tem limite de 100 caracteres.',
        'url.max:50'                            => 'O campo URL tem limite de 50 caracteres.',
        'email.unique'        => 'E-mail já cadastrado.'
        ];
    }
}
