<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sistema extends Model
{
  /**
   * [protected description]
   * proteção
   * Só podem ser editados os seguintes campos no banco de dados "atribuição em massa"
   */
  protected $fillable = [
    'id','descricao', 'sigla', 'email', 'url'
  ];

}
