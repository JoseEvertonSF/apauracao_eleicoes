<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class Vereadores {

    public static function getCandidatos()
    {   
        $url = 'https://s.glbimg.com/jo/el/2024/apuracao/1-turno/pe/semantica.globo.com/base/Cidade_Escada_PE/vereador.json';
        $candidatosVereadores = Http::get($url)->json();
        return $candidatosVereadores;
    }

    public static function getAtualizacao(): array
    {
        $dadosAtualizacoes = Vereadores::getCandidatos();
        $atualizacoesPrefeito = [];
        foreach($dadosAtualizacoes['candidatos'] as $candidato)
        {
            $atualizacoesPrefeito[] = [
                'numero' => $candidato['numero'],'eleito' => $candidato['eleito'],
                'posicao' => $candidato['posicao'],
                'votos' => [
                    'porcentagem' => $candidato['votos']['porcentagem'],
                    'quantidade' => $candidato['votos']['quantidade'],
                ]
            ];
        }

        return $atualizacoesPrefeito;
        
    }
}