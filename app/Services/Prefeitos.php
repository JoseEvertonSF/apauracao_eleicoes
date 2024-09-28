<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class Prefeitos {

    public static function getCandidatos(): array
    {   
        $url = 'https://s.glbimg.com/jo/el/2024/apuracao/1-turno/pe/semantica.globo.com/base/Cidade_Escada_PE/executivo.json';
        $candidatosPrefeitos = Http::get($url)->json();
        return $candidatosPrefeitos;
    }

    public static function getAtualizacao(): array
    {
        $dadosAtualizacoes = Prefeitos::getCandidatos();

        $atualizacoesGerais = [
            'andamento' => $dadosAtualizacoes['abrangencia']['andamento'], 
            'secoes' => [$dadosAtualizacoes['abrangencia']['secoes'], $dadosAtualizacoes['abrangencia']['secoesTotalizadas']], 
            'votosApurados' => [$dadosAtualizacoes['abrangencia']['votos']['apurados']['quantidade'], $dadosAtualizacoes['abrangencia']['eleitores']], 
            'votosBranco' => $dadosAtualizacoes['abrangencia']['votos']['brancos']['quantidade']
        ];

        $atualizacoesPrefeito = [];
        foreach($dadosAtualizacoes['candidatos'] as $candidato)
        {
            $atualizacoesPrefeito[] = [
                'numero' => $candidato['numero'],
                'eleito' => $candidato['eleito'],
                'matEleito' => $candidato['matEleito'], 
                'classificacao' => $candidato['classificacao'],
                'votos' => [
                    'porcentagem' => $candidato['votos']['porcentagem'],
                    'quantidade' => $candidato['votos']['quantidade'],
                ]
            ];
        }

        return [$atualizacoesGerais, $atualizacoesPrefeito];

    }
}