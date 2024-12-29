<?
ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once 'inc/conection.php';
include('inc/sessao.php');
var_dump($_POST);
$nome = $_POST["nome"];

$valor = $_POST["valor"];

 $sql = "INSERT INTO `servicos` (`nome_servico`, `valor`, `desconto`) VALUES ( ?, ?, 0)";
 $stmt = $conexao->prepare($sql);
 $stmt->bind_param('si',$nome, $valor);
 $stmt->execute();
 echo "<script>alert('peça Cadastrada com sucesso!! ');</script>";
 header ("location: index");
 ?>
