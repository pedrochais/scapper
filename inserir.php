<?php
include('arquivo.php');
include('conexao.php');
include('erro.php');

//Variável de controle dos valores das colunas
$coluna = 1;

$instrucao_finalizada = true;
while (!feof($dados)) {
    $linha = fgets($dados);

    if ($instrucao_finalizada) {
        $query = '';
    }

    //Caso em que os campos da vez são do tipo inteiro e a linha é vazia. 
    //Se for true, o valor passado para o banco de dados será NULL.
    if(($coluna == 4 || $coluna == 5 || $coluna == 7) && $linha == "\n"){
        $linha = 'NULL';
    }
    
    if($coluna == 10){
        //Instrução MySQL para inserção de uma nova linha na tabela
        $query = "INSERT INTO tb_publicacoes (titulo, autores, revista, volume, numero, paginas, ano, editora, link) VALUES ('$titulo', '$autores', '$revista', '$volume', '$numero', '$paginas', '$ano', '$editora', '$link')";
        
        //Imprime resultado da query na tela
        //echo '<p>'.$query.'</p>';

        try{
            //Execução da instrução
            $execucao = $conexao->exec($query);
        }catch(PDOException $exception){
            //Registrar mensagem de erro
            registrar($log, $erro, $exception);
        }
            

        //Monitoramento dos valores
        /*
        echo '<div class="box">';
        echo '<p>'.$titulo.'</p>';
        echo '<p>'.$autores.'</p>';
        echo '<p>'.$revista.'</p>';
        echo '<p>'.$volume.'</p>';
        echo '<p>'.$numero.'</p>';
        echo '<p>'.$paginas.'</p>';
        echo '<p>'.$ano.'</p>';
        echo '<p>'.$editora.'</p>';
        echo '<p>'.$link.'</p>';
        echo '</div>';
        */

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
?>