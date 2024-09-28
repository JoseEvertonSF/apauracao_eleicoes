<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Prefeitos;
use App\Services\Vereadores;
use App\Events\VotosApuradosEvent;

class ApuracaoVotos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:apuracao-votos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Apurações de votos';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        list($infoGerais, $candidatosPrefeitos) = Prefeitos::getAtualizacao();
        $candidatosVereadores = Vereadores::getAtualizacao();
        $atualizacao = ['infoGerais' => $infoGerais, 'executivo' => $candidatosPrefeitos, 'vereador' => $candidatosVereadores];
        VotosApuradosEvent::dispatch('oi');
    }
}
