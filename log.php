<?php
    $nome_arquivo = "log.txt";

    if (is_writable($nome_arquivo)) {
        $log = fopen($nome_arquivo, 'a');
    } else {
        echo "O arquivo $nome_arquivo não pode ser alterado";
    }

    function registrar($log, $erro, $origem){
        date_default_timezone_set('America/Belem');
        $date_time = date('d-m-Y h:i:s a', time());
        fwrite($log, "[$origem] [$date_time] - ".$erro."\n\n");
    }
?>