<?php

namespace App\Http\Controllers;

use App\Services\Prefeitos;
use App\Services\Vereadores;

class ApuracaoController extends Controller
{
    public function index()
    {   
        $candidatosPrefeitos = Prefeitos::getCandidatos();
        $candidatosVereadores = Vereadores::getCandidatos();
        $fotos = [
            '22' => 'https://divulgacandcontas.tse.jus.br/divulga/rest/arquivo/img/2045202024/170002200184/24031',
            '13' => 'https://divulgacandcontas.tse.jus.br/divulga/rest/arquivo/img/2045202024/170002040131/24031',
            '45' => 'https://divulgacandcontas.tse.jus.br/divulga/rest/arquivo/img/2045202024/170002187750/24031',
        ];
        return view('apuracao', ['executivo' => $candidatosPrefeitos, 'fotos' => $fotos, 'vereador' => $candidatosVereadores]);
    }
}
