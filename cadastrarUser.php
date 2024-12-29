<?
ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once 'inc/conection.php';
include('inc/sessao.php');
include 'inc/head.php';
?>

</head>
<body>
    <div class="container">
        <div class="row">
            <h2 class="text-center">Cadastrar Novo Usuario</h2>
            <form action="salvarUser" method="post">
                <div class="row">

                    <div class="col-6">
                        
                        <input class="w-100 m-2" type="text" name="user" placeholder="nome do Funcionario">
                    </div>
                    <div class="col-6">
                        
                        <input class="w-100 m-2" type="text" name="telefone" placeholder="Telefone de contato">
                    </div>
                    <div class="col-6">
                        
                        <input class="w-100 m-2" type="text" name="login" placeholder="login">
                    </div>
                    <div class="col-6">
                        
                        <input class="w-100 m-2" type="password" name="senha" placeholder="Senha">
                    </div>
                    <div class="col-12 m-2 d-flex justify-content-center">
                        <input type="submit" value="Salvar" class="btn btn-primary">
                    </div>
                </div>

            </form>
        </div>
    </div>
</body>
</html>