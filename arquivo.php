<?php
    $nome_arquivo = 'arquivos/dados_davi.txt';

    if(file_exists($nome_arquivo)){
        $dados = fopen($nome_arquivo, 'r');
    }else{
        echo 'Não foi possível encontrar o arquivo.';
    }
?>