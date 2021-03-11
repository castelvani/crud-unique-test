<?php
require_once('../dao/categoriaDAO.php');
$opcao = $texto = isset($_POST['opcao']) ? $_POST['opcao'] : null;

switch ($opcao) {
    case 'consultar':
        try {
            $categoriaDAO = new categoriaDAO();

            $resultado_dao = $categoriaDAO->consultar_categoria();
            //JsonSerializable é usado na modelo categoria para que seja possivel pegar os valores
            echo json_encode($resultado_dao);
        } catch (Exception $erro) {
            echo $erro;
        }
        break;
    case 'cadastrar':
        try {
            $nome_categoria = $texto = isset($_POST['nome_categoria']) ? $_POST['nome_categoria'] : null;

            $categoriaDAO = new categoriaDAO();

            if ($nome_categoria != null) {
                $resultado_dao = $categoriaDAO->cadastrar_categoria($nome_categoria);
            } else {
                $resultado_dao = "Erro ao consultar";
            }

            echo ($resultado_dao);
        } catch (Exception $erro) {
            echo $erro;
        }
        break;
    case 'remover':
        try {
            $id_categoria = $texto = isset($_POST['id_categoria']) ? $_POST['id_categoria'] : null;

            $categoriaDAO = new categoriaDAO();

            $resultado_dao = $categoriaDAO->remover_categoria($id_categoria);

            echo ($resultado_dao);
        } catch (Exception $erro) {
            echo $erro;
        }
        break;
}
