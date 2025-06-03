<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;

class ReativarUtilizadores extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'utilizadores:reativar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reativa utilizadores cuja data de reativação chegou';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::where('estado', '!=', 'ativo')
            ->whereNotNull('data_reativacao')
            ->where('data_reativacao', '<=', Carbon::now())
            ->get();

        foreach ($users as $user) {
            $user->estado = 'ativo';
            $user->data_reativacao = null;
            $user->save();
        }

        $this->info('Utilizadores reativados com sucesso.');
    }
}
