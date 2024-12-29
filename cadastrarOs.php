<? $nomePagina = "Cadastrar Ordem de Serviço";
include('inc/sessao.php');

include "inc/head.php"?>
</head>
<body>
    <div class="container">
<h1 class="text-center"> Cadastrar Ordem de Serviço</h1>
<form action="inc/cadastrados" id="form-cadastro" method="post">
    <div class="row">
        <div class="col-8">

            <input type="text" class="w-100" placeholder="Nome do cliente" name="nome"> 
        </div>
        <div class="col-3"><label>Numero da OS:</label>
        <input type="text" class="w-50" name="os" readonly value="<?include("inc/geraos")?>"> </div>
        <div class="col-6 mt-2">
            <input type="text" class="w-100" placeholder="Marca do veículo" name="marca">
        </div>
        <div class="col-6 mt-2">
            <input type="text" class="w-100" placeholder="Ano" name="ano">
        </div>
        <div class="col-6 mt-2">
            <input type="text" class="w-100" placeholder="Modelo" name="modelo">
        </div>
        <div class="col-6 mt-2">
            <input type="text" class="w-100" placeholder="Placa do veículo" name="placa">
        </div>
        <div class="col-6 mt-2">
            <input type="text" class="w-100" placeholder="quilometragem de entrada" name="entrada">
        </div>
        <div class="col-6 mt-2">
            <input type="text" class="w-100" placeholder="quilometragem de saida" name="saida">
        </div>
        <div class="col-12 mt-2">
            <textarea class="w-100" name="avarias" placeholder="Avarias aparentes"></textarea>
        </div>
        <div class="col-6 mt-2">
            <input type="email" class="w-100" placeholder="email" name="email">
        </div>
        <div class="col-6 mt-2">
            <input type="text" class="w-100" placeholder="Telefone" name="telefone">
        </div>
        <div class="col-6 mt-2">
            <input type="text" class="w-100" placeholder="Motivo da entrada" name="motivoEntrada">
        </div>
        <div class="col-6 mt-2">
            <input type="date" class="w-100" name="dataEntrada">
        </div>
        <div class="col-12">
            <hr>
        </div>
        <h2 class="text-center">Serviços realizados</h2>
        <table class="table" id="tabela-principal">
            <thead>
                <tr>
                
                <th scope="col">Código</th>
                <th scope="col">Serviço</th>
                <th scope="col">Valor</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
        <input type="hidden" id="dados-tabela" name="dados_tabela">
        <div class="w-100 text-right">
        <strong>Total: R$ <span id="total-preco">0,00</span></strong>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-primary m-2" onclick="carregarPecas()">Adicionar Peças</button>
            <button class="btn btn-primary m-2" type="button"  onclick="enviarFormulario()"  >Salvar</button>
            <button type="button" class="btn btn-success m-2" onclick="adicionarServico()">Adicionar Serviços</button>
        </div>
    </form>
</div>
</div>

<!-- Modal para adicionar serviços -->
<div id="modal-adicionar-servico" style="display:none; position:fixed; top:20%; left:30%; background:white; padding:20px; border:1px solid #ccc; z-index:1000;">
<?include 'buscar_servicos';?>
</div>

<!-- Modal -->
<div id="modal-pecas" style="display:none; position:fixed; top:10%; left:20%; width:60%; background:white; border:1px solid #ccc; padding:20px; z-index:1000;">
    <?//include 'buscar_pecas';?>
    <h4 class="text-center">Lista de Peças</h4>
    <div id="conteudo-pecas"></div>
    <button type="button" class="btn btn-secondary" onclick="fecharModal()">Fechar</button>
</div>

<script>
let totalPreco = 0;
function enviarFormulario() {
    // Obter as linhas da tabela principal
    const linhas = document.querySelectorAll('#tabela-principal tbody tr');
    const dadosTabela = [];

    linhas.forEach((linha) => {
        const colunas = linha.querySelectorAll('td');
        const item = {
            id: colunas[0].textContent,
            nome: colunas[1].textContent,
            preco: colunas[2].textContent.replace('R$', '').trim()
        };
        dadosTabela.push(item);
    });

    // Converter os dados da tabela para JSON e colocá-los no campo oculto
    document.getElementById('dados-tabela').value = JSON.stringify(dadosTabela);

    // Enviar o formulário
    document.getElementById('form-cadastro').submit();
}
function carregarPecas() {
    // Exibir o modal
    document.getElementById('modal-pecas').style.display = 'block';

    // Fazer requisição AJAX para buscar_pecas
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'buscar_pecas', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            // Inserir os dados no modal
            document.getElementById('conteudo-pecas').innerHTML = xhr.responseText;
        } else {
            document.getElementById('conteudo-pecas').innerHTML = '<p>Erro ao carregar peças.</p>';
        }
    };
    xhr.send();
}
function adicionarNaTabela(id, nome, preco) {
    
    // Selecionar a tabela principal
    const tabela = document.getElementById('tabela-principal').querySelector('tbody');

    // Criar uma nova linha com os dados
    const novaLinha = document.createElement('tr');
    novaLinha.innerHTML = `
        <td>${id}</td>
        <td>${nome}</td>
        <td>R$ ${preco}</td>
    `;

    // Adicionar a linha na tabela
    tabela.appendChild(novaLinha);

    const precoNumerico = parseFloat(preco.replace(',', '.')); // Convertendo o preço para número
    totalPreco += precoNumerico;

    // Atualizar o campo do total
    document.getElementById('total-preco').textContent = totalPreco.toLocaleString('pt-BR', {
        style: 'decimal',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2,
    });

    // Fechar o modal (opcional)
    fecharModal();
}
// Função para abrir modal
function adicionarServico() {
    document.getElementById('modal-adicionar-servico').style.display = 'block';
}

// Função para fechar modal
function fecharModal() {
    document.getElementById('modal-adicionar-servico').style.display = 'none';
    document.getElementById('modal-pecas').style.display = 'none';
}

// Função para salvar serviço/peça
function salvarServico() {
    const form = document.getElementById('form-servico');
    const codigo = form.codigo.value;
    const servico = form.servico.value;
    const peca = form.peca.value;
    const valor = form.valor.value;

    if (codigo && servico && peca && valor) {
        const tabela = document.getElementById('tabela-servicos');
        tabela.innerHTML += `
            <tr>
                <td>${codigo}</td>
                <td>${servico}</td>
                <td>${peca}</td>
                <td>${valor}</td>
            </tr>
        `;
        fecharModal();
    } else {
        alert('Preencha todos os campos!');
    }
}
</script>
    </div>
</body>
</html>