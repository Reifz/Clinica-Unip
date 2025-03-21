<?php 
namespace App\Controllers;

use App\Models\Informativos_model;
use CodeIgniter\Controller;

class Informativos extends Controller
{
    public function listar_informativos()
    {
        return view('Informativos');
    }

}