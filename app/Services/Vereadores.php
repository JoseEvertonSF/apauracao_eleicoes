<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class Vereadores {

    public static function getCandidatos()
    {   
        $url = 'https://gdp-oficial-apuracao.s3.amazonaws.com/apuracao/json2020-1turno/pe/escada/vereador.json';
        $candidatosVereadores = Http::get($url)->json();
        return $candidatosVereadores;
    }
}