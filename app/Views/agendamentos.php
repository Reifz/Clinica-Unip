<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Agendamentos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('/assets/css/agendamentos.css'); ?>" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
<div class="bg-blue-dark text-white text-center">
        <nav class="navbar navbar-expand-sm bg-blue-dark navbar-dark">
            <div class="container-fluid">
                <ul class="navbar-nav me-auto" style="margin-left:15%">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo base_url('/informacoes/quemsomos'); ?>"><b>Quem somos nós</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo base_url('/informacoes/informacoes_sistema'); ?>"><b>Informações do sistema</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo base_url('/informacoes/objetivo_clinica'); ?>"><b>Objetivos da Clínica</b></a>
                    </li>
                </ul>

                <ul class="navbar-nav" style="margin-right:15%">
                    <li class="nav-item">
                        <a class="nav-link active" href="https://www.facebook.com/?locale=pt_BR"><i
                                class="fa fa-facebook-official" aria-hidden="true"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="https://www.instagram.com/"><i class="fa fa-instagram"
                                aria-hidden="true"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="https://github.com/GustavoMSandoval/Extensao-comunitaria"><i
                                class="fa fa-github-alt" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <nav class="navbar navbar-expand-lg bg-blue navbar-dark">
        <div class="container-fluid" style="margin-left:15%">
          
        <a class="navbar-brand ms-3" href="<?php echo base_url('/principal/home'); ?>">
                <img class="img-fluid_v2" src="<?php echo base_url('/assets/img/logo_clinica.png'); ?>" alt="Logo" height="40">
            </a>

          
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            
            <div class="collapse navbar-collapse" id="navbarNav" style="margin-right:25%">
                <ul class="navbar-nav ms-auto me-3"> 
                    <!-- <li class="nav-item">
                            <a class="nav-link fw-bold px-3" href="#"><b>Consultas</b></a>
                        </li> -->
                    <li class="nav-item">
                        <a class="nav-link fw-bold px-3" href="<?php echo base_url('/agendamentos/listar_agendamentos'); ?>"><b>Agendamentos</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold px-3" href="<?php echo base_url('/locais/listar_locais'); ?>"><b>Locais</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold px-3" href="<?php echo base_url('/informativos/listar_informativos'); ?>"><b>Informativos</b></a>
                    </li>
                    <?php $nivel = session()->get('tipo_usuario'); ?>
                    <?php if($nivel == 1){ ?>
                    <li class="nav-item">
                        <a class="nav-link fw-bold px-3" href="<?php echo base_url('/relatorios/listar_relatorio'); ?>"><b>Relatorio</b></a>
                    </li>
                    <?php }?>
                    <li class="nav-item">
                        <a class="nav-link fw-bold px-3" href="<?php echo base_url('/usuario/listar_usuario'); ?>"><b>Usuário</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold px-3" href="<?php echo base_url('/usuario/logout'); ?>"><b>Sair</b></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid py-4 "> 
        <div class="card p-3 shadow-lg">
            <div class="card text-center shadow-lg p-3 mb-4 bg-blue">
                <h3 class="fw-bold text-white">Seus Agendamentos</h3>
            </div>
            <?php if($nivel == 1){ ?>
            <form action="<?php echo base_url('/agendamentos/listar_agendamentos'); ?>" method="POST"> 
            <div class="card p-3">
                <div class="row">
              
                    <div class="col-md-4">
                        <label class="form-label">Usuário</label>
                        <select class="form-select selectpicker" data-live-search="true" name="filtroUsuario">
                            <option value="">Selecione...</option>
                            <?php foreach ($usuario as $key => $value) { ?>
                                <option value="<?= esc($value['id_usuario']) ?>" <?= (isset( $filtro['filtroUsuario']) && $filtro['filtroUsuario'] == $value['id_usuario']) ? 'selected' : '' ?>><?= esc($value['nome_usuario']) ?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Clínica</label>
                        <select class="form-select" id="filtroLocal" name="filtroLocal">
                            <option value="">Selecione...</option>
                            <?php foreach ($locais as $key => $value) { ?>
                                <option value="<?= esc($value['id_local']) ?>" <?= (isset($filtro['filtroLocal']) && $filtro['filtroLocal'] == $value['id_local']) ? 'selected' : '' ?>><?= esc($value['nome_local']) ?></option>
                            <?php }?>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Status</label>
                        <select class="form-select" id="filtroStatus" name="filtroStatus">
                            <option value="">Todos</option>
                            <option value="1" <?= (isset($filtro['filtroStatus']) && $filtro['filtroStatus'] == 1) ? 'selected' : '' ?>>Aberto</option>
                            <option value="2" <?= (isset($filtro['filtroStatus']) && $filtro['filtroStatus'] == 2) ? 'selected' : '' ?>>Prorrogado</option>
                            <option value="3" <?= (isset($filtro['filtroStatus']) && $filtro['filtroStatus'] == 3) ? 'selected' : '' ?>>Finalizado</option>
                            <option value="5" <?= (isset($filtro['filtroStatus']) && $filtro['filtroStatus'] == 5) ? 'selected' : '' ?>>Cancelado</option>
                        </select>
                    </div>
                
                </div>
                <button class="btn bg-blue mt-3 text-white"><b>Aplicar Filtro</b></button>
               
            </div>
            </form>
            <?php } ?>
        <br>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>


            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="row row-cols-1 row-cols-md-4 g-0 w-100"> <!-- Sem espaçamento extra -->

          
            <?php if(isset($agendamentos) && $agendamentos != null){?>
                <?php foreach ($agendamentos as $key => $value) {?>
                <div class="col" style="padding:5px">
                    <div class="card h-100 shadow border-0">
                        <img src="<?= base_url($value['foto_1']) ?>" class="cards_ajuste" alt="Imagem">
                        <div class="card-body">
                            <h4 class="card-title fw-bold text-primary"> <?= esc($value['nome_local']) ?> </h4>

                            <hr class="my-2">

                            <p class="card-text">
                                <i class="fa fa-home" aria-hidden="true"></i><b> Endereço:</b> <?= esc($value['endereco_local']) ?>

                            </p>
                            <p class="card-text">
                                <i class="fa fa-calendar" aria-hidden="true"></i><b> Data:</b> <?= date('d/m/Y', strtotime($value['data_agendamento'])) ?>
                            </p>
                            <p class="card-text">
                                <i class="fa fa-clock-o" aria-hidden="true"></i><b> Horário:</b> <?= date('H:i', strtotime($value['hora_agendamento'])) ?> hrs
                            </p>
                            <p class="card-text">
                                <i class="fa fa-info-circle" aria-hidden="true"></i><b> Situação:</b> <span
                                    class="fw-bold <?= esc($color_status[$value['status_agendamento']]) ?>"><?= esc($status[$value['status_agendamento']]) ?></span>
                            </p>

                            <hr class="my-2">

                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn btn-outline-primary" id="editarAgendamentos|<?= esc($key) ?>">
                                    <i class="bi bi-pencil"></i> <b>Editar</b>
                                </button>
                                
                                <button class="btn btn-outline-danger" id="CancelarAgendamento|<?= esc($key) ?>">
                                    <i class="bi bi-x-circle"></i> <b>Cancelar</b>
                                </button>
                               
                                <a class="btn btn-danger" href="<?php echo base_url('/agendamentos/imprimir_agendamento/'.$value['id_agendamento']); ?>">
                                    <i class="fa fa-file-pdf-o"></i> <b>Imprimir</b>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            <?php } ?>
            </div>
        </div>
    </div>




    <a href="#" class="whatsapp-icon" title="Chat no WhatsApp" onclick="aberturaChat()">
        <i class="fa fa-weixin" aria-hidden="true" style="font-size: 40px;"></i>
    </a>

    <br><br>
    <footer class="bg-dark text-white text-center conteudo" style="padding: 0.76rem 0; font-size: 0.9rem;">
        <div class="container" style="padding: 0;">
            <div class="row" style="margin: 0;">
                <div class="col-md-6" style="padding: 0;">
                    <p style="margin: 0;">Saiba mais sobre nossos serviços e nossa equipe dedicada a cuidar da sua
                        saúde.</p>
                </div>
                <div class="col-md-6" style="padding: 0;">
                    <p style="margin: 0;">© 2025 CLÍNICA DA SAÚDE. Todos os direitos reservados.</p>
                </div>
            </div>
        </div>
    </footer>


    <div class="chat-box" id="chatBox">
        <div class="chat-header">
            <strong>Chat Bot</strong>
            <button type="button" class="btn-close float-end" aria-label="Close" onclick="aberturaChat()"></button>
        </div>
        <div class="chat-history" id="chatHistory" style="color:black">
            <p class="alert alert-secondary  p-2  w3-card w3-left-align"><strong><i class="fa fa-android"
                        aria-hidden="true"></i> BOT:</strong> Como posso ajudar?</p>
        </div>
        <div class="chat-input">
            <input type="text" class="form-control" id="userMessage" placeholder="Digite sua mensagem..." />
            <button class="btn btn-dark" onclick="chatEnvioMensagens()" id="botaoEnviarMsg">Enviar</button>
        </div>
    </div>

    <!-- The Modal Editar -->
    <div class="modal" id="editarAgendamentoModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-header bg-blue-dark text-white">
                    <h4 class="modal-title">Solicitar Edição</h4>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal"></button>
                </div>

                <!-- body -->
                <div class="modal-body">
                    <form action="<?php echo base_url('/agendamentos/atualizar'); ?>" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="email"><b>Clinica</b></label>
                                <img src="" class="cards_ajuste img-thumbnail" id="editar_img_clinica" alt="Imagem">

                                <label for="email"><b>Nome da Clinica </b></label>
                                <input class="form-control" type="text" name="" id="editar_nome_clinica"
                                    value="Clinica Interlagos MSP" disabled readonly>

                                <label for="email"><b>Rua</b></label>
                                <input class="form-control" type="text" name="" id="editar_rua_clinica"
                                    value="R. Barão do Rio Branco, 303" disabled readonly>

                                <label for="email"><b>Data</b></label>
                                <input class="form-control" type="date" name="data_agendamento" value=""  id="editar_data_clinica" required>

                                <label for="email"><b>Hora</b></label>
                                <input class="form-control" type="time" name="hora_agendamento" value="" id="editar_hora_clinica" required>

                                <label for="email"><b>Situação</b></label>
                                <select class="form-select form-select-sm" name="status_agendamento" id="editar_situacao_clinica" required>
                                    <option value="">Selecione...</option>
                                    <option value="1">Aberto</option>
                                    <option value="3">Finalizado</option>
                                    <option value="2">Prorrogado</option>
                                </select>
                                <input type="hidden" id="idAgendamento" name="id_agendamento">
                            </div>
                        </div>

                </div>

                <!-- footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-success" >Enviar</button>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- The Modal Editar -->

    <!-- The Modal Cancelar -->
    <div class="modal fade" id="CancelarAgendamentoModal" tabindex="-1" aria-labelledby="CancelarAgendamentoLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-header bg-danger text-white">
                    <h4 class="modal-title"><i class="bi bi-exclamation-triangle-fill"></i> Solicitar Cancelamento</h4>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal"></button>
                </div>

                <!-- Body -->
                <div class="modal-body">
                    <form action="<?php echo base_url('/agendamentos/cancelar'); ?>"  method="POST">
                        <!-- Mensagem de aviso -->
                        <div class="mb-3 alert alert-danger d-flex align-items-center w-100" role="alert">
                            <div>
                                Tem certeza que deseja cancelar este agendamento? Essa ação não pode ser desfeita.
                            </div>
                        </div>
                        <input type="hidden" id="idAgendamentoExcluir" name="id_agendamento">
                        <input type="hidden" id="" name="status_agendamento" value="5">
                        <!-- Campo para justificativa -->
                        <div class="mb-3">
                            <label for="justificativa" class="form-label fw-bold">Justifique o cancelamento
                                (opcional)</label>
                            <textarea class="form-control" name="motivo_cancelamento" id="justificativa" rows="3"
                                placeholder="Digite sua justificativa..." required></textarea>
                        </div>

                </div>

                <!-- Footer -->
                <div class="modal-footer" id="cancelamento">
                    <button type="submit" class="btn btn-outline-danger">
                        <i class="bi bi-send-fill"></i> Enviar Cancelamento
                    </button>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle-fill"></i> Fechar
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- The Modal Cancelar -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>

    <script>
       var dados = <?= (json_encode($agendamentos, JSON_UNESCAPED_UNICODE)); ?>;
 
        document.addEventListener("DOMContentLoaded", function(event) {
            $("button").click(function() {
                console.log("cliquei")
                if (this.id.includes('editarAgendamentos')) {
                    var idAgendamento = this.id.split('|');
               
                    document.getElementById('idAgendamento').value = dados[idAgendamento[1]].id_agendamento;

                    document.getElementById('editar_nome_clinica').value = dados[idAgendamento[1]].nome_local;
                    document.getElementById('editar_rua_clinica').value = dados[idAgendamento[1]].endereco_local;
                    document.getElementById('editar_data_clinica').value = dados[idAgendamento[1]].data_agendamento;
                    document.getElementById('editar_hora_clinica').value = dados[idAgendamento[1]].hora_agendamento;
                 
                    document.getElementById('editar_img_clinica').src = "<?= base_url() ?>" + dados[idAgendamento[1]].foto_1;
                    document.getElementById('idAgendamento').value = dados[idAgendamento[1]].id_agendamento;
                    $('#editarAgendamentoModal').modal('show');
                }
                if (this.id.includes('CancelarAgendamento')) {
                    var idAgendamento = this.id.split('|');
                    document.getElementById('idAgendamentoExcluir').value = dados[idAgendamento[1]].id_agendamento;
                    document.getElementById('justificativa').value = dados[idAgendamento[1]].motivo_cancelamento;
                    if(dados[idAgendamento[1]].status_agendamento == "5"){
                        document.getElementById('cancelamento').style.display = "none";
                    }

                    $('#CancelarAgendamentoModal').modal('show');
                }
            });  
        });

        
    </script>

    <script>
        $(document).ready(function() {
            $('.selectpicker').selectpicker();
        });
    </script>

</body>
<script src="<?php echo base_url('/assets/js/agendamentos.js?v=' . time()); ?>" defer></script>
<script src="<?php echo base_url('/assets/js/chat.js?v=' . time()); ?>" defer></script>

</html>
