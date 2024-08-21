//Script para exibir a mensagem de depuração
function ExibirMensagem(){
    if(window.location.search != ''){
        const url = new URLSearchParams(window.location.search); 
        var mensagem = url.get('MensagemDepuracao'); 
        document.getElementById('MensagemDepuracao').textContent = decodeURIComponent(mensagem);
    }
}