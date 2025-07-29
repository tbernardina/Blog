# Fórum - Blog de Discussão

Projeto de fórum simples para postagem, comentário e interação entre usuários, desenvolvido com PHP, MySQL, HTML, CSS e JavaScript.

---

## 📋 Funcionalidades

- Cadastro e login de usuários com validação
- Criação, edição e visualização de postagens
- Sistema de comentários em cada postagem
- Logout seguro
- Interface responsiva e amigável
- Mensagens dinâmicas para feedback ao usuário
- Barra de navegação responsiva com menus móveis
- Validação de formulários no front-end e back-end

---

## 🗂️ Estrutura de Arquivos

├── Login.html              # Página de login,

├── Cadastro.html           # Página de registro de usuário,

├── Home.php                # Página principal com listagem de posts,

├── CriarPost.php           # Formulário para criação de nova postagem,

├── CriarComentario.php     # Processa comentários em posts,

├── ProcessarLogin.php      # Validação do login,

├── ProcessarCadastro.php   # Validação do cadastro,

├── ProcessarPost.php       # Processa criação/edição de posts,

├── Logout.php              # Script para logout do usuário,

├── conexao.php             # Conexão com banco de dados MySQL,

├── start.php               # Arquivo para iniciar sessões e configurações gerais,

├── ScriptNavbar.js         # Script para navegação responsiva (barra fixa),

├── mobile-navbar.js        # Script para menu móvel responsivo,

├── ScriptMensagem.js       # Script para exibir mensagens de feedback na interface,

├── u210937242_Projeto0.sql # Script SQL para criação das tabelas e dados iniciais do banco,

├── css/                    # Pasta com arquivos CSS para estilização,

├── js/                     # Pasta com arquivos JS para interatividade,

└── assets/                 # Imagens, ícones e outros recursos estáticos.


---

## 💻 Tecnologias Utilizadas

- PHP 7.x
- MySQL / MariaDB
- HTML5
- CSS3
- JavaScript (Vanilla)
- Servidor local como XAMPP, WAMP, LAMP

---

## 🛠️ Configuração e Execução

1. **Configurar ambiente local:**

   - Instale o XAMPP/WAMP/LAMP (Apache, PHP, MySQL)
   - Inicie os serviços Apache e MySQL

2. **Importar banco de dados:**

   - Use o arquivo `u210937242_Projeto0.sql` para criar o banco e as tabelas
   - Pode importar via phpMyAdmin ou terminal MySQL

3. **Configurar conexão:**

   - Verifique o arquivo `conexao.php`
   - Ajuste usuário, senha e host conforme seu ambiente

4. **Colocar arquivos no servidor:**

   - Copie todos os arquivos para a pasta pública do servidor (ex: `htdocs`)

5. **Acessar aplicação:**

   - Abra no navegador `http://localhost/Login.html`
   - Faça cadastro e login para usar o fórum

---

## 🔐 Segurança

- Senhas armazenadas no banco sem hash (recomendado implementar hashing com `password_hash`)
- Validações simples nos formulários (front e back-end)
- Recomenda-se uso de HTTPS em produção

---

## 📦 Banco de Dados

Contém as tabelas:

- `u210937242_usuario`  
- `u210937242_posts`  
- `u210937242_comentario`  

Com relacionamentos por chave estrangeira e dados iniciais de exemplo (usuário e post).

---

## 📄 Licença

Este projeto está licenciado sob a Licença Apache 2.0. Veja o arquivo LICENSE para detalhes.

---

## 📝 Contato

Thiago Bernardina — tbernardina@example.com  
GitHub: https://github.com/tbernardina

---

Se precisar de algo mais, ajuda para melhorar o projeto ou expandir funcionalidades, só avisar!
