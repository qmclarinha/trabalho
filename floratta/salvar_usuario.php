<?php
extract($_POST);

if(!isset($_SESSION)) SESSION_START();

$_SESSION['cpf'] = $cpf;
$_SESSION['nome'] = $nome;

$arquivo = "usuarios/".$cpf.".dat";

$dados = $nome."\n";
$dados .= $cpf."\n";
$dados .= $endereco."\n";
$dados .= $bairro."\n";
$dados .= $cidade."\n";
$dados .= $estado."\n";
$dados .= $cep;

$arq = fopen($arquivo,"w");

fwrite($arq,$dados);

fclose($arq);

header('Location: cadastro2.php');
exit;
?>