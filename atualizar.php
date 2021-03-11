<?php
require_once('ui/header.php');
?>
<link rel="stylesheet" href="./styles/atualizar.css">
<div class="conteudo_principal">
    <div class="toast_mostra">
    </div>
    <div class="bloco_1">
        <section>
            <h1 class="titulo">Atualizar item <i class="fas fa-cogs"></i></h1>
        </section>
    </div>
    <div class="bloco_2">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="container card card_custom">
                        <div class="card-body">
                            <h3>Alteração de item</h3>
                            <form class="container form-group" action="" method="POST">
                                <h4><label for="titulo_item">Titulo do item *</label></h4>
                                <input class="form-control" id="titulo_item" type="text" name="titulo_item" required>
                                <br>
                                <h4><label for="numero_serie">Número de série do item *</label></h4>
                                <input class="form-control" id="numero_serie" type="number" name="numero_serie" required>
                                <br>
                                <h4>
                                    <label for="categoria_item">Categoria do item *
                                        <a class="tooltip_custom" href="#" data-toggle="tooltip" title="A categoria deve ser cadastrada para aparecer no cadastro de item.">
                                            <i class="fas fa-question-circle"></i>
                                        </a>
                                    </label>
                                </h4>
                                <select class="form-control" name="categoria_item" id="categoria_item" required>
                                </select>
                                <br>
                                <h4><label for="descricao_item">Descrição do item *</label></h4>
                                <textarea class="form-control" name="" id="descricao_item" cols="30" rows="10" required></textarea>
                                <br>
                                <input class="btn submit_custom" id="atualizar_item" type="button" value="Atualizar item">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once('ui/footer.php');
?>
<script src="scripts/cadastrar_item.js" type="text/javascript"></script>
<script src="scripts/atualizar.js" type="text/javascript"></script>
<script src="js/tooltip.js" type="text/javascript"></script>