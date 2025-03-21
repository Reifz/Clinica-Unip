<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Login da Clinica</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?php echo base_url('/assets/css/login.css'); ?>" rel="stylesheet">
</head>

<body>
 
    <div class="container-fluid d-flex justify-content-center align-items-center vh-100 shadow-lg" >
        <div class="card div_login w-100" style="max-width: 500px;">
            <div class="card-header bg-blue">
                <div class="div_img">
                    <img class="img-fluid_v2 mx-auto d-block" src="<?php echo base_url('/assets/img/logo_clinica.png'); ?>">
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('/usuario/autenticar'); ?>" method="POST">


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


                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label"><b>Email:</b></label>
                        <div class="input-group">
                            <span class="input-group-text">@</span><input type="email" class="form-control" id="email"
                                placeholder="Digite seu email..." name="email" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="pwd" class="form-label"><b>Senha:</b></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span><input
                                type="password" class="form-control" id="pwd" placeholder="Digite sua senha..."
                                name="senha" required>
                        </div>
                    </div>



                    <button type="submit" class="btn btn-primary botao_v2"><b>Avançar</b></button>
                    <hr>
                </form>

                <div class="d-flex justify-content-center align-items-cente">
                    <a href="<?php echo base_url('/usuario/cadastrar'); ?>" class="btn-primary"><b>Não estou cadastrado</b></a>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-center align-items-center" style="font-size: 12px;">
                <ul class="list-group list-group-horizontal w-100 text-center flex-wrap">
                    <li class="list-group-item flex-grow-1">
                        <i class="fa fa-signal" aria-hidden="true"></i> <a class="status" href=""> Status do Sistema</a>
                    </li>
                    <li class="list-group-item flex-grow-1">
                        <i class="fa fa-info-circle" aria-hidden="true"></i> <a href="" style="pointer-events: none;">
                            Central de ajuda</a>
                    </li>
                    <li class="list-group-item flex-grow-1">
                        <i class="fa fa-github" aria-hidden="true"></i> <a href=""> Versão do Sistema 1.02 5</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</body>

</html>