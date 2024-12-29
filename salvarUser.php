<?
ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once 'inc/conection.php';
include('inc/sessao.php');
var_dump($_POST);
$nome = $_POST["user"];
$telefone = $_POST["telefone"];
$login = $_POST["login"];
$senha = $_POST["senha"];

 $sql = "INSERT INTO `tdusers` (`usuario`, `telefone`, `login`, `senha`) VALUES (?,?,?,?)";
 $stmt = $conexao->prepare($sql);
 $stmt->bind_param('ssss',$nome, $telefone, $login, $senha);
 $stmt->execute();
 echo "<script>alert('peça Cadastrada com sucesso!! ');</script>";
 header ("location: index");
 ?>
