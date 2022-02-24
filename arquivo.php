<?php
    $nome_arquivo = 'dados.txt';

    if(file_exists($nome_arquivo)){
        $arquivo = fopen($nome_arquivo, 'r');
    }else{
        echo 'Não foi possível encontrar o arquivo.';
    }
?>