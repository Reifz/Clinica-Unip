<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Agendamentos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('/assets/css/relatorio.css'); ?>" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        var dados = <?= (json_encode($relatorio, JSON_UNESCAPED_UNICODE)); ?>; 
    </script>
    <script src="<?php echo base_url('/assets/js/graficos.js?v=' . time()); ?>"></script>
    <script>
    google.charts.load('current', { packages: ['corechart'] });
    google.charts.setOnLoadCallback(desenharGraficos);

    function desenharGraficos() {
        DesenhaGraficoColuna(dados); // Passe os dados para suas funções
        DesenhaGraficoColuna_2(dados);
        DesenhaGraficoLinha(dados);
    }
</script>

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
                    <li class="nav-item">
                        <a class="nav-link fw-bold px-3" href="<?php echo base_url('/relatorios/listar_relatorio'); ?>"><b>Relatorio</b></a>
                    </li>
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
                <h3 class="fw-bold text-white">Relatório Atual do Sistema</h3>
            </div>



            <div class="row w-100">


                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center">
                            <h4 class="card-title fw-bold text-primary">Consultas Mensais</h4>
                            <div id="grafico_coluna" class="chart-box"></div>
                            <hr>

                            <table
                                class="table table-bordered table-hover text-center table-striped shadow-sm rounded-3">
                                <thead class="table-primary text-white">
                                    <tr>
                                        <th>Mês</th>
                                        <th>Quantidade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if(isset($relatorio['consultaMes']) && $relatorio['consultaMes'] != null){?>
                                    <?php foreach ($relatorio['consultaMes'] as $key => $value) {?>
                                    <tr class="table-light">
                                        <td class="fw-bold"><?= esc($key) ?></td>
                                        <td><?= esc($value) ?></td>
                                    </tr>
                                    <?php } ?>
                                <?php } ?>
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center">
                            <h4 class="card-title fw-bold text-primary">Aumento de consultas</h4>
                            <div id="grafico_linha" class="chart-box"></div>
                            <hr>

                            <table
                                class="table table-bordered table-hover text-center table-striped shadow-sm rounded-3">
                                <thead class="table-primary text-white">
                                    <tr>
                                        <th>Mês</th>
                                        <th>Quantidade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if(isset($relatorio['consultaMes']) && $relatorio['consultaMes'] != null){ $valorAnterior = 0;?>
                                    <?php foreach ($relatorio['consultaMes'] as $key => $value) {?>
                                   
                                    <tr class="table-light">
                                        <td class="fw-bold"><?= esc($key) ?></td>
                                        <td class="<?php 
                                                $diferenca = $value - $valorAnterior;
                                                echo ($diferenca < 0) ? 'text-danger' : (($diferenca > 0) ? 'text-success' : 'text-primary');?>">
                                                <?= esc($diferenca) ?>
                                        </td>
                                        <?php $valorAnterior = $value; ?>
                                    </tr>
                                        <?php } ?>
                                 <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center">
                            <h4 class="card-title fw-bold text-primary">Faixa etaria</h4>
                            <div id="grafico_coluna_2" class="chart-box"></div>
                            <hr>
                            <table
                                class="table table-bordered table-hover text-center table-striped shadow-sm rounded-3">
                                <thead class="table-primary text-white">
                                    <tr>
                                        <th>Faixa Etária</th>
                                        <th>Agendamentos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if(isset($relatorio['faixaEtaria']) && $relatorio['faixaEtaria'] != null){?>
                                    <?php foreach ($relatorio['faixaEtaria'] as $key => $value) {?>
                                    <tr class="table-light">
                                        <td class="fw-bold"><?= esc($key) ?></td>
                                        <td><?= esc($value) ?></td>
                                    </tr>
                                    <tr>
                                   
                                    <?php } ?>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <!-- <div class="col-md-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-body text-center">
                                <h5 class="card-title">Gráfico de Vendas</h5>
                                <div id="chart_div" class="chart-box"></div>
                            </div>
                        </div>
                    </div> -->

            </div>
        </div>
    </div>



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


    <!-- The Modal Editar -->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>

</body>

</html>