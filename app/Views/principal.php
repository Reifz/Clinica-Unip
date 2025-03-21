<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('/assets/css/principal.css'); ?>" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    .background-principal{ background-image: url(<?php echo base_url('/assets/img/background_sistema.png'); ?>); background-position: top center; background-repeat: no-repeat; background-size: cover; }
</style>

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
    <div class="background-principal">
        <div class="container" style="margin-right:25%">
            <div class="row justify-content-between"> <!-- Alinha os itens da linha -->
                <div class="col-md-6 text-center">
                    <a class="navbar-brand" href="#" style="margin-top:60%">
                        <img class="img-boneco" src="<?php echo base_url('/assets/img/boneco_melhor_2.png'); ?>" alt="Logo" style="margin-top:15%" width="100%"
                            height="auto">
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="text-white text-center p-5">
                        <h1><b>Sistema de Clinicas para agendamentos e Consultas</b></h1>
                    </div>

                    <div class="text-white text-center p-5 background-div-destacado">
                        <h3><b>Encontre a clínica mais próxima!</b></h3>
                        <hr>

                        <div class="d-flex justify-content-center align-items-center">
                            <a type="button" class="btn btn-light btn-lg botao_v2" href="<?php echo base_url('/locais/listar_locais'); ?>"><b>Buscar Centro
                                    de Clínicas</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php if(isset($agendamentos) && $agendamentos != null){?>
    <br>

    <div class="justify-content-center align-items-center text-white text-center w-100">
        <div class="card div_login container_v2 w-100">
            <div class="card-header">
                <h4><b>Seus Agendamentos</b></h4>
            </div>
            <div class="card-body align-items-center bg-blue-dark background-principal">
                <div class="container py-4 text-white ">

                    <div class="row row-cols-1 row-cols-md-3 g-0 w-100"> <!-- Sem espaçamento extra -->
                    <?php foreach ($agendamentos as $key => $value) {?>
                        <div class="col" style="padding:5px">
                            <div class="card h-100 shadow border-0">
                                <img src="<?= base_url($value['foto_1']) ?>" class="cards_ajuste" alt="Imagem">
                                <div class="card-body">
                                    <h4 class="card-title fw-bold text-primary">  <?= esc($value['nome_local']) ?> </h4>
                                    <hr class="my-2">
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
                                        <a class="btn btn-outline-primary" href="<?php echo base_url('/agendamentos/imprimir_agendamento/'.$value['id_agendamento']); ?>">
                                            <i class="bi bi-pencil"></i> <b>Visualizar</b>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>


                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <br>

        <div class="justify-content-center align-items-center text-white text-center w-100">
            <div class="card div_login container_v2 w-100">
                <div class="card-header">
                    <h4><b>Nesta Clínica você encontra</b></h4>
                </div>
                <div class="card-body align-items-center bg-blue-dark background-principal">
                    <div class="container text-white ">
                        <div class="row">
                            <div class="col-md-3 text-white ">
                                <i class="fa fa-file-pdf-o icone" aria-hidden="true"></i><br><b>Seus Agendamentos</b>
                            </div>
                            <div class="col-md-3 text-white ">
                                <i class="fa fa-clock-o icone" aria-hidden="true"></i><br><b>Suas Datas marcadas</b>
                            </div>
                            <div class="col-md-3 text-white ">
                                <i class="fa fa-commenting-o icone" aria-hidden="true"></i><br><b>Observações</b>
                            </div>
                            <div class="col-md-3 text-white ">
                                <i class="fa fa-info-circle icone" aria-hidden="true"></i><br><b>Informativos</b>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12">
                                <a type="button" class="btn btn-light" href="<?php echo base_url('/agendamentos/listar_agendamentos'); ?>"><b>Seus
                                        Agendamentos</b></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <a href="#" class="whatsapp-icon" title="Chat no WhatsApp" onclick="aberturaChat()">
                <i class="fa fa-weixin" aria-hidden="true" style="font-size: 40px;"></i>
            </a>

            <br><br><br>
            <footer class="bg-dark text-white text-center conteudo" style="padding: 0.76rem 0; font-size: 0.9rem;">
                <div class="container" style="padding: 0;">
                    <div class="row" style="margin: 0;">
                        <div class="col-md-6" style="padding: 0;">
                            <p style="margin: 0;">Saiba mais sobre nossos serviços e nossa equipe dedicada a cuidar da
                                sua saúde.</p>
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
                    <button type="button" class="btn-close float-end" aria-label="Close"
                        onclick="aberturaChat()"></button>
                </div>
                <div class="chat-history" id="chatHistory" style="color:black">
                    <p class="alert alert-secondary  p-2 rounded-pill w3-card w3-left-align"><strong><i
                                class="fa fa-android" aria-hidden="true"></i> BOT:</strong> Como posso ajudar?</p>
                </div>
                <div class="chat-input">
                    <input type="text" class="form-control" id="userMessage" placeholder="Digite sua mensagem..." />
                    <button class="btn btn-dark" onclick="chatEnvioMensagens()" id="botaoEnviarMsg">Enviar</button>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
<script src="<?php echo base_url('/assets/js/principal.js'); ?>" defer></script>
<script src="<?php echo base_url('/assets/js/chat.js?v=' . time()); ?>" defer></script>

</html>