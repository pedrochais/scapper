<?php
    $dsn = 'mysql:host=localhost;dbname=db_dexters';
    $username = 'root';
    $password = '';

    try{
        $conexao = new PDO($dsn, $username, $password);
    }catch(PDOException $exception){
        registrar($log, $exception->getMessage(), 'ERRO:conexao_bd');
    }
?>