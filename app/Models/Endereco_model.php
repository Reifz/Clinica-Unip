<?php

namespace App\Models;

use CodeIgniter\Model;

class Endereco_model extends Model
{
    protected $table = 'endereco';
    protected $primaryKey = 'id_endereco';
    protected $allowedFields = ['id_endereco','cep_endereco','logradouro','bairro','complemento','numero','uf','id_usuario'];

    public function buscarEndereco($id)
    {
        return $this->where('id_usuario', $id)->first();
    }

}