<?php
include('arquivo.php');
include('conexao.php');
include('log.php');

//Variável de controle dos valores das colunas
$coluna = 1;

$instrucao_finalizada = true;
while (!feof($dados)) {
    $linha = fgets($dados);

    if ($instrucao_finalizada) {
        $query = '';
    }
    
    if($coluna == 10){
        //Instrução MySQL para inserção de uma nova linha na tabela
        $query = "INSERT INTO tb_publicacoes (titulo, autores, revista, volume, numero, paginas, ano, editora, link) VALUES ('$titulo', '$autores', '$revista', '$volume', '$numero', '$paginas', '$ano', '$editora', '$link')";

        try{
            //Execução da instrução
            $execucao = $conexao->exec($query);
        }catch(PDOException $exception){
            //Registrar mensagem de erro
            registrar($log, $exception->getMessage(), 'ERRO:insercao_bd');
        }

        //Reiniciando variável de controle
        $coluna = 1;
        //Instrução finalizada
        $instrucao_finalizada = true;
        continue;
    }else if($coluna == 1) $titulo = $linha;
    else if($coluna == 2) $autores = $linha;
    else if($coluna == 3) $revista = $linha;
    else if($coluna == 4) $volume = $linha;
    else if($coluna == 5) $numero = $linha;
    else if($coluna == 6) $paginas = $linha;
    else if($coluna == 7) $ano = $linha;
    else if($coluna == 8) $editora = $linha;
    else if($coluna == 9) $link = $linha;

    $instrucao_finalizada = false;
    $coluna++;
}
registrar($log, 'Inserção de dados realizada.', 'AVISO:insercao_bd');
//Volta para o início após finalizar o script
header('Location: index.php');
?>