<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApuracaoController extends Controller
{
    public function index()
    {   
        $urlPrefeito = 'https://s.glbimg.com/jo/el/2020/apuracao/1-turno/pe/semantica.globo.com/base/Cidade_Escada_PE/executivo.json';
        $urlVereador = 'https://gdp-oficial-apuracao.s3.amazonaws.com/apuracao/json2020-1turno/pe/escada/vereador.json';
        $candidatosPrefeitos = Http::get($urlPrefeito)->json();
        $candidatosVereadores = Http::get($urlVereador)->json();
        return view('apuracao', ['executivo' => $candidatosPrefeitos, 'vereador' => $candidatosVereadores]);
    }
}
