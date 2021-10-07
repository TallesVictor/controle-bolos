<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailsSeeder extends Seeder
{
    static $emails  = array(
        array('Jose Silva', 'josesilva@gmail.com', 2),
        array('Maria Silva', 'mariasilva@gmail.com', 1),
        array('Nomad Hiest', 'hiest@gmail.com', 1),
        array('Daniel Bandeira', 'danibandeira@gmail.com', 3),
        array('Diogo Homes', 'diogohomes@gmail.com', 5),
        array('Carlos Lucas da Silva', 'carloslucas@gmail.com', 4),
    );


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$emails as $chave => $valor) {
            DB::table('emails')->insert([
                'nome' => $valor[0],
                'email' => $valor[1],
                'bolo_id' => $valor[2],
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ]);
        }
    }
}
