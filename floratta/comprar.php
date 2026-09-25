<?php
if(!isset($_SESSION)) SESSION_START();

$_SESSION['produto'] = $_GET['produto'];
$_SESSION['valor'] = $_GET['valor'];

header("Location: login.php");
exit;
?>
