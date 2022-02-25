<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arquivo </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <?php
        include('arquivo.php');

        $div_fechada = true;
        while (!feof($dados)) {
            $linha = fgets($dados);

            if ($div_fechada) {
                echo '<div class="box">';
            }

            if (strcmp($linha, "+++++++++++++++++++++++++++++++++++++++++++++++\n") == 0) {
                echo '</div>';
                $div_fechada = true;
                continue;
            } else if ($linha == "\n") {
                echo "<p class='linha-vazia'>LINHA VAZIA</p>";
                $div_fechada = false;
            } else {
                echo "<p>$linha</p>";
                $div_fechada = false;
            }
        }
        ?>
    </div>
</body>

</html>