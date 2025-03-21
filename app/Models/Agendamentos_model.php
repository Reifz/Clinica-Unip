<?php

namespace App\Models;

use CodeIgniter\Model;

class Agendamentos_model extends Model
{
    protected $table = 'agendamento';
    protected $primaryKey = 'id_agendamento';
    protected $allowedFields = ['id_agendamento', 'id_usuario', 'id_local','data_agendamento', 'hora_agendamento', 'situacao_agendamento', 'motivo_agendamento','motivo_cancelamento', 'status_agendamento']; 


    public function buscarAgendamentosPrincipal($id)
    {
        return $this->select('*')
        ->join('usuario', 'usuario.id_usuario = agendamento.id_usuario')
        ->join('locais', 'locais.id_local = agendamento.id_local')
        ->where('agendamento.id_usuario', $id)
        ->limit(4)
        ->find();
    }

    public function buscarAgendamentos($id)
    {
        return $this->select('*')
        ->join('usuario', 'usuario.id_usuario = agendamento.id_usuario')
        ->join('locais', 'locais.id_local = agendamento.id_local')
        ->where('agendamento.id_usuario', $id)
        ->find();
    }

    public function buscarAgendamentos_admin($filtros = [])
    {
        $query = $this->select('*')
        ->join('usuario', 'usuario.id_usuario = agendamento.id_usuario')
        ->join('locais', 'locais.id_local = agendamento.id_local');

        if (!empty($filtros['id_usuario'])) {
            $query->where('agendamento.id_usuario', $filtros['id_usuario']);
        }
        if (!empty($filtros['status_agendamento'])) {
            $query->where('agendamento.status_agendamento', $filtros['status_agendamento']);
        }
        if (!empty($filtros['id_local'])) {
            $query->where('agendamento.id_local', $filtros['id_local']);
        }

        return $query->findAll();
    }

    public function buscarAgendamentos_completo($id_agendamento,$id_usuario)
    {
        return $this->select('*')
        ->join('usuario', 'usuario.id_usuario = agendamento.id_usuario')
        ->join('endereco', 'endereco.id_usuario = agendamento.id_usuario')
        ->join('locais', 'locais.id_local = agendamento.id_local')
        ->where('agendamento.id_agendamento', $id_agendamento)
        ->where('agendamento.id_usuario', $id_usuario)
        ->find();
    }
}