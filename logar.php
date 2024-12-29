<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once 'inc/conection.php';

$login = $_POST['login'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM tdusers WHERE `login` = '$login' and senha = '$senha' ";

$result = $conexao->query($sql);
if( $result->num_rows === 1){
    //echo "Logado com sucesso <br>";
    //echo "Seu Id de usuario é : " . $result->fetch_assoc()["id"];
    while($row = $result->fetch_assoc()){
        $id = $row['iduser'];
        $nome = $row['usuario'];
        $telefone = $row['telefone'];
    }
    session_start();
    
    
    // echo $_SESSION["id"] = $id;
    echo $_SESSION["nome"] = $nome;
    echo $_SESSION["email"] = $email;
    header("location: index");
}else{
    echo "usuario ou senha incorretos, tente novamente";
    header('Location:login');
}
mysqli_close($conexao);
