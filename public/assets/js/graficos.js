function DesenhaGraficoColuna(dados) {
    var dadosConsulta = dados.consultaMes;

    var data = google.visualization.arrayToDataTable([
        ['Mês', 'Consultas'],
        ...Object.entries(dadosConsulta) 
    ]);

    var options = {
        title: 'Consultas Mensais',
        hAxis: { title: 'Mês' },
        vAxis: { title: 'Consultas' },
        legend: 'Total de consultas por mês'
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('grafico_coluna'));
    chart.draw(data, options);
}

function DesenhaGraficoColuna_2(dados) {
    var dadosFaixa = dados.faixaEtaria;
    var data = google.visualization.arrayToDataTable([
        ['Faixa etária', 'Quantidade'],
        ...Object.entries(dadosFaixa)
    ]);

    var options = {
        title: 'Faixa etária',
        hAxis: { title: 'faixa' },
        vAxis: { title: 'consultas' },
        legend: 'Faixa etária das consultas agendadas'
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('grafico_coluna_2'));
    chart.draw(data, options);
}

function DesenhaGraficoLinha(dados) {
    var dadosConsulta = dados.consultaMes;
    var data = google.visualization.arrayToDataTable([
        ['Mês', 'Consultas'],
        ...Object.entries(dadosConsulta) 
    ]);

    var options = {
        title: 'Consultas Mensais',
        hAxis: { title: 'Mês' },
        vAxis: { title: 'aumento de consultas mensais' },
        legend: 'none'
    };

    var chart = new google.visualization.LineChart(document.getElementById('grafico_linha'));
    chart.draw(data, options);
}
