<?php
if(!isset($_SESSION)) SESSION_START();

session_destroy();

header('Location: index.php');
exit;
?>