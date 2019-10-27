<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  /**
   * [index description]
   * [Carrega a interface de adicionar sistema.]
   * @return [interface principal]
   */
  public function index (){
    return view('index');
  }
}
