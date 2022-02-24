<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            align-items: center;
            display: flex;
            flex-direction: column;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            align-content: space-between;
            align-items: center;
            justify-content: center;
            margin: auto;
        }

        .box {
            margin: 10px;
            padding: 20px;
            border: 2px grey solid;
        }

        p {
            border-left: 2px black solid;
        }

        .linha-vazia {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        include('arquivo.php');

        $div_fechada = true;
        while (!feof($arquivo)) {
            $linha = fgets($arquivo);

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