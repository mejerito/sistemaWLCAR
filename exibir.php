<? $nomePagina = "Home";
include('inc/sessao.php');
include_once('inc/conection.php');


?>
<?include "inc/head.php"?>
<div class="container">
    <div class="row">

        <h2 class="text-center">Exibir OS</h2>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col-3">numero da OS</th>
                    <th scope="col-3">Cliente</th>
                    <th scope="col-3">motivo</th>
                    <th scope="col-3">ações</th>
                </tr>
            </thead>
            <tbody>
                <?
            $sql = "SELECT idCli, nomeCliente, motivo_entrada FROM `tbcliente` WHERE `remocao` IS null";
            $resultado = $conexao->query($sql);
            if ($resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
                    $id = htmlspecialchars($row['idCli']);
                    $nome = htmlspecialchars($row['nomeCliente']);
                    $motivo = htmlspecialchars($row['motivo_entrada']);

                    echo "<tr>
                    <td>$id</td>
                    <td>$nome</td>
                    <td>$motivo</td>
                    <td> 
                        <a href='resutadoos/?id=$id' class='btn btn-primary'>Exibir</a> 
                        <a href='remocao/?id=$id' class='btn btn-danger'>Excluir</a>   
                    </td>
                    </tr>";
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>