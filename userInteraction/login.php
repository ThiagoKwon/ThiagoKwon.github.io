<?php
include("../connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Login</title>
</head>

<body>
    <div class="navbar">
        <div class="navright">
            <a href=""><img id="logo" src="../img/cee8b1f2-8256-41cf-95f0-58bb48d144e4.jpg" style="width: 300px;"></a>
        </div>
    </div>
    <h1>ÁREA DE LOGIN</h1>
    <form action="../linksBd/link_login.php" name="form1" id="form1" method="post">
        <div class="box-tot">
            <a href="./cadastro_func.php">Sou funcionário?</a>
            <div class="box-ajust">
                <div class="box-right">
                    Nome do Perfil:
                </div>
                <div class="box-left">
                    <input type="text" name="nomeperfil" placeholder="Digite seu nome de perfil">
                </div>
            </div>
            <div class="box-ajust">
                <div class="box-right">
                    Senha:
                </div>
                <div class="box-left">
                    <input type="password" name="senhalogin" placeholder="Digite sua senha">
                </div>
            </div><br>
            <button type="submit" id="login">Entrar</button><br>
    </form>
    <div class="box-ajust">
        <h3>Não tenho conta:</h3>
        <button id="cadbutton"><a id="cad" href="cadastro.php">Cadastro</a></button>
    </div>

    <script src="../main.js"></script>

</body>

</html>