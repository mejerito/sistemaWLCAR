<? $nomePagina = "Cadastrar Ordem de Serviço";
include('inc/sessao.php');

include "inc/head.php"?>
<div class="container">
    
    <h2 class="text-center">Cadastro de peças</h2>
    <form action="salvapecas" method="post">
            <div class="row">
                <div class="col-6">
                    <input class="w-100 m-2" type="text" name="nome" placeholder="Nome da peça">
                </div>
                <div class="col-6">
                    <input class="w-100 m-2" type="text" name="quantidade" placeholder="Quantidade adquirida">
                </div>
                <div class="col-6">
                    <input class="w-100 m-2" type="text" name="local" placeholder="Local da compra">
                </div>
                <div class="col-6">
                    <input class="w-100 m-2" type="text" name="desconto" placeholder="Desconto ">
                </div>
                <div class="col-6">
                    <input class="w-100 m-2" type="text" name="valor" placeholder="Valor para o cliente">
                </div>
                <div class="col-6">
                    <input class="w-100 m-2" type="date" name="data">
                </div>
                <div class="col-12 d-flex m-2 justify-content-center">

                    <button class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
</div>
