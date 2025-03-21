<?php 
namespace App\Controllers;


use CodeIgniter\Controller;

class Informacoes extends Controller
{
    public function quemsomos()
    {
        return view('quemsomos');
    }

    public function informacoes_sistema()
    {
        return view('informacoes_sistema');
    }

    public function objetivo_clinica()
    {
        return view('objetivo_clinica');
    }
}