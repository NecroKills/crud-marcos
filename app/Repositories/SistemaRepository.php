<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\Sistema;
class SistemaRepository
{

	/**
	 * @var Sistema
	 */
	private $sistema;

	/**
	 * SistemaRepository constructor.
	 *
	 * @param Sistema $sistema
	 */
	 public function __construct(Sistema $sistema)
	 	{
 			$this->sistema = $sistema;
	 	}


	/**
	 * [findAll description]
	 * Função verifica se existem valores nos campos de entrada,
	 * se existir faz a busca no banco e retorna os valores encontrados.
	 * @param  [type] $req [description]
	 * @return [type]      [description]
	 */
	public function findAll($req)
	{
		$descricao = $req['descricao'];
		$sigla = $req['sigla'];
		$email = $req['email'];

		if($req->has('descricao')){
			$registro = DB::select(DB::raw("SELECT controles.id, controles.status, controles.sistemas_id, sistemas.id, sistemas.descricao, sistemas.sigla, sistemas.email, sistemas.url
																			FROM controles
																			INNER JOIN sistemas ON controles.sistemas_id = sistemas.id
																			WHERE sistemas.descricao = '$descricao'
																			AND controles.id = (SELECT MAX(aux.id) FROM controles aux
																			WHERE aux.sistemas_id = sistemas.id)"));
		}

		if($req->has('sigla')){
			$registro = DB::select(DB::raw("SELECT controles.id, controles.status, controles.sistemas_id, sistemas.id, sistemas.descricao, sistemas.sigla, sistemas.email, sistemas.url
																			FROM controles
																			INNER JOIN sistemas ON controles.sistemas_id = sistemas.id
																			WHERE sistemas.sigla = '$sigla'
																			AND controles.id = (SELECT MAX(aux.id) FROM controles aux
																			WHERE aux.sistemas_id = sistemas.id)"));
		}

		if($req->has('email')){
			$registro = DB::select(DB::raw("SELECT controles.id, controles.status, controles.sistemas_id, sistemas.id, sistemas.descricao, sistemas.sigla, sistemas.email, sistemas.url
																			FROM controles
																			INNER JOIN sistemas ON controles.sistemas_id = sistemas.id
																			WHERE sistemas.email = '$email'
																			AND controles.id = (SELECT MAX(aux.id) FROM controles aux
																			WHERE aux.sistemas_id = sistemas.id)"));
		}

		if ( (empty($descricao) && empty($sigla) && empty($email) ) == 1) {
			$registro = DB::select(DB::raw("SELECT controles.id, controles.status, controles.sistemas_id, sistemas.id, sistemas.descricao, sistemas.sigla, sistemas.email, sistemas.url
																			FROM controles
																			INNER JOIN sistemas ON controles.sistemas_id = sistemas.id
																			WHERE sistemas.descricao = '$descricao'
																			AND
																			sistemas.sigla = '$sigla'
																			AND
																			sistemas.email = '$email'
																			AND controles.id = (SELECT MAX(aux.id) FROM controles aux
																			WHERE aux.sistemas_id = sistemas.id)"));
		}

		return $registro;
	}


	/**
	 * Cadastra um novo sistema.
	 *
	 * @param $dados
	 */
	public function create($dados)
	{
		$sistema = $this->sistema->create($dados);
		return $sistema;
	}

	/**
	 * [edit description]
	 * Função busca os valores do sistema conforme o $id passado
	 * @param  [type] $id [description]
	 */
	public function edit($id)
	{
		$registro = DB::table('sistemas')->
										join('controles', 'sistemas.id', '=', 'controles.sistemas_id')->
										select('sistemas.id', 'sistemas.descricao', 'sistemas.sigla', 'sistemas.email', 'sistemas.url',
										'controles.status', 'controles.usuario', 'controles.justificativa', 'controles.updated_at')->
										where('sistemas.id','=', $id)->latest('controles.id')->first();

		return $registro;
	}

	/**
	 * Atualiza os dados do sistema.
	 *
	 * @param $idSistema, $dados
	 */
	public function atualizar($idSistema, $dados)
	{
		$sistema = $this->sistema->find($idSistema)->update($dados);
	}

}
