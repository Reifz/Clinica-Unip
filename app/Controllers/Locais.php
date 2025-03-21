<?php 
namespace App\Controllers;

use App\Models\Locais_model;
use App\Models\Usuario_model;
use App\Models\Endereco_model;
use CodeIgniter\Controller;

class Locais extends Controller
{
    public function verifica_sessao(){

        if (!session()->has('id_usuario')) {
            session()->destroy();
            return redirect()->to('/usuario/login')->with('erro', 'Sessão não iniciada');
        }
        return null;
    }


    public function listar_locais()
    {

        $redirect = $this->verifica_sessao();

        if ($redirect) {
            return $redirect; 
        }

        $id_usuario = session()->get('id_usuario');
        $modelEndereco = new Endereco_model();
        $endereco = $modelEndereco->buscarEndereco($id_usuario);

        if($endereco != null){
            $uf = $endereco['uf'];
        }else{
            $uf = 'SP';
        }
  
        $model = new Locais_model();

        $dados_locais_principal = $model->buscarLocais($uf);

        if($dados_locais_principal != null){
            $dados['locais'] = $dados_locais_principal;
        }else{
            $dados['locais'] = array();
        }

        $dados['status'] = array('1'=>"Aberto",'3'=>"Finalizado",'2'=>"Prorrogado",'5'=>"Cancelado");

        $dados['color_status'] = array('1'=>"text-success",'3'=>"text-warning",'2'=>"text-warning",'5'=>"text-danger");

        return view('locais',$dados);
    }

    public function inserir()
    {

        $redirect = $this->verifica_sessao();

        if ($redirect) {
            return $redirect; 
        }

        $model = new Locais_model();

        $foto1 = $this->request->getFile('foto_1');
        $foto2 = $this->request->getFile('foto_2');
        $foto3 = $this->request->getFile('foto_3');

        $uploadPath = FCPATH . 'uploads/';

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        function salvarImagem($foto, $uploadPath) {
            if ($foto->isValid() && !$foto->hasMoved()) {
                $novoNome = $foto->getRandomName();
                $foto->move($uploadPath, $novoNome);
                return 'uploads/' . $novoNome; 
            }
            return null; 
        }
        
        $dadosAtualizar = [
            'foto_1' => salvarImagem($foto1, $uploadPath),
            'foto_2' => salvarImagem($foto2, $uploadPath),
            'foto_3' => salvarImagem($foto3, $uploadPath),
        ];
        
        $dadosAtualizar = array_filter($dadosAtualizar);

        if(isset($_POST) && $_POST != null){
            foreach ($_POST as $key => $value) {
                $dadosAtualizar[$key] = $value;
            }
        }

        $model->insert($dadosAtualizar);

        return redirect()->to('/locais/listar_locais')->with('success', 'Local criado com sucesso!');


    }

    public function atualizar()
    {

        $redirect = $this->verifica_sessao();

        if ($redirect) {
            return $redirect; 
        }

        $model = new Locais_model();

        $diretorioUpload = FCPATH . 'uploads/';

        if (!is_dir($diretorioUpload)) {
            mkdir($diretorioUpload, 0777, true);
        }
        
       
        function salvarImagemUpdate($file, $campo, $diretorio) {
            if ($file->isValid() && !$file->hasMoved()) {
               
                $novoNome = time() . '_' . $file->getRandomName();
                
               
                $file->move($diretorio, $novoNome);
                
                
                return 'uploads/'.$novoNome;
            }
            return null;
        }   
        
        $dadosAtualizar = [];
        $dadosAtualizar['foto_1'] = salvarImagemUpdate($this->request->getFile('foto_1'), 'foto_1', $diretorioUpload);
        $dadosAtualizar['foto_2'] = salvarImagemUpdate($this->request->getFile('foto_2'), 'foto_2', $diretorioUpload);
        $dadosAtualizar['foto_3'] = salvarImagemUpdate($this->request->getFile('foto_3'), 'foto_3', $diretorioUpload);
        
        $dadosAtualizar = array_filter($dadosAtualizar);
    
        if(isset($_POST) && $_POST != null){
            foreach ($_POST as $key => $value) {
                $dadosAtualizar[$key] = $value;
            }
        }

        if(isset($dadosAtualizar['id_local']) && $dadosAtualizar['id_local'] != null){
            $id = $dadosAtualizar['id_local'];
        }else{
            return redirect()->to('/locais/listar_locais')->with('error', 'ID não informado.');
        }
 
        $model->update($id, $dadosAtualizar);

        return redirect()->to('/locais/listar_locais')->with('success', 'Local criado com sucesso!');


    } 

    public function deletar()
    {
        $redirect = $this->verifica_sessao();

        if ($redirect) {
            return $redirect; 
        }

        $model = new Locais_model();
    
        if(isset($_POST) && $_POST != null){
            foreach ($_POST as $key => $value) {
                $dadosAtualizar[$key] = $value;
            }
        }
   
        if(isset($dadosAtualizar['id_local']) && $dadosAtualizar['id_local'] != null){
            $id = $dadosAtualizar['id_local'];
        }else{
            return redirect()->to('/locais/listar_locais')->with('error', 'ID não informado.');
        }
 
        $model->delete($id);

        return redirect()->to('/locais/listar_locais')->with('success', 'Local deletado com sucesso!');


    } 
    



}