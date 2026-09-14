<?php

include "app/cons.php";
require_once "app/DLL.php";

extract($_POST);

if(!isset($_SESSION)) SESSION_START();

if(isset($B1)){

    $_SESSION['Cpf'] = $cpf;
    $_SESSION['Nome'] = $nome;

    $consulta = "INSERT INTO usuarios (id, nome, cpf, endereco, bairro, cidade, estado, cep) VALUES (NULL, '$nome', '$cpf', '$endereco', '$bairro', '$cidade', '$estado', '$cep')";

    banco($server, $user, $password, $db, $consulta);

    header("Location: cadastro2.php");
    exit();
}

if(isset($B2)){

    $cpf = $_SESSION['Cpf'];
    $senha = md5($senha);

    $consulta = "INSERT INTO login (id, login, senha, cpf) VALUES (NULL, '$login', '$senha', '$cpf')";

    banco($server, $user, $password, $db, $consulta);

    header("Location: login.php");
    exit();
}

if(isset($B3)){

    $consulta = "SELECT * FROM login WHERE login = '$login'";

    $resultado = banco($server, $user, $password, $db, $consulta);

    $linha = $resultado->fetch_assoc();

    if($linha){

        $senha = md5($senha);

        if($senha == $linha['senha']){

            $_SESSION['Logado'] = 'ok';
            $_SESSION['Login'] = $linha['login'];
            $_SESSION['Cpf'] = $linha['cpf'];

            $consulta = "SELECT * FROM usuarios WHERE cpf = '".$linha['cpf']."'";

            $resultado = banco($server, $user, $password, $db, $consulta);

            $usuario = $resultado->fetch_assoc();

            $_SESSION['Nome'] = $usuario['nome'];

            header("Location: confirmar.php");
            exit();

        }else{

            echo "Senha incorreta.";

        }

    }else{

        echo "Usuário não encontrado.";

    }
}

if(isset($B4)){

    $produto = $_POST['produto'];
    $valor = $_POST['valor'];
    $pagamento = $_POST['pagamento'];

    $numero = rand(1000,9999);
    $data = date('d/m/Y');
    $hora = date('H:i');

    $login = $_SESSION['Login'];
    $cpf = $_SESSION['Cpf'];

    $consulta = "INSERT INTO vendas (id, numero, login, cpf, produto, valor, data, hora, pagamento) VALUES (NULL, '$numero', '$login', '$cpf', '$produto', '$valor', '$data', '$hora', '$pagamento')";

    banco($server, $user, $password, $db, $consulta);

 unset($_SESSION['carrinho']);
    ?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
    <meta charset="UTF-8">
    <title>Compra realizada - Floratta</title>
    <link rel="stylesheet" href="estilo.css">
    </head>

    <body>

    <section class="destaques">

    <h2>Compra realizada com sucesso!</h2>

    <div class="formulario">

    <p><b>Número da venda:</b> <?php echo $numero; ?></p>
    <p><b>Produto:</b> <?php echo $produto; ?></p>
    <p><b>Valor:</b> R$ <?php echo $valor; ?></p>

    <a href="index.php" class="botao">Voltar para o início</a>

    </div>

    </section>

    </body>
    </html>

    <?php
}
?>
