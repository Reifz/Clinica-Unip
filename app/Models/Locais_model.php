<?php

namespace App\Models;

use CodeIgniter\Model;

class Locais_model extends Model
{
    protected $table = 'locais';
    protected $primaryKey = 'id_local';
    protected $allowedFields = ['id_local','nome_local','endereco_local','bairro_local','uf_local','telefone_local','horario_abertura','horario_fechamento','situacao_local','foto_1','foto_2','foto_3',];

    public function buscarLocais($uf)
    {
        return $this->select('*')
        ->where('locais.uf_local', $uf)
        ->find();
    }

    public function buscarLocaisId($id)
    {
        return $this->select('*')
        ->where('locais.id_local', $id)
        ->find();
    }

    public function buscarLocaisTodos()
    {
        return $this->findAll();
    }

}