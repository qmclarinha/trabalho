<?php
extract($_POST);

if(!isset($_SESSION)) SESSION_START();

$cpf = $_SESSION['cpf'];

$arquivo = "login/".$login.".dat";

$senha = md5($senha);

$dados = $login."\n";
$dados .= $senha."\n";
$dados .= $cpf;

$arq = fopen($arquivo,"w");

fwrite($arq,$dados);

fclose($arq);

header('Location: login.php');
exit;
?>