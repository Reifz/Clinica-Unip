<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Informativos</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url('/assets/css/informativos.css'); ?>" rel="stylesheet">
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

        <div class="container-fluid py-4 ">  <!-- Ocupa toda a largura -->
            <div class="card p-3 shadow-lg">
                <div class="card text-center shadow-lg p-3 mb-4 bg-blue">
                    <h3 class="fw-bold text-white"> Informativos </h3>
                </div>
                <div class="row row-cols-1 row-cols-md-4 g-0 w-100" > <!-- Sem espaçamento extra -->

                    <div class="col fotos_zoom" style="padding:5px">
                        <div class="card p-3 shadow-sm border-0">
                            <div class="card-body">
                                <p class="text-primary fw-bold">Doenças do coração</p>
                                <h5 class="fw-bold">Infarto do Miocárdio</h5>
                                <span class="badge bg-danger">Emergência médica</span>
                                <p class="mt-2 text-muted">Infarto: Procure atendimento médico imediato em caso de dor no peito ou dificuldade respiratória.</p>
                            </div>
                            <div class="text-end">
                                <img src="<?php echo base_url('/assets/img/ajuda.jpg'); ?>" class="rounded w3-card cards_ajuste imagem_zoom" alt="Infarto">
                            </div>
                        </div>
                    </div>
                    
                    <!-- CARD 2 -->
                    <div class="col fotos_zoom" style="padding:5px">
                        <div class="card p-3 shadow-sm border-0">
                            <div class="card-body">
                                <p class="text-primary fw-bold">Pressão Alta</p>
                                <h5 class="fw-bold">Hipertensão</h5>
                                <span class="badge bg-warning">Atenção</span>
                                <p class="mt-2 text-muted">Pode causar tontura, dor de cabeça e visão embaçada. Controle com dieta e medicamentos.</p>
                            </div>
                            <div class="text-end">
                                <img src="<?php echo base_url('/assets/img/atencao.jpg'); ?>" class="rounded w3-card cards_ajuste imagem_zoom" alt="Hipertensão">
                            </div>
                        </div>
                    </div>
                    
                    <!-- CARD 3 -->
                    <div class="col fotos_zoom" style="padding:5px">
                        <div class="card p-3 shadow-sm border-0">
                            <div class="card-body">
                                <p class="text-primary fw-bold">Acidente Vascular</p>
                                <h5 class="fw-bold">AVC</h5>
                                <span class="badge bg-danger">Emergência médica</span>
                                <p class="mt-2 text-muted">Paralisia em um lado do corpo, dificuldade na fala e confusão mental podem indicar AVC.</p>
                            </div>
                            <div class="text-end">
                                <img src="<?php echo base_url('/assets/img/emergencia.jpg'); ?>" class="rounded w3-card cards_ajuste imagem_zoom" alt="AVC">
                            </div>
                        </div>
                    </div>
                    
                    <!-- CARD 4 -->
                    <div class="col fotos_zoom" style="padding:5px">
                        <div class="card p-3 shadow-sm border-0">
                            <div class="card-body">
                                <p class="text-primary fw-bold">Diabetes</p>
                                <h5 class="fw-bold">Diabetes tipo 2</h5>
                                <span class="badge bg-warning">Atenção</span>
                                <p class="mt-2 text-muted">Sede excessiva, fome frequente e visão turva são sinais comuns do diabetes.</p>
                            </div>
                            <div class="text-end">
                                <img src="<?php echo base_url('/assets/img/atencao.jpg'); ?>" class="rounded w3-card cards_ajuste imagem_zoom" alt="Diabetes">
                            </div>
                        </div>
                    </div>

                    <div class="col fotos_zoom" style="padding:5px">
                        <div class="card p-3 shadow-sm border-0">
                            <div class="card-body">
                                <p class="text-primary fw-bold">Doenças respiratórias</p>
                                <h5 class="fw-bold">Asma</h5>
                                <span class="badge bg-warning">Atenção</span>
                                <p class="mt-2 text-muted">Falta de ar, chiado no peito e tosse persistente podem indicar asma.</p>
                            </div>
                            <div class="text-end">
                                <img src="<?php echo base_url('/assets/img/ajuda.jpg'); ?>" class="rounded w3-card cards_ajuste imagem_zoom" alt="Imagem">
                            </div>
                        </div>
                    </div>

                    <div class="col fotos_zoom" style="padding:5px">
                        <div class="card p-3 shadow-sm border-0">
                            <div class="card-body">
                                <p class="text-primary fw-bold">Doenças respiratórias</p>
                                <h5 class="fw-bold">Bronquite</h5>
                                <span class="badge bg-warning">Atenção</span>
                                <p class="mt-2 text-muted">Tosse persistente e dificuldade para respirar podem indicar bronquite.</p>
                            </div>
                            <div class="text-end">
                                <img src="<?php echo base_url('/assets/img/atencao.jpg'); ?>" class="rounded w3-card cards_ajuste imagem_zoom" alt="Imagem">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col fotos_zoom" style="padding:5px">
                        <div class="card p-3 shadow-sm border-0">
                            <div class="card-body">
                                <p class="text-primary fw-bold">Doenças renais</p>
                                <h5 class="fw-bold">Insuficiência Renal</h5>
                                <span class="badge bg-danger">Emergência médica</span>
                                <p class="mt-2 text-muted">Inchaço, fadiga e alterações na urina podem ser sinais de insuficiência renal.</p>
                            </div>
                            <div class="text-end">
                                <img src="<?php echo base_url('/assets/img/emergencia.jpg'); ?>" class="rounded w3-card cards_ajuste imagem_zoom" alt="Imagem">
                            </div>
                        </div>
                    </div>

                    <div class="col fotos_zoom" style="padding:5px">
                        <div class="card p-3 shadow-sm border-0">
                            <div class="card-body">
                                <p class="text-primary fw-bold">Doenças gastrointestinais</p>
                                <h5 class="fw-bold">Refluxo Gastroesofágico</h5>
                                <span class="badge bg-warning">Atenção</span>
                                <p class="mt-2 text-muted">Azia, dor no peito e regurgitação podem ser sinais de refluxo gastroesofágico.</p>
                            </div>
                            <div class="text-end">
                                <img src="<?php echo base_url('/assets/img/atencao.jpg'); ?>" class="rounded w3-card cards_ajuste imagem_zoom" alt="Imagem">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col fotos_zoom" style="padding:5px">
                        <div class="card p-3 shadow-sm border-0">
                            <div class="card-body">
                                <p class="text-primary fw-bold">Doenças metabólicas</p>
                                <h5 class="fw-bold">Obesidade</h5>
                                <span class="badge bg-warning">Atenção</span>
                                <p class="mt-2 text-muted">A obesidade pode levar a doenças cardíacas, diabetes e hipertensão.</p>
                            </div>
                            <div class="text-end">
                                <img src="<?php echo base_url('/assets/img/atencao.jpg'); ?>" class="rounded w3-card cards_ajuste imagem_zoom" alt="Imagem">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col fotos_zoom" style="padding:5px">
                        <div class="card p-3 shadow-sm border-0">
                            <div class="card-body">
                                <p class="text-primary fw-bold">Doenças neurológicas</p>
                                <h5 class="fw-bold">Epilepsia</h5>
                                <span class="badge bg-danger">Emergência médica</span>
                                <p class="mt-2 text-muted">Convulsões recorrentes podem indicar epilepsia. Procure orientação médica.</p>
                            </div>
                            <div class="text-end">
                                <img src="<?php echo base_url('/assets/img/emergencia.jpg'); ?>" class="rounded w3-card cards_ajuste imagem_zoom" alt="Imagem">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col fotos_zoom" style="padding:5px">
                        <div class="card p-3 shadow-sm border-0">
                            <div class="card-body">
                                <p class="text-primary fw-bold">Doenças respiratórias</p>
                                <h5 class="fw-bold">Pneumonia</h5>
                                <span class="badge bg-danger">Emergência médica</span>
                                <p class="mt-2 text-muted">Febre alta, tosse com catarro e falta de ar podem indicar pneumonia.</p>
                            </div>
                            <div class="text-end">
                                <img src="<?php echo base_url('/assets/img/emergencia.jpg'); ?>" class="rounded w3-card cards_ajuste imagem_zoom" alt="Imagem">
                            </div>
                        </div>
                    </div>

                    <div class="col fotos_zoom" style="padding:5px">
                        <div class="card p-3 shadow-sm border-0">
                            <div class="card-body">
                                <p class="text-primary fw-bold">Doenças infecciosas</p>
                                <h5 class="fw-bold">Tuberculose</h5>
                                <span class="badge bg-warning">Atenção</span>
                                <p class="mt-2 text-muted">Tosse persistente, suores noturnos e cansaço excessivo podem ser sinais de tuberculose.</p>
                            </div>
                            <div class="text-end">
                                <img src="<?php echo base_url('/assets/img/ajuda.jpg'); ?>" class="rounded w3-card cards_ajuste imagem_zoom" alt="Imagem">
                            </div>
                        </div>
                    </div>

                    <div class="col fotos_zoom" style="padding:5px">
                        <div class="card p-3 shadow-sm border-0">
                            <div class="card-body">
                                <p class="text-primary fw-bold">Doenças autoimunes</p>
                                <h5 class="fw-bold">Lúpus</h5>
                                <span class="badge bg-warning">Atenção</span>
                                <p class="mt-2 text-muted">Erupções cutâneas, fadiga e dores nas articulações podem indicar lúpus.</p>
                            </div>
                            <div class="text-end">
                                <img src="<?php echo base_url('/assets/img/atencao.jpg'); ?>" class="rounded w3-card cards_ajuste imagem_zoom" alt="Imagem">
                            </div>
                        </div>
                    </div>

                    <div class="col fotos_zoom" style="padding:5px">
                        <div class="card p-3 shadow-sm border-0">
                            <div class="card-body">
                                <p class="text-primary fw-bold">Doenças digestivas</p>
                                <h5 class="fw-bold">Gastrite</h5>
                                <span class="badge bg-warning">Cuidado</span>
                                <p class="mt-2 text-muted">Dor no estômago, azia e náuseas frequentes podem ser sintomas de gastrite.</p>
                            </div>
                            <div class="text-end">
                                <img src="<?php echo base_url('/assets/img/cuidado.jpg'); ?>" class="rounded w3-card cards_ajuste imagem_zoom" alt="Imagem">
                            </div>
                        </div>
                    </div>

                    <div class="col fotos_zoom" style="padding:5px">
                        <div class="card p-3 shadow-sm border-0">
                            <div class="card-body">
                                <p class="text-primary fw-bold">Doenças musculoesqueléticas</p>
                                <h5 class="fw-bold">Artrite</h5>
                                <span class="badge bg-warning">Atenção</span>
                                <p class="mt-2 text-muted">Inchaço, dor nas articulações e rigidez podem ser sinais de artrite.</p>
                            </div>
                            <div class="text-end">
                                <img src="<?php echo base_url('/assets/img/atencao.jpg'); ?>" class="rounded w3-card cards_ajuste imagem_zoom" alt="Imagem">
                            </div>
                        </div>
                    </div>

                    <div class="col fotos_zoom" style="padding:5px">
                        <div class="card p-3 shadow-sm border-0">
                            <div class="card-body">
                                <p class="text-primary fw-bold">Doenças da pele</p>
                                <h5 class="fw-bold">Psoríase</h5>
                                <span class="badge bg-info">Conscientização</span>
                                <p class="mt-2 text-muted">Manchas vermelhas, secas e escamosas na pele podem ser sinais de psoríase.</p>
                            </div>
                            <div class="text-end">
                                <img src="<?php echo base_url('/assets/img/ajuda.jpg'); ?>" class="rounded w3-card cards_ajuste imagem_zoom" alt="Imagem">
                            </div>
                        </div>
                    </div>

                    <div class="col fotos_zoom" style="padding:5px">
                        <div class="card p-3 shadow-sm border-0">
                            <div class="card-body">
                                <p class="text-primary fw-bold">Doenças infecciosas</p>
                                <h5 class="fw-bold">COVID-19</h5>
                                <span class="badge bg-danger">Emergência médica</span>
                                <p class="mt-2 text-muted">Sintomas como febre, tosse seca e falta de ar podem ser sinais de COVID-19.</p>
                            </div>
                            <div class="text-end">
                                <img src="<?php echo base_url('/assets/img/emergencia.jpg'); ?>" class="rounded w3-card cards_ajuste imagem_zoom" alt="Imagem">
                            </div>
                        </div>
                    </div>

                    <div class="col fotos_zoom" style="padding:5px">
                        <div class="card p-3 shadow-sm border-0">
                            <div class="card-body">
                                <p class="text-primary fw-bold">Saúde da mulher</p>
                                <h5 class="fw-bold">Autoexame de mama</h5>
                                <span class="badge bg-warning">Prevenção</span>
                                <p class="mt-2 text-muted">Alterações como nódulos ou dor na mama podem indicar problemas. Faça o autoexame regularmente.</p>
                            </div>
                            <div class="text-end">
                                <img src="<?php echo base_url('/assets/img/ajuda.jpg'); ?>" class="rounded w3-card cards_ajuste imagem_zoom" alt="Imagem">
                            </div>
                        </div>
                    </div>
                    <div class="col fotos_zoom" style="padding:5px">
                        <div class="card p-3 shadow-sm border-0">
                            <div class="card-body">
                                <p class="text-primary fw-bold">Saúde masculina</p>
                                <h5 class="fw-bold">Saúde da próstata</h5>
                                <span class="badge bg-warning">Prevenção</span>
                                <p class="mt-2 text-muted">Sintomas como dificuldade para urinar e dor nas costas podem indicar problemas na próstata.</p>
                            </div>
                            <div class="text-end">
                                <img src="<?php echo base_url('/assets/img/ajuda.jpg'); ?>" class="rounded w3-card cards_ajuste imagem_zoom" alt="Imagem">
                            </div>
                        </div>
                    </div>

                    <div class="col fotos_zoom" style="padding:5px">
                        <div class="card p-3 shadow-sm border-0">
                            <div class="card-body">
                                <p class="text-primary fw-bold">Doenças infecciosas</p>
                                <h5 class="fw-bold">Dengue</h5>
                                <span class="badge bg-danger">Emergência médica</span>
                                <p class="mt-2 text-muted">Febre alta, dor no corpo e manchas vermelhas na pele podem ser sintomas de dengue.</p>
                            </div>
                            <div class="text-end">
                                <img src="<?php echo base_url('/assets/img/vacina.jpeg'); ?>" class="rounded w3-card cards_ajuste imagem_zoom" alt="Imagem">
                            </div>
                        </div>
                    </div>
                                                                                 
                 </div>
            </div>
        </div>



        <a href="#" class="whatsapp-icon" title="Chat no WhatsApp" onclick="aberturaChat()">
            <i class="fa fa-weixin" aria-hidden="true" style="font-size: 40px;"></i>
        </a>
        
        <br><br><br><br>
        <footer class="bg-dark text-white text-center conteudo" style="padding: 0.76rem 0; font-size: 0.9rem;">
            <div class="container" style="padding: 0;">
                <div class="row" style="margin: 0;">
                    <div class="col-md-6" style="padding: 0;">
                        <p style="margin: 0;">Saiba mais sobre nossos serviços e nossa equipe dedicada a cuidar da sua saúde.</p>
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
                <p class="alert alert-secondary  p-2 rounded-pill w3-card w3-left-align"><strong><i class="fa fa-android" aria-hidden="true"></i> BOT:</strong> Como posso ajudar?</p>
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

<script src="<?php echo base_url('/assets/js/chat.js?v=' . time()); ?>" defer></script>

</html>
