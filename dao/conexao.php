<?php

class Conexao
{
    public function getConnection()
    {
        $dsn = 'mysql:host=localhost;dbname=kpmg';
        $username = 'root';
        $password = '';

        try {

            $pdo = new PDO($dsn, $username, $password);

            return $pdo;
        } catch (PDOException $exception) {

            echo 'Erro: ' . $exception->getMessage();
        }
    }
}
