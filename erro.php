<?php
    $nome_arquivo = "log.txt";

    if (is_writable($nome_arquivo)) {
        $log = fopen($nome_arquivo, 'a');
    } else {
        echo "O arquivo $nome_arquivo não pode ser alterado";
    }

    function registrar($log, $erro, $exception){
        date_default_timezone_set('America/Belem');
        $date_time = date('d-m-Y h:i:s a', time());
        fwrite($log, "[$date_time] - ".$exception->getMessage()."\n");
    }
?>