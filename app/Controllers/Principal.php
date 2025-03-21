<?php 
namespace App\Controllers;

use App\Models\Agendamentos_model;
use CodeIgniter\Controller;

class Principal extends Controller
{
    public function verifica_sessao(){

        if (!session()->has('id_usuario')) {
            session()->destroy();
            return redirect()->to('/usuario/login')->with('erro', 'Sessão não iniciada');
        }
        return null;
    }

    public function home(){

        $redirect = $this->verifica_sessao();

        if ($redirect) {
            return $redirect; 
        }

        $model = new Agendamentos_model();

        $id_usuario = session()->get('id_usuario');
        $dados_agendamento_principal = $model->buscarAgendamentosPrincipal($id_usuario);

        if($dados_agendamento_principal != null){
            $dados['agendamentos'] = $dados_agendamento_principal;
        }else{
            $dados['agendamentos'] = array();
        }
 
        $dados['status'] = array('1'=>"Aberto",'3'=>"Finalizado",'2'=>"Prorrogado",'5'=>"Cancelado");

        $dados['color_status'] = array('1'=>"text-success",'3'=>"text-warning",'2'=>"text-warning",'5'=>"text-danger");
        
        return view('principal',$dados);
    }
}