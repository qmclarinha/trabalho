<?php
if(!isset($_SESSION)) session_start();

include "cons.php";
require_once "dll.php";

extract($_POST);

if(isset($B1)){

    $consulta = "INSERT INTO usuarios (id, nome, cpf, endereco, bairro, cidade, estado, cep) VALUES (NULL, '$nome', '$cpf', '$endereco', '$bairro', '$cidade', '$estado', '$cep')";
    banco($server, $user, $password, $db, $consulta);

    $consulta = "SELECT id FROM usuarios WHERE cpf = '$cpf'";
    $resultado = banco($server, $user, $password, $db, $consulta);
    $linha = $resultado->fetch_assoc();

    $_SESSION['UsuarioId'] = $linha['id'];
    $_SESSION['Cpf'] = $cpf;
    $_SESSION['Nome'] = $nome;

    header("Location: cadastro2.php");
    exit();
}

if(isset($B2)){

    if(!isset($_SESSION['UsuarioId'])){
        header("Location: cadastro1.php");
        exit();
    }

    $usuario_id = $_SESSION['UsuarioId'];
    $senha = md5($senha);

    $consulta = "INSERT INTO login (id, login, senha, usuario_id) VALUES (NULL, '$login', '$senha', '$usuario_id')";
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

            $consulta = "SELECT * FROM usuarios WHERE id = '".$linha['usuario_id']."'";
            $resultado = banco($server, $user, $password, $db, $consulta);
            $usuario = $resultado->fetch_assoc();

            $_SESSION['Logado'] = 'ok';
            $_SESSION['Login'] = $linha['login'];
            $_SESSION['UsuarioId'] = $usuario['id'];
            $_SESSION['Cpf'] = $usuario['cpf'];
            $_SESSION['Nome'] = $usuario['nome'];

            header("Location: produtos.php");
            exit();

        }else{
            $_SESSION['ErroLogin'] = "Senha incorreta.";
            header("Location: login.php");
            exit();
        }

    }else{
        $_SESSION['ErroLogin'] = "Usuário não encontrado.";
        header("Location: login.php");
        exit();
    }
}

if(isset($B5)){

    if(!isset($_SESSION['Logado']) || $_SESSION['Logado'] != 'ok'){
        header("Location: login.php");
        exit();
    }

    $cpf = $_SESSION['Cpf'];
    $quantidade = (int)$quantidade;
    if($quantidade < 1) $quantidade = 1;

    $consulta = "SELECT * FROM carrinho WHERE cpf = '$cpf' AND id_produto = '$id_produto'";
    $resultado = banco($server, $user, $password, $db, $consulta);
    $item = $resultado->fetch_assoc();

    if($item){
        $nova_quantidade = $item['quantidade'] + $quantidade;
        $consulta = "UPDATE carrinho SET quantidade = '$nova_quantidade' WHERE id = '".$item['id']."'";
    }else{
        $consulta = "INSERT INTO carrinho (id, cpf, id_produto, quantidade) VALUES (NULL, '$cpf', '$id_produto', '$quantidade')";
    }
    banco($server, $user, $password, $db, $consulta);

    header("Location: carrinho.php");
    exit();
}

if(isset($B6)){

    if(!isset($_SESSION['Logado']) || $_SESSION['Logado'] != 'ok'){
        header("Location: login.php");
        exit();
    }

    $cpf = $_SESSION['Cpf'];

    $consulta = "DELETE FROM carrinho WHERE id = '$id_carrinho' AND cpf = '$cpf'";
    banco($server, $user, $password, $db, $consulta);

    header("Location: carrinho.php");
    exit();
}

if(isset($B4)){

    if(!isset($_SESSION['Logado']) || $_SESSION['Logado'] != 'ok'){
        header("Location: login.php");
        exit();
    }

    $cpf = $_SESSION['Cpf'];
    $login = $_SESSION['Login'];

    $consulta = "SELECT carrinho.id_produto, carrinho.quantidade, produtos.preco
                 FROM carrinho
                 INNER JOIN produtos ON carrinho.id_produto = produtos.id
                 WHERE carrinho.cpf = '$cpf'";
    $resultado = banco($server, $user, $password, $db, $consulta);

    $numero = rand(1000,9999);
    $data = date('Y-m-d');
    $hora = date('H:i:s');

    while($item = $resultado->fetch_assoc()){
        $id_produto = $item['id_produto'];
        $quantidade = $item['quantidade'];
        $valor = $item['preco'] * $item['quantidade'];

        $consulta = "INSERT INTO vendas (id, numero, login, cpf, id_produto, quantidade, valor, data, hora, pagamento)
                     VALUES (NULL, '$numero', '$login', '$cpf', '$id_produto', '$quantidade', '$valor', '$data', '$hora', '$pagamento')";
        banco($server, $user, $password, $db, $consulta);
    }

    $consulta = "DELETE FROM carrinho WHERE cpf = '$cpf'";
    banco($server, $user, $password, $db, $consulta);

    $_SESSION['NumeroPedido'] = $numero;

    header("Location: confirmar.php");
    exit();
}
?>
