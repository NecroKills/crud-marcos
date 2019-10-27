<?php

namespace App\Http\Controllers;

use App\Business\SistemaBusiness;
use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\CollectionStdClass;
use App\Http\Requests\SistemaBuscarRequest;
use App\Http\Requests\SistemaCadastrarRequest;
use App\Http\Requests\SistemaAtualizarRequest;
use App\Http\Controllers\HomeController;

class SistemaController extends Controller
{
    /**
     * @var SistemaBusiness
     */
    private $sistemaBusiness;

    /**
     * SistemaController constructor.
     *
     * @param SistemaRepository $sistemaBusiness
     */
    public function __construct(SistemaBusiness $sistemaBusiness)
    {
        $this->sistemaBusiness = $sistemaBusiness;
    }

    /**
     * [function buscar description]
     * @param  SistemaBuscarRequest $req [string: descricao, sigla, email, id, token, status]
     * @return [array]       [array dos registros encontrados no banco]
     */
    public function buscar(SistemaBuscarRequest $req){
      $req->all();
      $registro = $this->sistemaBusiness->findAll($req);
      return view('index',compact('registro'));
    }

    /**
     * [Carrega a interface de adicionar sistema.]
     * @return [interface adicionar]
     */
    public function adicionar()
    {
      return view('sistema.adicionar');
    }

    /**
     * [salva registros do sistema no banco]
     * @param  Request $req [string: descricao, sigla, email, url, token]
     * @return [redireciona para interface do sistema]
     */
    public function salvar(SistemaCadastrarRequest $req)
    {
      $dados = array_filter($req->all());
      $resposta = $this->sistemaBusiness->create($dados);
      return view('index', compact('resposta'));
    }


    /**
     * [Carrega a interface de editar sistema.]
     * @param  [int] $id [id do sistema selecionado]
     * @return [array]     [dados do sistema]
     */
    public function editar($id)
    {
      $registro = $this->sistemaBusiness->edit($id);
      return view('sistema.editar', compact('registro'));
    }

    /**
     * [atualizar, atualiza dados do sistema no banco]
     * @param  Request $req [string: descricao, sigla, email, url, status, justificativa, token]
     * @param  [type]  $id  [int: id do sistema]
     * @return [type]       [redireciona para interface do sistema]
     */
    public function atualizar(SistemaAtualizarRequest $req, $id)
    {
      $idSistema = $id;
      $dados = $req->all();
      $status = $dados['status'];
      $resposta = $this->sistemaBusiness->atualizar($idSistema, $dados, $status);
      return view('index', compact('resposta'));
    }

}
