<?php

namespace Database\Seeders;

use App\Models\Concelho;
use App\Models\Distrito;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


  class DistritoConcelhoSeeder extends Seeder
{
    public function run()
    {
        $path = database_path('data/distritos_concelhos.json');
        $dados = json_decode(file_get_contents($path), true);

        foreach ($dados as $nomeDistrito => $concelhos) {
            $distrito = Distrito::create(['nome' => $nomeDistrito]);

            foreach ($concelhos as $nomeConcelho) {
                Concelho::create([
                    'nome' => $nomeConcelho,
                    'distrito_id' => $distrito->id,
                ]);
            }
        }
    }
}
