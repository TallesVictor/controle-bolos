<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BolosSeeder extends Seeder
{
    static $bolos  = array(
        array('Bolo Hulk', 2.8, 80.00),
        array('Bolo Cinderela', 2.0, 70.00),
        array('Mega Festa', 4.0, 250.75),
        array('Casual', 1.5, 30.75),
        array('Ano Novo', 2.8, 60.00),
    );


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$bolos as $chave => $valor) {
            DB::table('bolos')->insert([
                'nome' => $valor[0],
                'peso' => $valor[1],
                'valor' => $valor[2],
                'quantidade' => rand(0, 100),
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ]);
        }
    }
}
