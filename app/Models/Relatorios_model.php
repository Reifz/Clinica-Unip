<?php

namespace App\Models;

use CodeIgniter\Model;

class Relatorios_model extends Model

{
    protected $table = 'agendamento';
    protected $primaryKey = 'id_agendamento';
    protected $allowedFields = ['id_agendamento ', 'data_agendamento', 'hora_agendamento', 'situacao_agendamento', 'motivo_agendamento', 'status_agendamento']; 

    public function buscarAgendamentosRelatorioMensal()
    {
        $dataInicio = (new \DateTime())->modify('-4 months')->format('Y-m-01'); 
        $dataFim = (new \DateTime())->modify('last day of this month')->format('Y-m-t'); 

        return $this->where('data_agendamento >=', $dataInicio)
        ->where('data_agendamento <=', $dataFim)
        ->findAll();
    }

    public function buscarAgendamentosRelatorioTotal()
    {
        $dataInicio = (new \DateTime())->modify('-4 months')->format('Y-m-01'); 
        $dataFim = (new \DateTime())->modify('last day of this month')->format('Y-m-t'); 

        return $this->where('data_agendamento >=', $dataInicio)
        ->where('data_agendamento <=', $dataFim)
        ->join('usuario', 'usuario.id_usuario = agendamento.id_usuario')
        ->findAll();
    }
}