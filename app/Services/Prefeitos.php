<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class Prefeitos {

    public static function getCandidatos()
    {   
        $url = 'https://s.glbimg.com/jo/el/2024/apuracao/1-turno/pe/semantica.globo.com/base/Cidade_Escada_PE/executivo.json';
        $candidatosPrefeitos = Http::get($url)->json();
        return $candidatosPrefeitos;
    }
}