<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Locais</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('/assets/css/locais.css'); ?>" rel="stylesheet">
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


    <div class="container-fluid py-4 "> <!-- Ocupa toda a largura -->
        <div class="card p-3 shadow-lg">
            <div class="card text-center shadow-lg p-3 mb-4 bg-blue">
                <h3 class="fw-bold text-white">Clinícas Perto De Você</h3>
            </div>
            
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
            <?php $nivel = session()->get('tipo_usuario'); ?>
            <?php if($nivel == 1){ ?>            
            <div class="d-flex justify-content-end mb-4" style="margin-right:1%">
                <button class="btn bg-blue text-white" id="InserirLocal|">
                    <b><i class="fa fa-plus" aria-hidden="true"></i></b>
                </button>
            </div>
            <?php } ?>     

            <div class="row row-cols-1 row-cols-md-4 g-0 w-100">
            <?php if(isset($locais) && $locais != null){?>
                <?php foreach ($locais as $key => $value) {?>
                <div class="col" style="padding:5px">
                    <div class="card h-100 shadow border-0">
                        <div id="demo_<?= esc($key) ?>" class="carousel slide" data-bs-ride="carousel">
                            <!-- Indicators/dots -->
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#demo_<?= esc($key) ?>" data-bs-slide-to="0" class="active"></button>
                                <button type="button" data-bs-target="#demo_<?= esc($key) ?>" data-bs-slide-to="1"></button>
                                <button type="button" data-bs-target="#demo_<?= esc($key) ?>" data-bs-slide-to="2"></button>
                            </div>
                            <!-- The slideshow/carousel -->
                            <div class="carousel-inner cards_ajuste">
                                <div class="carousel-item active">
                                    <img src="<?= base_url($value['foto_1']) ?>" alt="Los Angeles" class="d-block w-100 cards_ajuste">
                                </div>
                                <div class="carousel-item">
                                    <img src="<?= base_url($value['foto_2']) ?>" alt="Chicago" class="d-block w-100 cards_ajuste">
                                </div>
                                <div class="carousel-item">
                                    <img src="<?= base_url($value['foto_3']) ?>" alt="New York" class="d-block w-100 cards_ajuste">
                                </div>
                            </div>
                            <!-- Left and right controls/icons -->
                            <button class="carousel-control-prev" type="button" data-bs-target="#demo_<?= esc($key) ?>"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#demo_<?= esc($key) ?>"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>

                        <div class="card-body ">

                            <h4 class="card-title fw-bold text-primary"><?= esc($value['nome_local']) ?></h4>
                            <hr class="my-2">

                            <p class="card-text">
                                <i class="fa fa-home" aria-hidden="true"></i></i> <b> Endereço:</b> <?= esc($value['endereco_local']) ?>
                            </p>

                            <p class="card-text">
                                <i class="fa fa-phone" aria-hidden="true"></i> <b> Telefone:</b> <?= esc($value['telefone_local']) ?>
                            </p>

                            <p class="card-text">
                                <i class="fa fa-clock-o" aria-hidden="true"></i> <b> Horário:</b> <?= date('H:i', strtotime($value['horario_abertura'])) ?> - <?= date('H:i', strtotime($value['horario_fechamento'])) ?>
                            </p>
                            <hr class="my-2">

                            <?php $nivel = session()->get('tipo_usuario'); ?>
                            <?php if($nivel == 1){ ?>             
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-outline-primary" id="editarLocal|<?= esc($key) ?>">
                                        <i class="bi bi-pencil"></i> <b>Editar</b>
                                    </button>
                                    <button class="btn btn-outline-danger" id="CancelarLocal|<?= esc($key) ?>">
                                        <i class="bi bi-x-circle"></i> <b>Apagar</b>
                                    </button>
                                </div>
                            <?php }?>
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
            <p class="alert alert-secondary  p-2 rounded-pill w3-card w3-left-align"><strong><i class="fa fa-android"
                        aria-hidden="true"></i> BOT:</strong> Como posso ajudar?</p>
        </div>
        <div class="chat-input">
            <input type="text" class="form-control" id="userMessage" placeholder="Digite sua mensagem..." />
            <button class="btn btn-dark" onclick="chatEnvioMensagens()" id="botaoEnviarMsg">Enviar</button>
        </div>
    </div>

    <!-- The Modal Editar -->
    <div class="modal" id="InserirLocalModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-header bg-blue-dark text-white">
                    <h4 class="modal-title">Solicitar Inserção da Clínica</h4>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal"></button>
                </div>

                <!-- body -->
                <div class="modal-body">
                    <form action="<?php echo base_url('/locais/inserir'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">

                                <label for="inputImagem1" class="form-label fw-bold">Escolha a Primeira Imagem</label>
                                <input class="form-control" type="file" name="foto_1" id="inputImagem1"
                                    accept="image/*" required>

                                <label for="inputImagem1" class="form-label fw-bold">Escolha a Segunda Imagem</label>
                                <input class="form-control" type="file" name="foto_2" id="inputImagem2"
                                    accept="image/*" required>

                                <label for="inputImagem1" class="form-label fw-bold">Escolha a Terceira Imagem</label>
                                <input class="form-control" type="file" name="foto_3" id="inputImagem3"
                                    accept="image/*" required>

                                <label for="email"><b>Nome da Clinica </b></label>
                                <input class="form-control" type="text" name="nome_local"
                                    placeholder="Nome da clínica..." required>

                                <label for="email"><b>Rua</b></label>
                                <input class="form-control" type="text" name="endereco_local" placeholder="Rua..."
                                    required>

                                <label for="email"><b>Bairro</b></label>
                                <input class="form-control" type="text" name="bairro_local" placeholder="Bairro..."
                                    required>

                                <label for="email"><b>UF</b></label>
                                <input class="form-control" type="text" name="uf_local" maxlength="2" placeholder="UF..."
                                    required>

                                <label for="email"><b>Telefone</b></label>
                                <input class="form-control" type="text" name="telefone_local"
                                    placeholder="Telefone..." required>

                                <label for="email"><b>Hora de Abertura</b></label>
                                <input class="form-control" type="time" name="horario_abertura"
                                    placeholder="Hora de Abertura..." required>

                                <label for="email"><b>Hora de Fechamento</b></label>
                                <input class="form-control" type="time" name="horario_fechamento"
                                    placeholder="Hora de Fechamento..." required>

                                <label for="email"><b>Situação</b></label>
                                <select class="form-select form-select-sm" name="situacao_local" required>
                                    <option value="1">Aberta</option>
                                    <option value="2">Fechada</option>
                                </select>

                            </div>
                        </div>

                </div>

                <!-- footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-success"><b>Enviar</b></button>
                    <button type="button" class="btn btn-outline-secondary"
                        data-bs-dismiss="modal"><b>Fechar</b></button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- The Modal Editar -->

    <!-- The Modal Editar -->
    <div class="modal" id="editarAgendamentoModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-header bg-blue-dark text-white">
                    <h4 class="modal-title">Solicitar Edição da Clinica</h4>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal"></button>
                </div>

                <!-- body -->
                <div class="modal-body">
                    <form action="<?php echo base_url('/locais/atualizar'); ?>" method="POST"  enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">

                                <label for="inputImagem1" class="form-label fw-bold">Escolha a Primeira Imagem</label>
                                <input class="form-control" type="file" name="foto_1" id="inputImagem1"
                                    accept="image/*">

                                <label for="inputImagem1" class="form-label fw-bold">Escolha a Segunda Imagem</label>
                                <input class="form-control" type="file" name="foto_2" id="inputImagem2"
                                    accept="image/*">

                                <label for="inputImagem1" class="form-label fw-bold">Escolha a Terceira Imagem</label>
                                <input class="form-control" type="file" name="foto_3" id="inputImagem3"
                                    accept="image/*">

                                <label for="email"><b>Nome da Clinica </b></label>
                                <input class="form-control" type="text" id="editar_nome_local" name="nome_local"
                                    value="Clinica Interlagos MSP" required>

                                <label for="email"><b>Rua</b></label>
                                <input class="form-control" type="text" id="editar_endereco_local" name="endereco_local"
                                    value="" required>

                                    
                                <label for="email"><b>Bairro</b></label>
                                <input class="form-control" type="text" id="editar_bairro_local" name="bairro_local"
                                    value="" required>

                                           
                                <label for="email"><b>UF</b></label>
                                <input class="form-control" type="text" id="editar_uf_local" maxlength="2" name="uf_local"
                                    value="" required>

                                <label for="email"><b>Telefone</b></label>
                                <input class="form-control" type="text" id="editar_telefone_local" name="telefone_local" value=" (11) 97257-7291"
                                    required>

                                <label for="email"><b>Hora de Abertura</b></label>
                                <input class="form-control" type="time" id="editar_horario_abertura" name="horario_abertura" value="18:00"
                                    required>

                                <label for="email"><b>Hora de Fechamento</b></label>
                                <input class="form-control" type="time" id="editar_horario_fechamento" name="horario_fechamento" value="18:00"
                                    required>

                                <label for="email"><b>Situação</b></label>
                                <select class="form-select form-select-sm" id="editar_situacao_local" name="situacao_local">
                                    <option value="1">Aberta</option>
                                    <option value="2">Fechada</option>
                                </select>
                                <input type="hidden" id="idatualizar" name="id_local">
                            </div>
                        </div>

                </div>

                <!-- footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-success"><b>Enviar</b></button>
                    <button type="button" class="btn btn-outline-secondary"
                        data-bs-dismiss="modal"><b>Fechar</b></button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- The Modal Editar -->

    <!-- The Modal Cancelar -->
    <div class="modal fade" id="CancelarLocalModal" tabindex="-1" aria-labelledby="CancelarLocalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-header bg-danger text-white">
                    <h4 class="modal-title"><i class="bi bi-exclamation-triangle-fill"></i> Solicitar apagamento do
                        local</h4>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal"></button>
                </div>

                <!-- Body -->
                <div class="modal-body">
                    <form action="<?php echo base_url('/locais/deletar'); ?>" method="POST">
                        <!-- Mensagem de aviso -->
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <i class="bi bi-info-circle-fill me-2"></i>
                            <div>
                                Tem certeza que deseja apagar este local?
                            </div>
                        </div>

                        <!-- Campo para justificativa -->
                        <div class="mb-3">
                            <input type="hidden" name="id_local" id="CancelarClinicaInput">
                        </div>

                </div>

                <!-- Footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-danger">
                        <i class="bi bi-send-fill"></i> Enviar Cancelamento
                    </button>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle-fill"></i> Fechar
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- The Modal Cancelar -->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script>
        var dados = <?= (json_encode($locais, JSON_UNESCAPED_UNICODE)); ?>;
        
        document.addEventListener("DOMContentLoaded", function(event) {
            $("button").click(function() {
               
                if (this.id.includes('InserirLocal')) {

                    $('#InserirLocalModal').modal('show');
                }
                if (this.id.includes('editarLocal')) {
                    var idLocais= this.id.split('|');
                 
                  
                    document.getElementById('editar_nome_local').value = dados[idLocais[1]].nome_local;
                    document.getElementById('editar_endereco_local').value = dados[idLocais[1]].endereco_local;
                    document.getElementById('editar_bairro_local').value = dados[idLocais[1]].bairro_local;
                    document.getElementById('editar_uf_local').value = dados[idLocais[1]].uf_local;
                    document.getElementById('editar_telefone_local').value = dados[idLocais[1]].telefone_local;
                    document.getElementById('editar_horario_abertura').value = dados[idLocais[1]].horario_abertura;
                    document.getElementById('editar_horario_fechamento').value = dados[idLocais[1]].horario_fechamento;
                    document.getElementById('editar_situacao_local').value = dados[idLocais[1]].situacao_local;
                    
                    document.getElementById('idatualizar').value = dados[idLocais[1]].id_local;
                    console.log(document.getElementById('idatualizar'))
                    console.log(document.getElementById('idatualizar').value)
                    $('#editarAgendamentoModal').modal('show');
                }
                if (this.id.includes('CancelarLocal')) {
                    var idLocais= this.id.split('|');
                    document.getElementById('CancelarClinicaInput').value = dados[idLocais[1]].id_local;
                    $('#CancelarLocalModal').modal('show');
                }
            });  
        });
    </script>
</body>
<script src="<?php echo base_url('/assets/js/locais.js?v=' . time()); ?>" defer></script>
<script src="<?php echo base_url('/assets/js/chat.js?v=' . time()); ?>" defer></script>

</html>