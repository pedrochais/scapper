<?php
    include('log.php');
    include('conexao.php');

    $query = "
        DELETE FROM tb_publicacoes; ALTER TABLE tb_publicacoes AUTO_INCREMENT = 1;
    ";

    try{
        $conexao->query($query);
    }catch(PDOException $exception){
        registrar($log, $exception->getMessage(), 'ERRO:deletar_tb');
    }finally{
        registrar($log, 'Os dados foram deletados da tabela.', 'AVISO:deletar_tb');
        header('Location: index.php');
    }
?>