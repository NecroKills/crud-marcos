<?php

namespace App\Business;

use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

use App\Repositories\SistemaRepository;
use App\Repositories\ControleRepository;

/**
 * Class SistemaBusiness
 *
 * @package App\Business
 */
class SistemaBusiness
{

    /**
     * @var SistemaRepository
     */
    private $sistemaRepository;

    /**
     * @var ControleRepository
     */
    private $controleRepository;

    /**
     * SistemaRepository constructor.
     *
     * @param SistemaRepository $SistemaRepository
     * @param ControleRepository $controleRepository
     * @return App\Repositories\SistemaRepository
     * @return App\Repositories\ControleRepository
     */
    public function __construct(SistemaRepository $sistemaRepository, ControleRepository $controleRepository)
    {
        $this->sistemaRepository = $sistemaRepository;
        $this->controleRepository = $controleRepository;
    }

    /**
     * envia os dados para a função findAll do SistemaRepository.
     *
     * @param $req
     */
    public function findAll($req)
    {
        return $this->sistemaRepository->findAll($req);
    }

    /**
     * envia os dados para a função edit do SistemaRepository.
     *
     * @param $id
     */
    public function edit($id)
    {
        $registro = $this->sistemaRepository->edit($id);
        return $registro;
    }

    /**
     * envia os dados para a função create do SistemaRepository.
     * envia o $id do sistema cadastro para a função create do ControleRepository.
     * @param $dados
     */
    public function create($dados)
    {
        $sistema = $this->sistemaRepository->create($dados);
        $id =$sistema['id'];
        $controle = $this->controleRepository->create($id);
        if ($controle == true) {
          return $controle;
        }
    }

    /**
     * envia os dados para a função atualizar do SistemaRepository.
     * envia os dados para a função atualizar do ControleRepository.
     *
     * @param $idSistema, $dados, $status
     */
    public function atualizar($idSistema, $dados, $status)
    {
        $sistema = $this->sistemaRepository->atualizar($idSistema, $dados);
        $justificativa = $dados['justificativa'];
        $controle = $this->controleRepository->atualizar($idSistema, $justificativa, $status, $dados);
        if ($controle == true) {
          return $controle;
        }
    }

}
