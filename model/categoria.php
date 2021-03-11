<?php

class categoria  implements JsonSerializable{
    
    private $id;
    private $nome;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function jsonSerialize()
    {
        return 
        [
            'id'   => $this->getId(),
            'nome' => $this->getNome()
        ];
    }
}