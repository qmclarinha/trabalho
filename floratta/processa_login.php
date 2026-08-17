//mudar
<?php
extract($_POST);

if(!isset($_SESSION)) SESSION_START();

if(isset($b2)){

    $arquivo = "login/".$login.".dat";

    if(file_exists($arquivo)){

        $arq = fopen($arquivo,"r");

        $login_salvo = fgets($arq,1000);
        $senha_salva = fgets($arq,1000);
        $cpf = fgets($arq,1000);

        fclose($arq);

        $senha = md5($senha);

        if(trim($senha) == trim($senha_salva)){

            $_SESSION['Logado'] = 'ok';
            $_SESSION['Login'] = $login;
            $_SESSION['Cpf'] = trim($cpf);

            header('Location: confirmar.php');
            exit;

        }else{

            echo "Senha incorreta.";
        }

    }else{

        echo "Usuário não encontrado.";
    }

}
?>
