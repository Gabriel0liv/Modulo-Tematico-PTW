<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ExportJogosToJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:jogos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Exporta todos os jogos para um ficheiro JSON';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $jogos = \App\Models\Jogo::all();
        file_put_contents(storage_path('app/jogos.json'), $jogos->toJson());
    }
}
