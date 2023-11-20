<?php 
    include("../connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Cadastro</title>
</head>
<body>
    <div class="navbar">
        <div class="navright">
            <a href="../home.php"><img id="logo" src="../img/cee8b1f2-8256-41cf-95f0-58bb48d144e4.jpg" style="width: 300px;"></a>
        </div>
    </div>
    <h1>ÁREA DE CADASTRO</h1>
    <form action="../linksBd/link_cadastro_func.php" name="form1" id="form1" method="post">
        <div class="box-tot">
            <div class="box-ajust">
                <div class="box-right">
                    Nome:
                </div>
                <div class="box-left">
                    <input type="text" name="nome" placeholder="Digite seu nome">
                </div>
            </div>
            <div class="box-ajust">
                <div class="box-right">
                    Nome do perfil:
                </div>
                <div class="box-left">
                    <input type="text" name="nomePerfil" placeholder="Digite seu nome de perfil">
                </div>
            </div>
            <div class="box-ajust">
                <div class="box-right">
                    Área de atuação:
                </div>
                <div class="box-left">
                    <input type="text" name="area" placeholder="Digite sua área de atuação">
                </div>
            </div>
            <div class="box-ajust">
                <div class="box-right">
                    Senha:
                </div>
                <div class="box-left">
                    <input type="password" name="senha" placeholder="Digite uma senha">
                </div>
            </div>
            <div class="box-ajust">
                <div class="box-right">
                    Confirme a senha:
                </div>
                <div class="box-left">
                    <input type="password" name="senhaconfirm" placeholder="Confirme a senha">
                </div>
            </div><br>
            <a href=""><button value="salvar" id="save">Salvar</button><br></a>            
        </div>
    </form>
    <script src="../main.js"></script>
    
</body>
</html>