<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Agendamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('/assets/css/imprimir_agendamento.css'); ?>" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

</head>

<body>
<?php 
    function calcularIdade($dataNascimento) {
        $dataNascimento = new DateTime($dataNascimento);
        $hoje = new DateTime();
        $idade = $hoje->diff($dataNascimento)->y;
        return $idade;
    }
?>

    <div id="DivVisitaTecnica" class="bg-blue">
        <div align="center">
            <table border="0" width="90%">
                <tbody>
                    <tr>
                        <td>
                            <div id="foto_cliente" class="formata">
                                <img src="<?php echo base_url('/assets/img/logo_clinica.png'); ?>" id="foto_img" width="170" height="60">
                            </div>
                        </td>
                        <td align="right">
                            <div id="titulo_header">
                                <h3 id="corImpressao" style="color:#ffffff;" class='fonte_uppercase'><b>PDF de
                                        Agendamento </b></h3>
                                <h4 id="corImpressao" style="color: #ffffff;" class='fonte_uppercase'><b>Sistema de
                                        Clinicas</b></h4>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <br>

    <div class="card text-center shadow-lg p-3 mb-4 bg-blue">
        <h3 class="fw-bold text-white">Informações do Agendamento</h3>
    </div>

    <table class="table table-bordered table-hover text-center w3-table w3-striped w3-bordered">
        <tbody>
            <tr class="table">
                <td class="table-secondary fw-bold">Clínica:</td>
                <td><?= esc($agendamentos[0]['nome_local']) ?></td>
                <td class="table-secondary fw-bold">Rua:</td>
                <td><?= esc($agendamentos[0]['endereco_local']) ?></td>
                <td class="table-secondary fw-bold">Sistema:</td>
                <td>Sistema Unip Clínica</td>
            </tr>
            <tr>
                <td class="table-secondary fw-bold">Nome:</td>
                <td><?= esc($agendamentos[0]['nome_usuario']) ?></td>
                <td class="table-secondary fw-bold">CPF:</td>
                <td><?= esc($agendamentos[0]['cpf_usuario']) ?></td>
                <td class="table-secondary fw-bold">Telefone:</td>
                <td><?= esc($agendamentos[0]['numero_usuario']) ?></td>
            </tr>
            <tr class="table-light">
                <td class="table-secondary fw-bold">Cadastro:</td>
                <td><?= date('d/m/Y', strtotime($agendamentos[0]['data_cadastro_agendamento'])) ?></td>
                <td class="table-secondary fw-bold">Atendimento:</td>
                <td><?= date('d/m/Y', strtotime($agendamentos[0]['data_agendamento'])) ?></td>
                <td class="table-secondary fw-bold">Horário:</td>
                <td><?= date('H:i', strtotime($agendamentos[0]['hora_agendamento'])) ?></td>
            </tr>
            <tr class="table-danger text-white">
                <td class="fw-bold">Motivo:</td>
                <td colspan="5"><?= esc($agendamentos[0]['motivo_agendamento']) ?></td>
            </tr>
        </tbody>
    </table>







    <div class="card text-center shadow-lg p-3 mb-4 bg-blue">
        <h3 class="fw-bold text-white">Seus Dados </h3>
    </div>

    <table class="table table-bordered table-hover text-center w3-table w3-striped w3-bordered">
        <tbody>
            <tr class="table">
                <td class="table-secondary fw-bold">Nome:</td>
                <td><?= esc($agendamentos[0]['nome_usuario']) ?></td>
                <td class="table-secondary fw-bold">Email:</td>
                <td><?= esc($agendamentos[0]['email_usuario']) ?></td>
                <td class="table-secondary fw-bold">CPF:</td>
                <td><?= esc($agendamentos[0]['cpf_usuario']) ?></td>
            </tr>
            <tr>
                <td class="table-secondary fw-bold">Cadastro:</td>
                <td><?= date('d/m/Y', strtotime($agendamentos[0]['data_cadastro'])) ?></td>
                <td class="table-secondary fw-bold">Nascimento:</td>
                <td><?= date('d/m/Y', strtotime($agendamentos[0]['data_nascimento'])) ?></td>
                <td class="table-secondary fw-bold">Idade:</td>
                <td><?= esc(calcularIdade($agendamentos[0]['data_nascimento'])) ?> anos</td>
            </tr>
            <tr class="table-light">
                <td class="table-secondary fw-bold">CEP:</td>
                <td><?= esc($agendamentos[0]['cep_endereco']) ?></td>
                <td class="table-secondary fw-bold">Endereco:</td>
                <td><?= esc($agendamentos[0]['logradouro']) ?></td>
                <td class="table-secondary fw-bold">Bairro:</td>
                <td><?= esc($agendamentos[0]['bairro']) ?></td>
            </tr>

        </tbody>
    </table>


    <div class="card text-center shadow-lg p-3 mb-4 bg-blue">
        <h3 class="fw-bold text-white">Local</h3>
    </div>

    <table class="table table-bordered table-hover text-center w3-table w3-striped w3-bordered">
        <tbody>
            <tr class="table">
                <td class="table-secondary fw-bold">Nome:</td>
                <td><?= esc($agendamentos[0]['nome_local']) ?></td>
                <td class="table-secondary fw-bold">Endereço:</td>
                <td><?= esc($agendamentos[0]['endereco_local']) ?></td>
                <td class="table-secondary fw-bold">Bairro:</td>
                <td><?= esc($agendamentos[0]['bairro_local']) ?></td>
            </tr>
            <tr>
                <td class="table-secondary fw-bold">Telefone:</td>
                <td><?= esc($agendamentos[0]['telefone_local']) ?></td>
                <td class="table-secondary fw-bold"> Abertura:</td>
                <td><?= date('H:i', strtotime($agendamentos[0]['horario_abertura'])) ?></td>
                <td class="table-secondary fw-bold"> Fechamento:</td>
                <td><?= date('H:i', strtotime($agendamentos[0]['horario_fechamento'])) ?></td>
            </tr>


        </tbody>
    </table>

    <div id="map" style="height: 200px;"></div>
    </tr>

</body>
<script src="<?php echo base_url('/assets/js/imprimir_agendamento.js?v=' . time()); ?>" defer></script>
</html>