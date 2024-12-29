<?
ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once 'inc/conection.php';
include('inc/sessao.php');
var_dump($_POST);
$nome = $_POST["nome"];
$quantidade = $_POST["quantidade"];
$local = $_POST["local"];
$valor = $_POST["valor"];
if($_POST["desconto"] == ""){
    $desconto = 0;
}else{
    $desconto = $_POST["desconto"];
}
$entrada = $_POST["data"];
 $sql = "INSERT INTO `pecas` (`nome_pecas`, `qtd`, `local_compra`, `valor`, `desconto`, `data_entrada`) VALUES ( ?, ?, ?, ?, ?, ?)";
 $stmt = $conexao->prepare($sql);
 $stmt->bind_param('sisdds',$nome, $quantidade, $local, $valor, $desconto, $entrada );
 $stmt->execute();
 echo "<script>alert('peça Cadastrada com sucesso!! ');</script>";
 header ("location: index");
 ?>
