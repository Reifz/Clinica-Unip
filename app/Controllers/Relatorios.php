<?php 
namespace App\Controllers;

use App\Models\Relatorios_model;
use CodeIgniter\Controller;

class Relatorios extends Controller
{

    public function verifica_sessao(){

        if (!session()->has('id_usuario')) {
            session()->destroy();
            return redirect()->to('/usuario/login')->with('erro', 'Sessão não iniciada');
        }
        return null;
    }

    public function listar_relatorio()
    {
        $redirect = $this->verifica_sessao();

        if ($redirect) {
            return $redirect; 
        }
        
        $model = new Relatorios_model();

        $agendamentos = $model->buscarAgendamentosRelatorioMensal();

        $resultado = [];
        if($agendamentos != null){
            foreach ($agendamentos as $agendamento) {
                $mes = date('M', strtotime($agendamento['data_agendamento'])); // Formato 'YYYY-MM'
                if (!isset($resultado[$mes])) {
                    $resultado[$mes] = 0;
                }
                $resultado[$mes]++;
            }
    
            ksort($resultado);
        }
     

        $agendamentos_total = $model->buscarAgendamentosRelatorioTotal();
        
        $faixaEtaria = [
            'Criança' => 0,
            'Adolescente' => 0,
            'Adulto' => 0,
            'Idoso' => 0,
        ];

        if($agendamentos_total != null){
            foreach ($agendamentos_total as $agendamento_idade) {
                $dataNascimento = $agendamento_idade['data_nascimento']; // Supondo que a coluna se chama 'data_nascimento'
                $idade = (new \DateTime())->diff(new \DateTime($dataNascimento))->y;
        
                // Separar por faixa etária
                if ($idade <= 13) {
                    $faixaEtaria['Criança']++;
                } elseif ($idade >= 14 && $idade <= 17) {
                    $faixaEtaria['Adolescente']++;
                } elseif ($idade >= 18 && $idade <= 49) {
                    $faixaEtaria['Adulto']++;
                } else { // $idade >= 50
                    $faixaEtaria['Idoso']++;
                }
            }
        }
        

        if(isset($faixaEtaria) &&  $faixaEtaria != null){
            $dados['relatorio']['faixaEtaria'] = $faixaEtaria;
        }else{
            $dados['relatorio']['faixaEtaria'] = $faixaEtaria;
        }

        if(isset($resultado) &&  $resultado != null){
            $dados['relatorio']['consultaMes'] = $resultado;
        }else{
            $dados['relatorio']['consultaMes'] = ['Mar'=>0];
        }
      
        return view('relatorio',$dados);
    }

}