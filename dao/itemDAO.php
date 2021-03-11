<?php

require_once('conexao.php');
class itemDAO
{
    public function __construct()
    {
        require_once('../model/item.php');
    }
    public function consultar_item()
    {
        $con = new Conexao();

        $conexao = $con->getConnection();
        $stmt = $conexao->prepare('select * from categoria as c, item as i where i.id_categoria = c.id');

        $itens = array();
        $stmt->execute();

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($resultado as $valores) {
            $item = new item();
            $item->setId($valores['id']);
            $item->setTitulo($valores['titulo']);
            $item->setDescricao($valores['descricao']);
            $item->setNome($valores['nome']);
            array_push($itens, $item);
        }
        return $itens;
    }

    public function cadastrar_item($titulo, $categoria, $descricao, $numero_serie)
    {
        $con = new Conexao();
        $valida_numero = $this->consultar_item_por_numero_serie($numero_serie);
        if (count($valida_numero) <= 0) {
            $conexao = $con->getConnection();
            $stmt = $conexao->prepare('insert into item (titulo, descricao, numero_serie, id_categoria) values (?,?,?,?)');
            $stmt->bindParam(1, $titulo);
            $stmt->bindParam(2, $descricao);
            $stmt->bindParam(3, $numero_serie);
            $stmt->bindParam(4, $categoria);
            if ($stmt->execute()) {
                return "Item inserido com sucesso!";
            } else {
                return "Erro ao inserir item!";
            }
        } else {
            return "ERRO! Número de série já cadastrado!";
        }
    }

    public function remover_item($id_item)
    {
        $con = new Conexao();

        $conexao = $con->getConnection();
        $stmt = $conexao->prepare('delete from item where id = ?');
        $stmt->bindParam(1, $id_item);
        if ($stmt->execute()) {
            return "Item deletado com sucesso!";
        } else {
            return "Erro ao deletar item!";
        }
    }

    public function consultar_item_por_id($id_item)
    {
        $con = new Conexao();

        $conexao = $con->getConnection();
        $stmt = $conexao->prepare('select * from categoria as c, item as i where i.id_categoria = c.id and i.id = ?');

        $itens = array();
        $stmt->bindParam(1, $id_item);
        $stmt->execute();

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($resultado as $valores) {
            $item = new item();
            $item->setId($valores['id']);
            $item->setTitulo($valores['titulo']);
            $item->setDescricao($valores['descricao']);
            $item->setNome($valores['nome']);
            $item->setNumero_serie($valores['numero_serie']);

            array_push($itens, $item);
        }
        return $itens;
    }

    public function consultar_item_por_id_categoria($id_categoria)
    {
        $con = new Conexao();

        $conexao = $con->getConnection();
        $stmt = $conexao->prepare('select * from categoria as c, item as i where i.id_categoria = c.id and i.id_categoria = ?');

        $itens = array();
        $stmt->bindParam(1, $id_categoria);
        $stmt->execute();

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($resultado as $valores) {
            $item = new item();
            $item->setId($valores['id']);
            $item->setTitulo($valores['titulo']);
            $item->setDescricao($valores['descricao']);
            $item->setNome($valores['nome']);
            array_push($itens, $item);
        }
        return $itens;
    }

    public function consultar_item_por_numero_serie($numero_serie)
    {
        $con = new Conexao();

        $conexao = $con->getConnection();
        $stmt = $conexao->prepare('select * from item where numero_serie = ?');

        $itens = array();
        $stmt->bindParam(1, $numero_serie);
        $stmt->execute();

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($resultado as $valores) {
            $item = new item();
            $item->setId($valores['id']);
            $item->setTitulo($valores['titulo']);
            $item->setDescricao($valores['descricao']);
            $item->setNumero_serie($valores['numero_serie']);
            array_push($itens, $item);
        }
        return $itens;
    }

    public function atualizar_item($titulo, $id_categoria, $descricao, $numero_serie, $id_item)
    {
        $con = new Conexao();
        $valida_numero = $this->consultar_item_por_numero_serie($numero_serie);

        $valida_numero_json = json_encode($valida_numero);

        $id_encontrado = json_decode($valida_numero_json)[0]->id ?? 0;

        if ($id_encontrado == $id_item || count($valida_numero) <= 0) {
            $conexao = $con->getConnection();
            $stmt = $conexao->prepare('update item set titulo = ? , id_categoria = ?, descricao = ?, numero_serie = ? WHERE id = ?');
            $stmt->bindParam(1, $titulo);
            $stmt->bindParam(2, $id_categoria);
            $stmt->bindParam(3, $descricao);
            $stmt->bindParam(4, $numero_serie);
            $stmt->bindParam(5, $id_item);
            if ($stmt->execute()) {
                return "Item alterado com sucesso!";
            } else {
                return "Erro ao atualizar item!";
            }
        } else {
            return "ERRO! Número de série já existente!";
        }
    }
}
