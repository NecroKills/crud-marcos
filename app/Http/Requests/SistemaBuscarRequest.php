<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SistemaBuscarRequest extends FormRequest
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
     * request da pagina index
     * @return array
     */
    public function rules()
    {
      $req = SistemaBuscarRequest::all();
        if ($req['email'] == null) {
          return [
            // 'descricao' => 'required_without_all:sigla,email',
            // 'sigla'     => 'required_without_all:descricao,email',
            // 'email'     => 'required_without_all:descricao,sigla'
          ];
        }else{
          return [
            'email'     => 'email'
            // 'descricao' => 'required_without_all:sigla,email',
            // 'sigla'     => 'required_without_all:descricao,email',
            // 'email'     => 'required_without_all:descricao,sigla|email'
          ];
        }
    }

    /**
     * //mensagens de erros da pagina index
     */
    public function messages()
    {
      return [
        'descricao.required_without_all' => 'O campo Descrição é obrigatório quando nenhum dos outros campos forem informados.',
        'sigla.required_without_all'     => 'O campo Sigla é obrigatório quando nenhum dos outros campos forem informados.',
        'email.required_without_all'     => 'O campo Email é obrigatório quando nenhum dos outros campos forem informados.',
        'email.email'        => 'E-mail inválido.',
        ];
    }
}
