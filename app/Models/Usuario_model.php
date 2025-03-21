<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuario_model extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = ['id_usuario ', 'nome_usuario','email_usuario','senha_usuario','cpf_usuario','numero_usuario','data_nascimento','data_cadastro','foto_usuario'];

    public function getUser($username)
    {
        return $this->where('email_usuario', $username)->first();
    }

    public function buscarUsuario($id)
    {
        return $this->where('id_usuario', $id)->first();
    }

    public function inserirUsuario($dados)
    {
        $this->insert($dados);
        return $this->insertID(); 
    }

    public function buscarTodosUser()
    {
        return $this->findAll();
    }
}