<? $nomePagina = "Home";
include('inc/sessao.php');
?>
<?include "inc/head.php"?>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <h2 class="text-center mb-4">Bem-vindo <?=$_SESSION["nome"]?></h2>
            <a href="cadastrarOs" class="col btn btn-primary py-3 mx-3">
                cadastrar OS
            </a>
            <a href="exibir" class="col btn btn-primary py-3 mx-3">
                Exibir OS
            </a>
            <a href="cadastrarPecas" class="col btn btn-primary py-3 mx-3">
                Cadastrar peças
            </a>
            <a href="cadastrarServicos" class="col btn btn-primary py-3 mx-3">
                Cadastrar serviços
            </a>
            <a href="cadastrarUser" class="col btn btn-primary py-3 mx-3">
                Cadastrar usuarios
            </a>
            <a href="sair" class="col btn btn-primary py-3 mx-3">
                Deslogar
            </a>
        </div>
    </div>
</body>
</html>