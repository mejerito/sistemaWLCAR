<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$id = $_GET["id"];
$nomePagina = "Ordem de Serviço ".$id;
include('inc/conection.php');
include('inc/head.php');

$sql = "SELECT * FROM `tbcliente` WHERE `idCli` = $id";
$resultado = $conexao->query($sql);?>
<div class="container">
    <?php
    while ($row = $resultado->fetch_assoc()) {
        
        ?>
        <h1 class="text-center"> Ordem de Serviço</h1>
        <form action="" id="form-cadastro" method="post">
            <div class="row">
                <div class="col-8">

                    <input type="text" class="w-100" placeholder="Nome do cliente" name="nome" value="<?=$row['nomeCliente']?>"> 
                </div>
                <div class="col-3"><label>OS:</label>
                <input type="text" class="w-50" name="os" readonly value="<?=$row['idCli']?>"> </div>
                <div class="col-6 mt-2">
                    <input type="text" class="w-100" placeholder="Marca do veículo" name="marca" value="<?=$row['marca']?>">
                </div>
                <div class="col-6 mt-2">
                    <input type="text" class="w-100" placeholder="Ano" name="ano" value="<?=$row['ano']?>">
                </div>
                <div class="col-6 mt-2">
                    <input type="text" class="w-100" placeholder="Modelo" name="modelo" value="<?=$row['modelo']?>">
                </div>
                <div class="col-6 mt-2">
                    <input type="text" class="w-100" placeholder="Placa do veículo" name="placa" value="<?=$row['placa']?>">
                </div>
                <div class="col-6 mt-2">
                    <input type="text" class="w-100" placeholder="quilometragem de entrada" name="entrada" value="<?=$row['km_entrada']?>">
                </div>
                <div class="col-6 mt-2">
                    <input type="text" class="w-100" placeholder="quilometragem de saida" name="saida" value="<?=$row['km_saida']?>">
                </div>
                <div class="col-12 mt-2">
                    <textarea class="w-100" name="avarias" placeholder="Avarias aparentes" ><?=$row['avarias']?></textarea>
                </div>
                <div class="col-6 mt-2">
                    <input type="email" class="w-100" placeholder="email" name="email" value="<?=$row['email']?>">
                </div>
                <div class="col-6 mt-2">
                    <input type="text" class="w-100" placeholder="Telefone" name="telefone" value="<?=$row['telefone']?>">
                </div>
                <div class="col-6 mt-2">
                    <input type="text" class="w-100" placeholder="Motivo da entrada" name="motivoEntrada" value="<?=$row['motivo_entrada']?>">
                </div>
                <div class="col-6 mt-2">
                    <input type="date" class="w-100" name="dataEntrada" value="<?=$row['data_entrada']?>">
                </div>
                <div class="col-12">
                    <hr>
                </div>
                <h2 class="text-center">Serviços realizados</h2>
                <table class="table" id="tabela-principal">
                    <thead>
                        <tr>
                        
                        
                        <th scope="col">Serviço</th>
                        <th scope="col">Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $somaServicos = 0;
                        $select = "SELECT * FROM `ordem_servico` WHERE `id_pedido` = $id";
                        $executados = $conexao->query($select);
                        if ($executados->num_rows > 0) {
                            while ($servicos = $executados->fetch_assoc()) {
                            
                                $codigo = htmlspecialchars($servicos['id_pedido']);
                                $servico = htmlspecialchars($servicos['nome_servico']);
                                $valor = htmlspecialchars($servicos['valor']);
                                $somaServicos += $valor;
                                echo "<tr>
                                
                                <td>$servico</td>
                                <td>R$ $valor,00</td>

                                </tr>";
                        }
                    }
                        ?>
                    </tbody>
                </table>
                <input type="hidden" id="dados-tabela" name="dados_tabela">
                <div class="w-100 text-right">
                <strong>Total: R$ <span id="total-preco"><?=$somaServicos?>,00</span></strong>
            </div>
        </form>
    
        <?}?>

      
    </div>