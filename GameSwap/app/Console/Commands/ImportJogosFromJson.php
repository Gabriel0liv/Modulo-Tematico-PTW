<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportJogosFromJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:jogos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $json = file_get_contents(storage_path('app/jogos.json'));
        $jogos = collect(json_decode($json));

        $jogos->each(function ($dados) {
            $jogo = new \App\Models\Jogo((array)$dados);
            $jogo->searchable();
        });
    }
}
