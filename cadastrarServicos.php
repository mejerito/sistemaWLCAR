<? $nomePagina = "Cadastrar Serviços";
include('inc/sessao.php');

include "inc/head.php"?>
<div class="container">
    
    <h2 class="text-center">Cadastro de Serviços</h2>
    <form action="salvarservicos" method="post">
            <div class="row">
                <div class="col-6">
                    <input class="w-100 m-2" type="text" name="nome" placeholder="Nome do Serviço">
                </div>
                
                
                <div class="col-6">
                    <input class="w-100 m-2" type="text" name="valor" placeholder="Valor do Serviço">
                </div>
                
                <div class="col-12 d-flex m-2 justify-content-center">

                    <button class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
</div>
