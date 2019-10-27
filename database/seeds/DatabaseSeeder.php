<?php

use Illuminate\Database\Seeder;
use App\Models\Sistema;
use App\Models\Controle;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=0; $i<50 ; $i++) {
        $sistema = Sistema::create([
  			'descricao' 			=> 'laiza',
  			'sigla' 			=> 'l',
  			'email' 		=> 'l.aiza.saraiva@gmail.com',
        'url' 		=> 'www.mayconelaiza.com.br',
      	]);
        $id = $sistema['id'];
        Controle::create([
          'sistemas_id' => $id,
          'justificativa'=> 'Criação do sistema',
        ]);
      }
    }
}
