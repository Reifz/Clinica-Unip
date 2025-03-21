<?php 
namespace App\Controllers;

use App\Models\Usuario_model;
use App\Models\Endereco_model;
use CodeIgniter\Controller;

class Usuario extends Controller
{
    public function verifica_sessao(){

        if (!session()->has('id_usuario')) {
            session()->destroy();
            return redirect()->to('/usuario/login')->with('erro', 'Sessão não iniciada');
        }
        return null;
    }

    public function login()
    {
        return view('login');
    }

    public function cadastrar()
    {
        return view('cadastrar');
    }

    public function listar_usuario()
    {
        $id_usuario = session()->get('id_usuario');
        $model = new Usuario_model();
        $usuario = $model->buscarUsuario($id_usuario);

        if(isset($usuario) && $usuario != null){
            $dados['usuario'] = $usuario;
        }else{
            $dados['usuario'] = array();
        }

        $modelEndereco = new Endereco_model();
        $endereco = $modelEndereco->buscarEndereco($id_usuario);

        if(isset($endereco) && $endereco != null){
            $dados['endereco'] = $endereco;
        }else{
            $dados['endereco'] = array();
        }

        return view('usuario',$dados);
    }

    public function autenticar()
    {
        $username = $this->request->getPost('email');
        $password = $this->request->getPost('senha');

        $model = new Usuario_model();
        $user = $model->getUser($username);

        if ($user && password_verify($password, $user['senha_usuario'])) {
            session()->set('loggedIn', true);
            session()->set('nome_usuario', $username);
            session()->set('id_usuario', $user['id_usuario']);
            session()->set('tipo_usuario', $user['tipo_usuario']);

            return redirect()->to('/principal/home'); // Redireciona para a página do dashboard
        } else {
            return redirect()->back()->with('error', 'Credenciais inválidas.');
        }
    }

    public function inserir()
    {
        $model = new Usuario_model();
        if(isset($_POST) && $_POST != null){

            if(isset($_POST['email_usuario'])){

                $usuario_existencia = $model->getUser($_POST['email_usuario']);

                if($usuario_existencia != null && isset($usuario_existencia["id_usuario"])){
                    return redirect()->to('/usuario/cadastrar')->with('error', 'Email já existe.');
                }

            }

            foreach ($_POST as $key => $value) {
                if($value != null && $key != null){
                    if($key == "senha_usuario"){
                        $dadosEnviar[$key] = password_hash($value, PASSWORD_DEFAULT);
                    }else{
                        $dadosEnviar[$key] = $value;
                    } 
                }
            }
        }
        $dadosEnviar["tipo_usuario"] = 2;

        $inserirUsuario = $model->inserirUsuario($dadosEnviar);

        if ($inserirUsuario) {
            $modelEndereco = new Endereco_model();
        
            $dadosEndereco = [
                'id_usuario' => $inserirUsuario
            ];
        
            $modelEndereco->insert($dadosEndereco);
        }

        if ($inserirUsuario) {
            return redirect()->to('/usuario/login')->with('success', 'Usuário cadastrado com sucesso!'); // Mensagem de sucesso
        } else {
            return redirect()->to('/usuario/cadastrar')->with('error', 'Erro ao cadastrar.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/usuario/login');
    }


    public function atualizar()
    {

        $redirect = $this->verifica_sessao();

        if ($redirect) {
            return $redirect; 
        }

        $file = $this->request->getFile('foto_usuario');
        if($file->isValid() && !$file->hasMoved()){
            $foto1 = $this->request->getFile('foto_usuario');
            $foto1_base64 = base64_encode(file_get_contents($foto1->getTempName()));
            $dadosAtualizar['foto_usuario']= $foto1_base64;
        }

        $diretorioUpload = FCPATH . 'uploads/';

        if (!is_dir($diretorioUpload)) {
            mkdir($diretorioUpload, 0777, true);
        }
        
        function salvarImagemUpdateUser($file, $campo, $diretorio) {
            if ($file->isValid() && !$file->hasMoved()) {         
                $novoNome = time() . '_' . $file->getRandomName();  
                $file->move($diretorio, $novoNome);
                return 'uploads/'.$novoNome;
            }
            return null;
        }   
        
        $dadosAtualizar = [];
        $dadosAtualizar['foto_usuario'] = salvarImagemUpdateUser($this->request->getFile('foto_usuario'), 'foto_usuario', $diretorioUpload);
        $dadosAtualizar = array_filter($dadosAtualizar);
        
        if(isset($_POST) && $_POST != null){
            foreach ($_POST as $key => $value) {
                $dadosAtualizar[$key] = $value;
            }
        }

        $dadosAtualizar['id_usuario']=  session()->get('id_usuario');

       

        $id = $dadosAtualizar['id_usuario'];
      

        $model = new Usuario_model();

        $model->update($id, $dadosAtualizar);

        return redirect()->to('/usuario/listar_usuario')->with('success', 'Usuario atualizado com sucesso!');
  
    }

    public function atualizar_endereco()
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
        
        $id = $dadosAtualizar['id_endereco'];

        $model = new Endereco_model();

        $model->update($id, $dadosAtualizar);

        return redirect()->to('/usuario/listar_usuario')->with('success', 'Usuario atualizado com sucesso!');
  
    }
}
