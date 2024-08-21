//Script para exibir a mensagem de depuração
const url = new URLSearchParams(window.location.search); 
const mensagem = url.get('mensagem'); 
document.getElementById('mensagem-depuracao').textContent = decodeURIComponent(mensagem);