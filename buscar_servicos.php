<?php
include 'inc/conection.php';

// Consulta para buscar peças
$sql = "SELECT * FROM `servicos`";
$resultado = $conexao->query($sql);
// Montando a tabela de resposta
if ($resultado->num_rows > 0) {
    echo '<table class="table">';
    echo '<thead>
    <tr>
    <th>ID</th>
    <th>Nome</th>
    
    <th>Preço</th>
    </tr>
    </thead>';
    echo '<tbody>';
    while ($row = $resultado->fetch_assoc()) {
        $id = htmlspecialchars($row['id']);
        $nome = htmlspecialchars($row['nome_servico']);
        
        $preco = number_format($row['valor'], 2, ',', '.');
        
        echo "<tr>
        <td>$id</td>
        <td>$nome</td>
        
        <td>R$ $preco</td>
        <td>
            <button class='btn btn-primary btn-sm' onclick='adicionarNaTabela(\"$id\", \"$nome\", \"$preco\")'>Adicionar</button>
        </td>
      </tr>";
    }
    echo '</tbody></table>';
} else {
    echo '<p>Nenhuma peça encontrada.</p>';
}
?>
