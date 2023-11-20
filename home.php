<?php
session_start();

$logged = NULL;
$func = $_SESSION["func"] ?? NULL;

if (isset($_SESSION["NomeUsuario"])) {
    $logged = TRUE;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>HealthCareHub</title>
</head>

<body>
    <style>
        .boxs a {
            opacity: 0.7;
        }

        .boxs a:hover {
            opacity: 1;
        }

        #img1 {
            background-image: url("./img/exercicio.png");
            background-position-x: 40%;
            background-size: cover;
        }

        #img2 {
            background-image: url("./img/meditacao.png");
            background-position-x: 63%;
            background-size: cover;
        }

        #img3 {
            background-image: url("./img/refri.png");
            background-position-x: 54%;
            background-repeat: no-repeat;
            background-size: cover;
        }

        #img4 {
            background-image: url("./img/image.png");
            background-position-x: 40%;
            background-size: cover;
        }
    </style>

    <div class="navbar">
        <div class="navright">
            <a href=""><img id="logo" src="./img/cee8b1f2-8256-41cf-95f0-58bb48d144e4.jpg" style="width: 300px;"></a>
        </div>
        <div class="navleft">
            <?php if (!$logged) { ?>
                <a href="./userInteraction/login.php" id="nb">
                    <h3>LOGIN</h3>
                </a>
            <?php } else { ?>
                <a href="./userInteraction/perfil.php" id="nb">
                    <h3>PERFIL</h3>
                </a>
                <?php if ($func !== TRUE) {
                ?>
                    <a href="./userInteraction/realiza.php" id="nb">
                        <h3>DESAFIOS</h3>
                    </a>
                <?php
                } ?>

            <?php } ?>
            <a href="./sobrenos.html" id="nb">
                <h3>SOBRE NÓS</h3>
            </a>
            <a href="" id="nb">
                <h3>HÁBITOS</h3>
            </a>
            <a href="" id="nb">
                <h3>COMUNIDADE</h3>
            </a>
        </div>
    </div>
    <div class="boxs">
        <div class="box1">
            <h2>Dicas de Exercícios</h2>
            <a href=""><img id="img1" src=></a>
        </div>
        <div class="box2">
            <h2>Dicas anti estresse</h2>
            <a href=""><img id="img2" src=""></a>
        </div>
        <div class="box3">
            <h2>Desafios</h2>
            <a href=""><img id="img3" src=""></a>
        </div>
        <div class="box4">
            <h2>Dicas de Alimentação</h2>
            <a href=""><img id="img4" src=""></a>
        </div>
    </div>
</body>

</html>