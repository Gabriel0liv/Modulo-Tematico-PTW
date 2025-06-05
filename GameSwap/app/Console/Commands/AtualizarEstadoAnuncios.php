<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Jogo;
use App\Models\Console as ConsoleModel;
use Carbon\Carbon;

class AtualizarEstadoAnuncios extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'anuncios:atualizar-estado';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Atualiza o estado dos anúncios conforme o estado dos utilizadores';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Desativar anúncios de contas banidas/inativas
        $users = User::whereIn('estado', ['banido', 'suspenso'])->get();
        foreach ($users as $user) {
            Jogo::where('id_anunciante', $user->id)->update(['ativo' => 0]);
            ConsoleModel::where('id_anunciante', $user->id)->update(['ativo' => 0]);
        }
        // Reativar anúncios de contas reativadas
        $usersReativados = User::where('estado', 'ativo')->get();

        foreach ($usersReativados as $user) {
            Jogo::where('id_anunciante', $user->id)
                ->where('id_comprador', null)
                ->update(['ativo' => 1]);
            ConsoleModel::where('id_anunciante', $user->id)
                ->where('id_comprador', null)
                ->update(['ativo' => 1]);
        }

        $this->info('Estados dos anúncios atualizados.');
    }
}
