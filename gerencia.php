<?php
require_once('ui/header.php');
?>

<body>
    <link rel="stylesheet" href="./styles/gerencia.css">
    <div class="conteudo_principal">
        <div class="toast_mostra">
        </div>
        <div class="bloco_1">
            <section>
                <h1 class="titulo">Gerenciar <i class="fas fa-cogs"></i></h1>
            </section>
        </div>
        <div class="bloco_2">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="container card card_custom">
                            <div class="card-body">
                                <h3>Gerencia de categoria</h3>
                                <form class="container form-group apagar_form" action="" method="POST">
                                    <h4><label for="nome_categoria">Categorias</label></h4>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Nome</th>
                                                <th scope="col">Gerencia</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tabela_categoria">
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
require_once('ui/footer.php');
?>
<script src="scripts/categoria.js" type="text/javascript"></script>