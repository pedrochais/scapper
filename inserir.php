<?php
include('arquivo.php');
include('conexao.php');

//Variável de controle dos valores que serão gravados no bd
$valor = 1;

$linha_fechada = true;
while (!feof($arquivo)) {
    $linha = fgets($arquivo);

    if ($linha_fechada) {
        $query = '';
    }

    //Caso em que os campos da vez são do tipo inteiro e a linha é vazia. 
    //Se for true, o valor passado para o banco de dados será NULL.
    if(($valor == 4 || $valor == 5 || $valor == 7) && $linha == "\n"){
        $linha = 'NULL';
    }
    
    if($valor == 10){
        $query = "INSERT INTO tb_publicacoes (titulo, autores, revista, volume, numero, paginas, ano, editora, link) VALUES ('$titulo', '$autores', '$revista', $volume, $numero, '$paginas', $ano, '$editora', '$link')";
        //$conexao->exec($query);

        //Monitoramento dos valores
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


        echo $query.'<br>';
        echo '<hr>';

        //Reiniciando variável de controle
        $valor = 1;
        //Query finalizada
        $linha_fechada = true;
        continue;
    }else if($valor == 1) $titulo = $linha;
    else if($valor == 2) $autores = $linha;
    else if($valor == 3) $revista = $linha;
    else if($valor == 4) $volume = $linha;
    else if($valor == 5) $numero = $linha;
    else if($valor == 6) $paginas = $linha;
    else if($valor == 7) $ano = $linha;
    else if($valor == 8) $editora = $linha;
    else if($valor == 9) $link = $linha;

    
    
    $linha_fechada = false;
    $valor++;
}
?>