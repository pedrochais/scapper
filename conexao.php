<?php
    $dsn = 'mysql:host=localhost;dbname=db_dexters';
    $username = 'root';
    $password = '';

    try{
        $conexao = new PDO($dsn, $username, $password);
        
    }catch(PDOException $exception){
        echo 'Erro: '.$exception->getMessage();   
    }
?>