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
        return view('apuracao', ['executivo' => $candidatosPrefeitos, 'vereador' => $candidatosVereadores]);
    }
}
