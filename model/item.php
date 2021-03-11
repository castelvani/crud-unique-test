<?php
require_once('../model/categoria.php');
class item extends categoria implements JsonSerializable
{
    private $id;
    private $titulo;
    private $descricao;
    private $numero_serie;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getNumero_serie()
    {
        return $this->numero_serie;
    }

    public function setNumero_serie($numero_serie)
    {
        $this->numero_serie = $numero_serie;
    }

    public function jsonSerialize()
    {
        return
            [
                'id'   => $this->getId(),
                'titulo' => $this->getTitulo(),
                'descricao' => $this->getDescricao(),
                'categoria' => $this->getNome(),
                'numero_serie' => $this->getNumero_serie(),
            ];
    }
}
