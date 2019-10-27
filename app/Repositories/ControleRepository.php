<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\Controle;

class ControleRepository
{

	/**
	 * @var Controle
	 */
	private $controle;

	/**
	 * ControleRepository constructor.
	 *
	 * @param Controle $controle
	 */
	 public function __construct(Controle $controle)
	 	{
				$this->controle = $controle;
	 	}

	/**
	 * Cadastra um novo controle no ID passado.
	 *
	 * @param $id
	 */
	public function create($id)
	{
			$controle = $this->controle->create([
				'sistemas_id' => $id,
				'justificativa'=> 'Criação do sistema',
			]);
			return true;
	}

	/**
	 * Atualiza os dados do sistema.
	 *
	 * @param $idSistema, $dados, $status, $justificativa
	 */
	public function atualizar($idSistema, $justificativa, $status, $dados)
	{
			$justificativa = $dados['justificativa'];
			$controle = $this->controle->create([
						'sistemas_id' => $idSistema,
						'justificativa' => $justificativa,
						'status' => $status,
			]);
			return true;
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

		return view('sistema.editar', compact('registro'));
	}


}
