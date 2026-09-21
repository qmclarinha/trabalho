floratta
maria clara e mirelle

floratta é um site de venda simples de plantas desenvolvido utilizando html, css e php, o sistema permite que o usuário realize cadastro, login e compra de plantas, os dados dos usuários, logins e vendas são armazenados em um banco de dados

anteriormente, os dados eram armazenados em arquivos .dat usando fopen(), fwrite() e fclose(). após a alteração do professor, o sistema passou a usar o banco de dados mysql, com as operações no banco.php

funcionalidades do sistema:
* página inicial com banner e destaques
* cadastro de usuário
* cadastro de login e senha
* sistema de login
* listagem de produtos
* compra de produtos
* confirmação de compra
* finalização da compra
* logout do usuário
* armazenamento de usuários, logins e vendas no banco de dados mysql
* utilização de comandos sql para inserir e consultar informações

arquivos do projeto:

index.php
página inicial do site, com banner e plantas em destaque

login.php
tela de login do usuário. envia os dados para o banco.php utilizando o botão b3

cadastro1.php
formulário para cadastrar os dados pessoais do usuário. envia os dados para o banco.php utilizando o botão b1

cadastro2.php
formulário para cadastrar o login e a senha do usuário. envia os dados para o banco.php utilizando o botão b2

banco.php
arquivo responsável por centralizar as operações do banco de dados

* b1: insere os dados pessoais na tabela usuarios
* b2: insere o login e a senha na tabela login
* b3: consulta o login e a senha e realiza a autenticação
* b4: insere os dados da compra na tabela vendas

produtos.php
página com a vitrine de plantas disponíveis para compra

confirmar.php
mostra os dados da compra antes da confirmação e envia as informações para o banco.php utilizando o botão b4

carrinho.php
mostra os produtos adicionados ao carrinho

finalizar.php
finaliza a compra e limpa o carrinho

comprar.php
recebe os dados do produto selecionado e direciona o usuário

sair.php
encerra a sessão do usuário, realizando o logout

estilo.css
arquivo responsável pelo visual e pela estilização do site

app/cons.php
armazena as informações necessárias para a conexão com o banco de dados mysql

app/DLL.php
possui a função banco(), responsável por conectar ao mysql e executar as consultas sql

tags e funções utilizadas

session_start()
inicia a sessão do usuário para armazenar informações enquanto ele navega no site

$_SESSION
usado para guardar dados do usuário, como nome, cpf, login e status de autenticação

$_POST
recebe dados enviados pelos formulários

extract()
transforma os dados recebidos pelo $_POST em variáveis

if
estrutura de condição utilizada para verificar situações no sistema

isset()
verifica se uma variável existe antes de utilizá-la. no banco.php, é usada para verificar qual botão foi enviado

echo
exibe informações na tela

header()
redireciona o usuário para outra página

exit()
interrompe a execução do código após o redirecionamento

md5()
função de hash utilizada para transformar a senha antes de armazená-la e compará-la durante o login

rand()
gera números aleatórios para o número da venda

date()
obtém a data e a hora atuais para registrar a venda

unset()
remove informações da sessão, como o carrinho

session_destroy()
finaliza a sessão do usuário, realizando logout

banco()
função presente no DLL.php que conecta ao banco de dados e executa consultas sql

insert
comando sql utilizado para inserir novos registros nas tabelas do banco de dados

select
comando sql utilizado para consultar informações armazenadas no banco de dados

where
define uma condição para selecionar registros específicos em uma consulta sql

fetch_assoc()
gera uma linha do resultado de uma consulta sql como um array associativo

estrutura de pastas:

/imagens
armazena as imagens das plantas e do banner

/app
armazena os arquivos cons.php e DLL.php, responsáveis pela conexão do banco de dados
