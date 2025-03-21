<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Seus dados</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('/assets/css/usuario.css'); ?>" rel="stylesheet">
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
                <h3 class="fw-bold text-white">Seus dados</h3>
            </div>

            <div class="row">
                <div class="col-md-7">
                    <form action="<?php echo base_url('/usuario/atualizar'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-body">
                                <div class="card text-center shadow-lg p-3 mb-4 bg-blue">
                                    <h3 class="fw-bold text-white">Suas Informações</h3>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-12">

                                                <label for="email" class="form-label"><b>Nome:</b></label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fa fa-user-circle-o"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" class="form-control" placeholder="Nome..."
                                                        name="nome_usuario" value="<?= esc($usuario['nome_usuario']) ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">

                                                <label for="email" class="form-label"><b>Email:</b></label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fa fa-google-plus-official"
                                                            aria-hidden="true"></i></span>
                                                    <input type="email" class="form-control" placeholder="Email..."
                                                        name="email_usuario" value="<?= esc($usuario['email_usuario']) ?>" required>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <label for="email" class="form-label"><b>CPF:</b></label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fa fa-id-card-o"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" class="form-control" placeholder="CPF..."
                                                        name="cpf_usuario" value="<?= esc($usuario['cpf_usuario']) ?>" oninput="mascaraCPF(this)" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="email" class="form-label"><b>Número:</b></label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fa fa-phone-square"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" class="form-control" placeholder="Número..."
                                                        name="numero_usuario" value="<?= esc($usuario['numero_usuario']) ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="email" class="form-label"><b>Data Nascimento:</b></label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fa fa-calendar-check-o"
                                                            aria-hidden="true"></i></span>
                                                    <input type="date" class="form-control" placeholder="Enter password"
                                                        name="data_nascimento" value="<?= esc($usuario['data_nascimento']) ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="email" class="form-label"><b>Data de Cadastro:</b></label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fa fa-calendar-plus-o"
                                                            aria-hidden="true"></i></span>
                                                    <input type="datetime-local" class="form-control" placeholder="Enter password"
                                                        name="data_cadastro" value="<?= esc($usuario['data_cadastro']) ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="card h-100 shadow border-0">
                                            <?php if($usuario['foto_usuario'] != null){ ?>
                                                <img class="card-img-top cards_ajuste" src="<?= base_url($usuario['foto_usuario']) ?>" alt="Card image ">
                                            <?php }else {?>
                                                <img class="card-img-top cards_ajuste" src="<?php echo base_url('/assets/img/no_photo.jpg'); ?>" alt="Card image ">
                                            <?php }?>
                                            <div class="card-body">
                                                <label for="inputImagem1" class="form-label fw-bold">Atualizar
                                                    Foto</label>
                                                <input class="form-control" type="file" name="foto_usuario"
                                                    id="inputImagemPerfil" accept="image/*">

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <br>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-outline-success"
                                        data-bs-dismiss="modal"><b>Atualizar Seus Dados</b></button>
                                </div>

                    </form>

                </div>
            </div>

        </div>
        <div class="col-md-5">
            <form action="<?php echo base_url('/usuario/atualizar_endereco'); ?>" method="POST">
                <div class="card">
                    <div class="card-body">
                        <div class="card text-center shadow-lg p-3 mb-4 bg-blue">
                            <h3 class="fw-bold text-white">Seu Endereço</h3>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <label for="email" class="form-label"><b>CEP:</b></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-home" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" placeholder="CEP..." name="cep_endereco"
                                        onkeyup="setarCepMascara(event)" maxlength="9" value="<?= esc($endereco['cep_endereco']) ?>" required>
                                </div>
                            </div>
                            <div class="col-md-12">

                                <label for="email" class="form-label"><b>Logradouro:</b></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-map" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" placeholder="Logradouro..."
                                        name="logradouro" value="<?= esc($endereco['logradouro']) ?>" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="email" class="form-label"><b>Bairro:</b></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-building"
                                            aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" placeholder="Bairro..." name="bairro" value="<?= esc($endereco['bairro']) ?>" 
                                        required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="email" class="form-label"><b>Complemento:</b></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-street-view"
                                            aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" placeholder="Complemento..." value="<?= esc($endereco['complemento']) ?>"
                                        name="complemento" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="email" class="form-label"><b>Numero:</b></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-map-pin"
                                            aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" placeholder="Numero..." name="numero" value="<?= esc($endereco['numero']) ?>"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="email" class="form-label"><b>UF:</b></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-map-marker"
                                            aria-hidden="true"></i></span>
                                    <input type="text" maxlength="2" class="form-control" placeholder="UF..." name="uf" value="<?= esc($endereco['uf']) ?>" required> 
                                </div>
                            </div>
                        </div>
                        <br>
                        <input type="hidden" name="id_endereco" value="<?= esc($endereco['id_endereco']) ?>"> 
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-success"><b>Atualizar
                                    Endereço</b></button>
                        </div>
            </form>
        </div>
    </div>

    </div>
    </div>

    </form>

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



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>

</body>
<script src="<?php echo base_url('/assets/js/usuario.js'); ?>" defer></script>
<script src="<?php echo base_url('/assets/js/chat.js?v=' . time()); ?>" defer></script>
</html>