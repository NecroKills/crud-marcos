<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Controle extends Model
{
  /**
   * [protected description]
   * proteção
   * Só podem ser editados os seguintes campos no banco de dados "atribuição em massa"
   */
  protected $fillable = [
    'id','status', 'usuario', 'justificativa', 'sistemas_id'
  ];

}
