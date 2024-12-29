<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('inc/conection.php');
$id = $_GET["id"];
$remocao =  "UPDATE `tbcliente` SET `remocao` = now() WHERE `tbcliente`.`idCli` = ?";

$stmt = $conexao->prepare($remocao);
$stmt->bind_param('i', $id);
$stmt->execute();
echo '<script>window.history.back();</script>';
