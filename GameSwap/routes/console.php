<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Console\Commands;

Schedule::command('anuncios:atualizar-estado')->hourly();
Schedule::command('utilizadores:reativar')->hourly();
