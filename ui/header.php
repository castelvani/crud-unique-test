<?php require_once('./dao/conexao.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/header.css">
    <link rel="stylesheet" href="./styles/body.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="shortcut icon" href="./assets/images/monitor.png" type="image/x-icon" />
    <title>Sistema de cadastro </title>
</head>
<header>
    <div class="container-lg">
        <nav class="navbar navbar-expand-xl" style="background-color: #222831;">
            <a class="navbar-brand home_btn" href="./index.php">Home</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="navbar-brand home_btn" href="./cadastro.php">Cadastro</a>
                </li>
                <li class="nav-item">
                    <a class="navbar-brand home_btn" href="./gerencia.php">Gerência</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="navbar-brand home_btn" href="./sobre.php">Sobre</a>
                </li>
            </ul>
        </nav>
    </div>
</header>

</html>