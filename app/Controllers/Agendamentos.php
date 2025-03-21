<?php 
namespace App\Controllers;

use App\Models\Agendamentos_model;
use App\Models\Usuario_model;
use App\Models\Endereco_model;
use App\Models\Locais_model;
use CodeIgniter\Controller;

class Agendamentos extends Controller
{
    public function verifica_sessao(){

        if (!session()->has('id_usuario')) {
            session()->destroy();
            return redirect()->to('/usuario/login')->with('erro', 'Sessão não iniciada');
        }
        return null;
    }

    public function listar_agendamentos()
    {

        $redirect = $this->verifica_sessao();

        if ($redirect) {
            return $redirect; 
        }

        $model = new Agendamentos_model();

        $id_usuario = session()->get('id_usuario');

        $nivel = session()->get('tipo_usuario'); 
        
        if($nivel == 1){
            $dados_agendamento_principal = $model->buscarAgendamentos_admin(array());
        }else{
            $dados_agendamento_principal = $model->buscarAgendamentos($id_usuario);
        }
    
        if($dados_agendamento_principal != null){
            $dados['agendamentos'] = $dados_agendamento_principal;
        }else{
            $dados['agendamentos'] = array();
        }

        $modelUsuario = new Usuario_model();

        $dados_usuario = $modelUsuario->buscarTodosUser();

        if($dados_usuario != null){
            $dados['usuario'] = $dados_usuario;
        }else{
            $dados['usuario'] = array();
        }
        
        $modelLocais = new Locais_model();

        $dados_locais = $modelLocais->buscarLocaisTodos();

        if($dados_locais != null){
            $dados['locais'] = $dados_locais;
        }else{
            $dados['locais'] = array();
        }
    
        $dados['filtro'] = [];

        $dados['status'] = array('1'=>"Aberto",'3'=>"Finalizado",'2'=>"Prorrogado",'5'=>"Cancelado");

        $dados['color_status'] = array('1'=>"text-success",'3'=>"text-warning",'2'=>"text-warning",'5'=>"text-danger");


        return view('agendamentos',$dados);
    }

    public function filtrar_agendamentos(){

        $redirect = $this->verifica_sessao();

        if ($redirect) {
            return $redirect; 
        }

        $model = new Agendamentos_model();

        $filtros = $this->request->getPost();
        $dados['filtro'] = $filtros;
        $dadospesquisar = [];
        if (!empty($filtros['filtroUsuario'])) {
           $dadospesquisar['id_usuario'] = $filtros['filtroUsuario'];
        }
        if (!empty($filtros['filtroStatus'])) {
            $dadospesquisar['status_agendamento'] = $filtros['filtroStatus'];
        }
        if (!empty($filtros['filtroLocal'])) {
            $dadospesquisar['id_local'] = $filtros['filtroLocal'];
        }

        $dados_agendamento_principal = $model->buscarAgendamentos_admin($dadospesquisar);

        if($dados_agendamento_principal != null){
            $dados['agendamentos'] = $dados_agendamento_principal;
        }else{
            $dados['agendamentos'] = array();
        }

        $modelUsuario = new Usuario_model();

        $dados_usuario = $modelUsuario->buscarTodosUser();

        if($dados_usuario != null){
            $dados['usuario'] = $dados_usuario;
        }else{
            $dados['usuario'] = array();
        }
        
        $modelLocais = new Locais_model();

        $dados_locais = $modelLocais->buscarLocaisTodos();

        if($dados_locais != null){
            $dados['locais'] = $dados_locais;
        }else{
            $dados['locais'] = array();
        }
    

        $dados['status'] = array('1'=>"Aberto",'3'=>"Finalizado",'2'=>"Prorrogado",'5'=>"Cancelado");

        $dados['color_status'] = array('1'=>"text-success",'3'=>"text-warning",'2'=>"text-warning",'5'=>"text-danger");

        return view('agendamentos',$dados);

    }

    public function atualizar()
    {

        $redirect = $this->verifica_sessao();

        if ($redirect) {
            return $redirect; 
        }
        
        if(isset($_POST) && $_POST != null){
            foreach ($_POST as $key => $value) {
                $dadosAtualizar[$key] = $value;
            }
        }

        if(isset($dadosAtualizar['id_agendamento']) && $dadosAtualizar['id_agendamento'] != null){
            $id = $dadosAtualizar['id_agendamento'];
        }else{
            return redirect()->to('/usuario/cadastrar')->with('error', 'ID não informado.');
        }

        $model = new Agendamentos_model();

        $model->update($id, $dadosAtualizar);

        return redirect()->to('/agendamentos/listar_agendamentos')->with('success', 'Agendamento atualizado com sucesso!');
  
    }

    public function cancelar()
    {

        $redirect = $this->verifica_sessao();

        if ($redirect) {
            return $redirect; 
        }
        
        if(isset($_POST) && $_POST != null){
            foreach ($_POST as $key => $value) {
                $dadosAtualizar[$key] = $value;
            }
        }

        if(isset($dadosAtualizar['id_agendamento']) && $dadosAtualizar['id_agendamento'] != null){
            $id = $dadosAtualizar['id_agendamento'];
        }else{
            return redirect()->to('/usuario/cadastrar')->with('error', 'ID não informado.');
        }

        $model = new Agendamentos_model();

        $model->update($id, $dadosAtualizar);

        return redirect()->to('/agendamentos/listar_agendamentos')->with('success', 'Agendamento atualizado com sucesso!');
  
    }

    public function imprimir_agendamento($id_agendamento)
    {
 
        $model = new Agendamentos_model();

        $id_usuario = session()->get('id_usuario');
        $dados_agendamento_completo = $model->buscarAgendamentos_completo($id_agendamento,$id_usuario);

        if($dados_agendamento_completo != null){
            $dados['agendamentos'] = $dados_agendamento_completo;
        }else{
            $dados['agendamentos'] = array();
        }
    
        $dados['status'] = array('1'=>"Aberto",'3'=>"Finalizado",'2'=>"Prorrogado",'5'=>"Cancelado");

        $dados['color_status'] = array('1'=>"text-success",'3'=>"text-warning",'2'=>"text-warning",'5'=>"text-danger");

        return view('imprimir_agendamento',$dados);
    }

    public function chat(){

        date_default_timezone_set('America/Sao_Paulo');

        $dados = $this->request->getJSON(true); 

        $mensagemUsuario = $dados['NovaMensagemUsuario'] ?? '';

        $id_usuario = session()->get('id_usuario');
        $modelEndereco = new Endereco_model();
        $endereco = $modelEndereco->buscarEndereco($id_usuario);

        if($endereco['uf'] == null){
            $resposta = ['mensagem' => 'Configure sua UF para usar o chat!']; 
            return $this->response->setJSON($resposta); 
        }
        
        if (!session()->has('etapa')) {
            session()->set('etapa', 1);
        }

        $etapa = session()->get('etapa');

        switch ($etapa) {
            case 1:
                sleep(1);
                $result = "<br> Me diga seu nome completo: ";
                $resposta = ['mensagem' => $result]; 
                session()->set('etapa', 2);
                break;
            case 2:
                sleep(1);
                session()->set('nome_cliente_chat', $mensagemUsuario);
                session()->set('etapa', 3);
                $result = "<br> Qual o problema que deseja resolver?";
                $resposta = ['mensagem' => $result]; 
                break;
            case 3:
                sleep(2);
                session()->set('motivo_agendamento', $mensagemUsuario);
                session()->set('etapa', 4);
                
                $id_usuario = session()->get('id_usuario');
                $modelEndereco = new Endereco_model();
                $endereco = $modelEndereco->buscarEndereco($id_usuario);
        
                if($endereco != null){
                    $uf = $endereco['uf'];
                }else{
                    $uf = 'SP';
                }

                $model = new Locais_model();

                $clinicas = $model->buscarLocais($uf);

                $result = "<br> Escolha a clínica pelo <b><u> ID </u>: </b> <br>";
                foreach ($clinicas as $clinica) {
                    $result.= " <span class='badge bg-primary'> ID </span> ".$clinica['id_local'] . " |  <span class='badge bg-primary'> " . $clinica['nome_local'] . "  </span> <br>";
                }

                $resposta = ['mensagem' => $result]; 

                break;
            case 4:

                $model = new Locais_model();

                $clinicas = $model->buscarLocaisId($mensagemUsuario);

                if($clinicas == null){
                    $resposta = ['mensagem' => "Local não identificado"]; 
                }else{
                    sleep(3);


                    session()->set('id_clinica', $mensagemUsuario);
                    session()->remove('etapa');
    
                    $data_sugerida = date('d/m/Y H:30', strtotime('+2 days -3 hours'));
    
                    $data = date('Y-m-d',strtotime('+2 days'));
                    $hora = date('H:30',strtotime('-3 hours'));
    
                    session()->set('data_agendamento', $data);
                    session()->set('hora_agendamento', $hora);
                    
                    $this->salvarAgendamento();
                    $result = " <br> Sua consulta está marcada para: <br> Dia:  <b><u> $data_sugerida. </u></b><br> Obrigado pelo contato! <br> <span class='badge bg-success'>Agendamento concluído!</span>";
                    
                    session()->set('data', $mensagemUsuario);
                    $resposta = ['mensagem' => $result]; 
                }

                break;
            default:
                session()->set('etapa', 1);
                $result = "Etapa incorreta";
                $resposta = ['mensagem' => $result]; 
                break;
        }
    
        return $this->response->setJSON($resposta);
    }
    function salvarAgendamento() {

        $dadosEnviar = [
            'id_usuario' =>session()->get('id_usuario'),
            'id_local' =>session()->get('id_clinica'),
            'data_agendamento' => session()->get('data_agendamento'),
            'hora_agendamento' => session()->get('hora_agendamento'),
            'status_agendamento'=> 1,
            'motivo_agendamento' => session()->get('motivo_agendamento'),
        ];

        $model = new Agendamentos_model();

        $model->insert($dadosEnviar);

    }
}