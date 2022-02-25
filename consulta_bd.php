<?php include('conexao.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco de dados</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <?php
        include('log.php');
        include('conexao.php');
        try {
            //Código SQL
            $query = "
                SELECT * FROM tb_publicacoes
            ";

            //Executando código SQL para solicitar os dados
            $result = $conexao->query($query);

            //Guardando dados numa variável
            $dados = $result->fetchAll();

            if (count($dados) > 0) {
                foreach ($dados as $informacao) {
                    echo '<div class="box">';
                    echo "<p><span class='info'>ID:</span> $informacao[0]</p>";
                    echo "<p><span class='info'>Título:</span> $informacao[1]</p>";
                    echo "<p><span class='info'>Autores:</span> $informacao[2]</p>";
                    echo "<p><span class='info'>Revista:</span> $informacao[3]</p>";
                    echo "<p><span class='info'>Volume:</span> $informacao[4]</p>";
                    echo "<p><span class='info'>Numero:</span> $informacao[5]</p>";
                    echo "<p><span class='info'>Paginas:</span> $informacao[6]</p>";
                    echo "<p><span class='info'>Ano:</span> $informacao[7]</p>";
                    echo "<p><span class='info'>Editora:</span> $informacao[8]</p>";
                    echo "<p><span class='info'>Link:</span> $informacao[9]</p>";
                    echo '</div>';
                }
            } else {
                echo 'Sem registros.';
            }
        } catch (PDOException $exception) {
            registrar($log, $exception->getMessage(), 'ERRO:consulta_bd');
        }
        registrar($log, 'Foi realizada uma consulta no banco de dados.', 'AVISO:consulta_bd');
        ?>
    </div>

</body>

</html>