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
        include('inserir.php')
        ?>
    </div>
</body>

</html>