function aberturaChat() {
    const chatBox = document.getElementById('chatBox');
    chatBox.style.display = chatBox.style.display === 'none' || chatBox.style.display === '' ? 'block' : 'none';
}

function chatEnvioMensagens() {
    const novaMensagemUsuario = document.getElementById('userMessage').value;
    if (novaMensagemUsuario.trim() !== '') {

        const chatHistory = document.getElementById('chatHistory');

        const CampoNovaMensagemUsuario = document.createElement('p');
        CampoNovaMensagemUsuario.innerHTML = `<strong><i class="fa fa-user-circle" aria-hidden="true"></i> Você:</strong> ${novaMensagemUsuario}`;
        CampoNovaMensagemUsuario.className = "alert alert-success p-2 w3-card w3-left-align";
        
        chatHistory.appendChild(CampoNovaMensagemUsuario);
        //
        document.getElementById('botaoEnviarMsg').innerHTML = '<img src="http://localhost/clinica/public/assets/img/loading.gif" width="25px" alt="GIF">';
        document.getElementById('botaoEnviarMsg').disabled = true;
        //
        document.getElementById('userMessage').value = ''; // Limpa o campo de input
        chatHistory.scrollTop = chatHistory.scrollHeight; // Rola para baixo

        var url = "http://localhost/clinica/public/agendamentos/chat";
        var datas = { NovaMensagemUsuario: novaMensagemUsuario };
        
        $.ajax({
            url: url,
            method: 'POST',  // ALTERADO PARA POST
            data: JSON.stringify(datas),
            contentType: 'application/json',  // Especifica JSON
            dataType: 'json',  // Espera JSON de resposta
            success: function(response) {
                tratarResposta(response);
            },
            error: function(xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
                tratarErro();
            }
        });
        
        function tratarResposta(response) {
            const CampoNovaMensagemBot = document.createElement('p');
            document.getElementById('botaoEnviarMsg').innerHTML = 'Enviar';
            document.getElementById('botaoEnviarMsg').disabled = false;
        
            CampoNovaMensagemBot.innerHTML = `<strong><i class="fa fa-android" aria-hidden="true"></i> BOT:</strong> ${response.mensagem || 'Não entendi'}`;
            CampoNovaMensagemBot.className = "alert alert-secondary p-2 w3-card w3-left-align";
            chatHistory.appendChild(CampoNovaMensagemBot);
            
            document.getElementById('userMessage').value = ''; // Limpa o input
            chatHistory.scrollTop = chatHistory.scrollHeight; // Rola para baixo
        }
        
        function tratarErro() {
            const CampoNovaMensagemBot = document.createElement('p');
            document.getElementById('botaoEnviarMsg').innerHTML = 'Enviar';
            document.getElementById('botaoEnviarMsg').disabled = false;
        
            CampoNovaMensagemBot.innerHTML = `<strong><i class="fa fa-android" aria-hidden="true"></i> BOT:</strong> Não entendi`;
            CampoNovaMensagemBot.className = "alert alert-secondary p-2 w3-card w3-left-align";
            chatHistory.appendChild(CampoNovaMensagemBot);
            
            document.getElementById('userMessage').value = ''; // Limpa o input
            chatHistory.scrollTop = chatHistory.scrollHeight; // Rola para baixo
        }
        
        
    }
}